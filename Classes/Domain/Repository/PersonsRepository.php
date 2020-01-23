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



/**
 * The repository for Persons
 */
class PersonsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];

    // change default query settings
   /* public function initializeObject()
    {
        // get the current settings
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($querySettings, 'Before');

        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($settings, 'Settings');

        $pidList = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',',$this->settings['startingpoint'], TRUE);
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pidList, 'pidList');
        $querySettings->setStoragePageIds($pidList);
        // change the default setting, whether the storage page ID is ignored by the plugins (FALSE) or not (TRUE - default setting)
        $querySettings->setRespectStoragePage(FALSE);

        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($querySettings, 'AFTER');;die();
        // store the new setting(s)
        $this->setDefaultQuerySettings($querySettings);
    }*/
}
