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

use Typo3graf\Stafflist\Domain\Model\Persons;

/**
 * The repository for Persons
 */
class PersonsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];

    /**
     * Returns a category constraint created by
     * a given list of categories and a junction string
     *
     * @param array $demand
     * @param string $settings
     *
     */
    public function findDemanded($demand, $settings)
    {
       // Set startingpoint(s)
        $pidList = $pidList = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $settings['startingpoint'], TRUE);
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setStoragePageIds($pidList);
        $this->setDefaultQuerySettings($querySettings);

        // Set ordering
       /* $query=$this->createQuery();
        if ($settings['sortOrderDirection'] === 'ASC') {
            $orderings = [
                $settings['sortOrder'] => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
            ];
        } else {
            $orderings = [
                $settings['sortOrder'] => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
            ];
        }
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($orderings, 'Orderings');
        $query->setOrderings($orderings);
        //$query = $this->findAll();
        $query->execute();*/


        $queryResult = $this->findAll();
        //$queryResult = $query;
        return $queryResult;
    }
}
