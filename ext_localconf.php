<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.Stafflist',
            'Personlist',
            [
                'Persons' => 'personList, detailView, boxView',
                'Teams' => 'teamsList, groupedByTeams'
            ],
            // non-cacheable actions
            [
                'Persons' => '',
                'Teams' => ''
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    personlist {
                        iconIdentifier = stafflist-plugin-personlist
                        title = LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_personlist.name
                        description = LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_personlist.description
                        tt_content_defValues {
                            CType = list
                            list_type = stafflist_personlist
                        }
                    }
                }
                show = *
            }
       }'
        );
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

        $iconRegistry->registerIcon(
            'stafflist-plugin-personlist',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            [
                'source' => 'EXT:stafflist/Resources/Public/Icons/user_plugin_personlist.svg'
            ]
        );
    }
);
