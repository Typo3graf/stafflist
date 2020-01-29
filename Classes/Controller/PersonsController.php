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
use Typo3graf\Stafflist\Utility\TypoScript;
use TYPO3\CMS\Core\TypoScript\TypoScriptService;
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
        $demand = '';
        $persons = $this->personsRepository->findDemanded(GeneralUtility::trimExplode(',',$this->settings['usergroup'], TRUE), $this->settings);
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
        /*$requestData = $this->request->getArguments();
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($persons, 'Person -> Controller');
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($requestData, 'Arguments -> Controller'); die();*/
        $this->view->assign('person-item', $persons);
    }

    /**
     * action boxView
     *
     * @return void
     */
    public function boxViewAction()
    {
       // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings['source_plugin'], 'Settings -> Controller');
       // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings['source_plugin'] != null, 'Settings -> Controller'); die();
        if ($this->settings['source_plugin'] != null) {
            $persons = $this->personsRepository->findByUid($this->settings['source_plugin']);
        }
        $this->view->assign('person-item', $persons);
    }

    /**
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
