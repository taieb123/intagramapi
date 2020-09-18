<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Instagramapi.Instagramapi',
            'Instagramapi',
            [
                'Instagramapi' => 'list, show, new, create, edit, update, delete,instagram'
            ],
            // non-cacheable actions
            [
                'Instagramapi' => 'create, update, delete,instagram'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    instagramapi {
                        iconIdentifier = instagramapi-plugin-instagramapi
                        title = LLL:EXT:instagramapi/Resources/Private/Language/locallang_db.xlf:tx_instagramapi_instagramapi.name
                        description = LLL:EXT:instagramapi/Resources/Private/Language/locallang_db.xlf:tx_instagramapi_instagramapi.description
                        tt_content_defValues {
                            CType = list
                            list_type = instagramapi_instagramapi
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'instagramapi-plugin-instagramapi',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:instagramapi/Resources/Public/Icons/instagram.svg']
            );	
    }
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\Instagramapi\Instagramapi\Task\RefreshTokenTask::class] = array(
    'extension' => $_EXTKEY,
    'title' => 'Refresh Token instagram',
    'description' => 'This Task can refereh the token of instagram by date as selected',
    //'additionalFields' => 'Subscriptionreal\\Subscriptionreal\\Command\\SubscriptionAdditionalFieldProvider'
);
