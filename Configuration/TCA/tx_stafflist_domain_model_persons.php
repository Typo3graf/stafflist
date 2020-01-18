<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons',
        'label' => 'lastname',
        'label_alt' => 'firstname',
		'label_alt_force' => 1,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'lastname,firstname,title,function,tasks,building,room,phone,mobile,fax,email,officehours,bio,twitter,facebook,instagram,xing,github,gitlab',
        'iconfile' => 'EXT:stafflist/Resources/Public/Icons/tx_stafflist_domain_model_persons.svg'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, lastname, firstname, title, salutation, avatar, function, tasks, incompany, building, room, phone, mobile, fax, email, officehours, bio, twitter, facebook, instagram, xing, github, gitlab, teams, functions, locations',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, lastname, firstname, title, salutation, avatar, function, tasks, incompany, building, room, phone, mobile, fax, email, officehours, bio, twitter, facebook, instagram, xing, github, gitlab, teams, functions, locations, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_stafflist_domain_model_persons',
                'foreign_table_where' => 'AND {#tx_stafflist_domain_model_persons}.{#pid}=###CURRENT_PID### AND {#tx_stafflist_domain_model_persons}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'lastname' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.lastname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'firstname' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.firstname',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'salutation' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.salutation',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'avatar' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.avatar',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'avatar',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'function' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.function',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'tasks' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.tasks',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'incompany' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.incompany',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
        ],
        'building' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.building',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'room' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.room',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'phone' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.phone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'mobile' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.mobile',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'fax' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.fax',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'nospace,email'
            ]
        ],
        'officehours' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.officehours',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'bio' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.bio',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'twitter' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.twitter',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'facebook' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.facebook',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'instagram' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.instagram',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'xing' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.xing',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'github' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.github',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'gitlab' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.gitlab',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'teams' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.teams',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_stafflist_domain_model_teams',
                'MM' => 'tx_stafflist_persons_teams_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'functions' => [
            'exclude' => false,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.functions',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_stafflist_domain_model_functions',
                'MM' => 'tx_stafflist_persons_functions_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'locations' => [
            'exclude' => true,
            'label' => 'LLL:EXT:stafflist/Resources/Private/Language/locallang_db.xlf:tx_stafflist_domain_model_persons.locations',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_stafflist_domain_model_locations',
                'MM' => 'tx_stafflist_persons_locations_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
    
    ],
];
