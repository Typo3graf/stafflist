<?php

namespace T3graf\Stafflist\Controller;

/***
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *  (c) 2020 Development-Team <development@t3graf.de>, T3graf media-agentur
 ***/

/**
 * PersonsController
 */
use T3graf\Stafflist\Utility\TypoScript;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;

class PersonsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * Inject a persons repository to enable DI
     *
     * @param \T3graf\Stafflist\Domain\Repository\PersonsRepository $personsRepository
     */
    public function injectPersonsRepository(\T3graf\Stafflist\Domain\Repository\PersonsRepository $personsRepository)
    {
        $this->personsRepository = $personsRepository;
    }

    public function initializeAction()
    {
        $pathPrefix = PathUtility::getAbsoluteWebPath(ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey()));
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $loadFontawesome = GeneralUtility::makeInstance(ExtensionConfiguration::class)
            ->get('stafflist', 'loadFontawesome');
        if ($loadFontawesome) {
            $pageRenderer->addCssLibrary($pathPrefix . 'Resources/Public/Fonts/Fontawesome/Css/all.css');
        }
    }

    /**
     * action personList
     */
    public function personListAction()
    {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings, 'Settings -> Controller');
        $demand = '';
        $persons = $this->personsRepository->findDemanded(GeneralUtility::trimExplode(',', $this->settings['usergroup'], true), $this->settings);
        $this->view->assign('persons', $persons);
    }

    /**
     * action detailView
     *
     * @param \T3graf\Stafflist\Domain\Model\Persons $persons
     */
    public function detailViewAction(\T3graf\Stafflist\Domain\Model\Persons $persons = null)
    {
        /*$requestData = $this->request->getArguments();
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($persons, 'Person -> Controller');
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($requestData, 'Arguments -> Controller'); die();*/
        $this->view->assign('person-item', $persons);
    }

    /**
     * action boxView
     */
    public function boxViewAction()
    {
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings['source_plugin'], 'Settings -> Controller');
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings['source_plugin'] != null, 'Settings -> Controller'); die();
        if ($this->settings['source_plugin'] != null) {
            $persons = $this->personsRepository->findByUids($this->settings['source_plugin'], $this->settings);
        }
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($persons, 'Settings -> Controller'); die();
        /** @noinspection PhpUndefinedVariableInspection */
        $this->view->assign('persons', $persons);
    }

    /*
     * Helper
     */

    /**
     * Injects the Configuration Manager and is initializing the framework settings
     *
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager Instance of the Configuration Manager
     */
    public function injectConfigurationManager(
        \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
    ) {
        $this->configurationManager = $configurationManager;
        $tsSettings = $this->configurationManager->getConfiguration(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
            'Stafflist',
            'Personlist'
        );
        $originalSettings = $this->configurationManager->getConfiguration(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS
        );
        //   \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($tsSettings, 'TS Settings');
        //  \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($originalSettings, 'OriginalSettings');

        /* $propertiesNotAllowedViaFlexForms = [name];
         foreach ($propertiesNotAllowedViaFlexForms as $property) {
             $originalSettings[$property] = $tsSettings['settings'][$property];
         }
         $this->originalSettings = $originalSettings;*/
        // start override
        if (isset($tsSettings['settings']['overrideFlexformSettingsIfEmpty'])) {
            $typoScriptUtility = GeneralUtility::makeInstance(TypoScript::class);
            $originalSettings = $typoScriptUtility->override($originalSettings, $tsSettings);
        }
        if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['Stafflist']['Controller/PersonsController.php']['overrideSettings'])) {
            foreach ($GLOBALS['TYPO3_CONF_VARS']['EXT']['Stafflist']['Controller/PersonsController.php']['overrideSettings'] as $_funcRef) {
                $_params = [
                    'originalSettings' => $originalSettings,
                    'tsSettings' => $tsSettings,
                ];
                $originalSettings = GeneralUtility::callUserFunction($_funcRef, $_params, $this);
            }
        }
        $this->settings = $originalSettings;
        //  \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($tsSettings, 'TS Settings');
        //  \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($originalSettings, 'OriginalSettings'); die();
    }
}
