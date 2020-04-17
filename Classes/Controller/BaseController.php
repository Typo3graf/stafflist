<?php

namespace T3graf\Stafflist\Controller;

/***
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *  (c) 2020 Development-Team <development@t3graf.de>, T3graf media-agentur
 ***/

/**
 * BaseController
 */

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

class BaseController extends ActionController
{

    /**
     * Constructor
     */
    protected function initializeAction()
    {
        $this->overrideFlexformSettings();
        $this->storagePidFallback();

        /* Implement Fontawesome if necessary */
        $pathPrefix = PathUtility::getAbsoluteWebPath(ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey()));
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $loadFontawesome = GeneralUtility::makeInstance(ExtensionConfiguration::class)
            ->get('stafflist', 'loadFontawesome');
        if ($loadFontawesome) {
            $pageRenderer->addCssLibrary($pathPrefix . 'Resources/Public/Fonts/Fontawesome/Css/all.css');
        }
    }

    /**
     * Initializes the view before invoking an action method.
     * Override this method to solve assign variables common for all actions
     * or prepare the view in another way before the action is called.
     *
     * @param ViewInterface $view The view to be initialized
     */
    protected function initializeView(ViewInterface $view)
    {
        $view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
        parent::initializeView($view);
    }


    /**
     * overrides flexform settings with original typoscript values when
     * flexform value is empty and settings key is defined in
     * 'settings.overrideFlexformSettingsIfEmpty'
     *
     * @return void
     */
    public function overrideFlexformSettings()
    {
        $originalSettings = $this->configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS
        );
        $typoScriptSettings = $this->configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
            'stafflist',
            'stafflist_personlist'
        );
        if (isset($typoScriptSettings['settings']['overrideFlexformSettingsIfEmpty'])) {
            $overrideIfEmpty = GeneralUtility::trimExplode(',', $typoScriptSettings['settings']['overrideFlexformSettingsIfEmpty'], TRUE);
            foreach ($overrideIfEmpty as $settingToOverride) {
                // if flexform setting is empty and value is available in TS
                if ((!isset($originalSettings[$settingToOverride]) || empty($originalSettings[$settingToOverride]))
                    && isset($typoScriptSettings['settings'][$settingToOverride])) {
                    $originalSettings[$settingToOverride] = $typoScriptSettings['settings'][$settingToOverride];
                }
            }
            $this->settings = $originalSettings;
        }
    }


    /**
     * StoragePid fallback: TypoScript settings will be overridden by plugin data.
     * No flexform settings, field pages of tt_content will be used.
     *
     */
    protected function storagePidFallback()
    {
        $configuration = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
            'stafflist',
            'stafflist_personlist'
        );
        // Storage PID in plugin data (tt_content->pages) overrides storagePid from TypoScript
        if ($configuration['persistence']['storagePid']) {
            $pid['persistence']['storagePid'] = $configuration['persistence']['storagePid'];
            $this->configurationManager->setConfiguration(array_merge($configuration, $pid));
        }
        // Use current page as storagePid if neither set in TypoScript nor plugin data
        elseif (!$configuration['persistence']['storagePid']) {
            // Use current PID as storage PID
            $pid['persistence']['storagePid'] = $GLOBALS["TSFE"]->id;
            $this->configurationManager->setConfiguration(array_merge($configuration, $pid));
        }
    }

    /**
     * Create the demand object which define which records will get shown
     *
     * @param array $settings
     * @param string $action
     * @return \T3graf\Stafflist\Domain\Model\StafflistDemand
     */
    protected function createDemandObjectFromSettings(
        $settings,
        $action = 'person'
    )
    {
        \TYPO3\CMS\Core\Utility\DebugUtility::debug($settings, '$settings -> BaseController::createDemandObjectFromSettings');
        /* @var $demand \T3graf\Stafflist\Domain\Model\StafflistDemand */
        $demand = $this->objectManager->get('T3graf\\Stafflist\\Domain\\Model\\StafflistDemand',$settings);
        if ($action) {
            $demand->setAction($action);
        }
        $demand->setTeams(GeneralUtility::trimExplode(',', $settings['teams'], true));
        if ($settings['sortOrder']) {
            if ($settings['sortOrder'] == 'fullLastname') {$settings ['sortOrder'] = 'lastname,firstname';}
            if ($settings['sortOrder'] == 'fullFirstname') {$settings ['sortOrder'] = 'firstname,lastname';}
            $demand->setOrder($settings['sortOrder'] . ' ' . $settings['sortOrderDirection']);
        }
        if ($settings['sortTeamOrder']) {
            $demand->setTeamOrder($settings['sortTeamOrder'] . ' ' . $settings['sortOrderDirection']);
        }

        $demand->setStoragePage($this->extendPidListByChildren($settings['startingpoint'],
            $settings['recursive']));
        $demand->setPersons(GeneralUtility::trimExplode(',', $settings['source_plugin'], true));
        return $demand;
    }

    /**
     * Find all ids from given ids and level
     *
     * @param string $pidList comma separated list of ids
     * @param int $recursive recursive levels
     * @return string comma separated list of ids
     */
    protected function extendPidListByChildren($pidList = '', $recursive = 0)
    {
        $recursive = (int)$recursive;
        if ($recursive <= 0) {
            return $pidList;
        }

        $queryGenerator = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\QueryGenerator::class);
        $recursiveStoragePids = $pidList;
        $storagePids = GeneralUtility::intExplode(',', $pidList);
        foreach ($storagePids as $startPid) {
            if ($startPid >= 0) {
                $pids = $queryGenerator->getTreeList($startPid, $recursive, 0, 1);
                if (strlen($pids) > 0) {
                    $recursiveStoragePids .= ',' . $pids;
                }
            }
        }
        return GeneralUtility::uniqueList($recursiveStoragePids);
    }
}
