<?php

namespace T3graf\Stafflist\Domain\Repository;

/***
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *  (c) 2020 Development-Team <development@t3graf.de>, T3graf media-agentur
 ***/

use T3graf\Stafflist\Domain\Model\Persons;

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
     * Returns a category constraint created by
     * a given list of categories and a junction string
     * @param array $demand
     * @param string $settings
     */
    public function findDemanded($demand, $settings)
    {
        // Set startingpoint
        $pidList = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $settings['startingpoint'], true);
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setStoragePageIds($pidList);
        $this->setDefaultQuerySettings($querySettings);
        // Set defaultOrderings
        if ($settings['sortOrderDirection'] === 'ASC') {
            $orderings = [
                $settings['sortOrder'] => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
            ];
        } else {
            $orderings = [
                $settings['sortOrder'] => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
            ];
        }
        $this->defaultOrderings = $orderings;

        // Query result
        if ($settings['usergroup']) {
            $queryResult = $this->createQuery();
            $queryResult->matching($queryResult->in('teams.uid', $demand));
            return $queryResult->execute();
        } else {
            return $queryResult = $this->findAll();
        }
    }

    /**
     *  Find by multiple uids using, seperated string
     * @param string $uidList
     * @param array $settings
     */
    public function findByUids($uidList, $settings)
    {
        // Set startingpoint
        $pidList = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $settings['startingpoint'], true);
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setStoragePageIds($pidList);
        $this->setDefaultQuerySettings($querySettings);
        $uidArray = explode(',', $uidList);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($uidArray, 'Settings -> Repository'); die();
        $query = $this->createQuery();
        $query->matching(
            $query->in('uid', $uidArray),
            $query->logicalAnd(
                $query->equals('hidden', 0),
                $query->equals('deleted', 0)
            )
        );
        return $query->execute();
    }
}
