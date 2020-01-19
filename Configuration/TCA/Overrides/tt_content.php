<?php
defined('TYPO3_MODE') or die();

/***************
 * Plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Typo3graf.Stafflist',
    'Personlist',
    'Staff List'
);
$pluginSignature = str_replace('_', '', 'stafflist') . '_personlist';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'recursive,pages';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:stafflist/Configuration/FlexForms/flexform_personlist.xml');
