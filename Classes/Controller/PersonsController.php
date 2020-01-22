<?php
namespace Typo3graf\Stafflist\Controller;


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
 * PersonsController
 */

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;



class PersonsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * Inject a persons repository to enable DI
     *
     * @param \Typo3graf\Stafflist\Domain\Repository\PersonsRepository $personsRepository
     */
    public function injectPersonsRepository(\Typo3graf\Stafflist\Domain\Repository\PersonsRepository $personsRepository)
    {
        $this->personsRepository = $personsRepository;
    }

    public function initializeAction()
    {
        $pathPrefix =  PathUtility::getAbsoluteWebPath(ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey()));
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $loadFontawesome = GeneralUtility::makeInstance(ExtensionConfiguration::class)
            ->get('stafflist', 'loadFontawesome');
        if ($loadFontawesome) {$pageRenderer->addCssLibrary( $pathPrefix. 'Resources/Public/Fonts/Fontawesome/Css/all.css');};

    }

        /**
     * action personList
     *
     * @return void
     */
    public function personListAction()
    {
     $persons = $this->personsRepository->findAll();
        $this->view->assign('persons', $persons);
    }

    /**
     * action groupedByList
     *
     * @return void
     */
    public function groupedByListAction()
    {
    }

    /**
     * action detailView
     *
     * @param \Typo3graf\Stafflist\Domain\Model\Persons $persons
     * @return void
     */
    public function detailViewAction(\Typo3graf\Stafflist\Domain\Model\Persons $persons = null)
    {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($persons, 'My Title'); die();
        $this->view->assign('person', $persons);
    }

    /**
     * action boxView
     *
     * @param \Typo3graf\StaffList\Domain\Model\Persons $persons
     * @return void
     */
    public function boxViewAction(\Typo3graf\Stafflist\Domain\Model\Persons $persons = null)
    {
        $this->view->assign('person', $persons);
    }
}
