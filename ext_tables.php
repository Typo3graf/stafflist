<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.Stafflist',
            'Personlist',
            'Staff List'
        );

        $pluginSignature = str_replace('_', '', 'stafflist') . '_personlist';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:stafflist/Configuration/FlexForms/flexform_personlist.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('stafflist', 'Configuration/TypoScript', 'Staff List');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_stafflist_domain_model_persons', 'EXT:stafflist/Resources/Private/Language/locallang_csh_tx_stafflist_domain_model_persons.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_stafflist_domain_model_persons');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_stafflist_domain_model_teams', 'EXT:stafflist/Resources/Private/Language/locallang_csh_tx_stafflist_domain_model_teams.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_stafflist_domain_model_teams');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_stafflist_domain_model_functions', 'EXT:stafflist/Resources/Private/Language/locallang_csh_tx_stafflist_domain_model_functions.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_stafflist_domain_model_functions');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_stafflist_domain_model_locations', 'EXT:stafflist/Resources/Private/Language/locallang_csh_tx_stafflist_domain_model_locations.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_stafflist_domain_model_locations');

    }
);
