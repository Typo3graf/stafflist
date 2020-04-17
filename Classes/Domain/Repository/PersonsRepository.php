<?php

namespace T3graf\Stafflist\Domain\Repository;

/***
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *  (c) 2020 Development-Team <development@t3graf.de>, T3graf media-agentur
 ***/

use T3graf\Stafflist\Domain\Model\StafflistDemand;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;


/**
 * The repository for Persons
 */
class PersonsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['lastname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];

    /**
     * Returns a person constraint created by
     * a given list of teams and a junction string
     *
     * @param StafflistDemand $demand
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findDemanded(StafflistDemand $demand)
    {
        // Query result
       $queryResult = $this->generateQuery($demand);

       return $queryResult->execute();

    }

    /**
     * Returns an array of constraints created from a given demand object.
     *
     * @param QueryInterface $query
     * @param StafflistDemand $demand
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     * @return array<\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface>
     */
    protected function createConstraintsFromDemand(QueryInterface $query, StafflistDemand $demand)
    {
        /** @var StafflistDemand $demand */
        $constraints = [];

        if ($demand->getTeams() && $demand->getAction() =='list') {
            $constraints['teams'] = $query->in('teams.uid', $demand->getTeams());
        }

        if ($demand->getPersons() && $demand->getAction() =='persons') {
            $constraints['teams'] = $query->in('uid', $demand->getPersons());
        }

        // storage page
        if ($demand->getStoragePage() != 0) {
            $constraints['pid'] = $query->in('pid', GeneralUtility::trimExplode(',', $demand->getStoragePage(), true));
        }
        $constraints['hidden'] = $query->equals('hidden', 0);
        $constraints['deleted'] = $query->equals('deleted', 0);
        // Clean not used constraints
        foreach ($constraints as $key => $value) {
            if (null === $value) {
                unset($constraints[$key]);
            }
        }
        return $constraints;
    }

    /**
     * Returns an array of orderings created from a given demand object.
     *
     * @param StafflistDemand $demand
     * @return array<\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface>
     */
    protected function createOrderingsFromDemand(StafflistDemand $demand)
    {
        $orderings = [];

            $orderList = GeneralUtility::trimExplode(',', $demand->getOrder(), true);
        \TYPO3\CMS\Core\Utility\DebugUtility::debug($orderList, '$orderList -> PersonRepository');
            if (!empty($orderList)) {
                // go through every order statement
                foreach ($orderList as $orderItem) {
                    list($orderField, $ascDesc) = GeneralUtility::trimExplode(' ', $orderItem, true);
                    // count == 1 means that no direction is given
                    if ($ascDesc) {
                        $orderings[$orderField] = ((strtolower($ascDesc) === 'desc') ?
                            QueryInterface::ORDER_DESCENDING :
                            QueryInterface::ORDER_ASCENDING);
                    } else {
                        $orderings[$orderField] = QueryInterface::ORDER_ASCENDING;
                    }
                }
            }


        return $orderings;
    }

    /**
     * @param StafflistDemand $demand
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     * @return \TYPO3\CMS\Extbase\Persistence\QueryInterface
     */
    protected function generateQuery(StafflistDemand $demand)
    {
        $query = $this->createQuery();

        $query->getQuerySettings()->setRespectStoragePage(false);

        $constraints = $this->createConstraintsFromDemand($query, $demand);

        if (!empty($constraints)) {
            $query->matching(
                $query->logicalAnd($constraints)
            );
        }

        if ($orderings = $this->createOrderingsFromDemand($demand)) {
            $query->setOrderings($orderings);
        }
        \TYPO3\CMS\Core\Utility\DebugUtility::debug($query, '$query -> PersonRepository');
        return $query;
    }

}
