<?php
namespace Typo3graf\Stafflist\Domain\Repository;

/***
 *
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Development-Team <development@typo3graf.de>, Typo3graf media-agentur
 *
 ***/

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * The repository for Teams
 */
class TeamsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];

    /**
     * Returns a category constraint created by
     * a given list of categories and a junction string
     * @param array $demand
     * @param string $settings
     */
    public function findDemanded($demand, $settings)
    {
        // Set startingpoint(s)
        $pidList = $pidList = GeneralUtility::intExplode(',', $settings['startingpoint'], true);
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setStoragePageIds($pidList);
        $this->setDefaultQuerySettings($querySettings);

        return $this->findAll();
    }

    /**
     * Returns a member list grouped by teams
     * @param array $demand
     * @param string $settings
     */
    public function findGroupedByTeams($demand, $settings)
    {
        // Set startingpoint
        $pidList = GeneralUtility::intExplode(',', $settings['startingpoint'], true);
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setStoragePageIds($pidList);
        $this->setDefaultQuerySettings($querySettings);
        // Set defaultOrderings
        if ($settings['sortOrderDirection'] === 'ASC') {
            $orderings = [
                $settings['sortTeamOrder'] => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
            ];
        } else {
            $orderings = [
                 $settings['sortTeamOrder'] => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
            ];
        }
        $this->defaultOrderings = $orderings;

        // Query result
        if ($settings['usergroup']) {
            $queryResult = $this->createQuery();
            $queryResult->matching($queryResult->in('uid', $demand));
            return $queryResult->execute();

        } else {
            return $queryResult = $this->findAll();
        }
    }
}
