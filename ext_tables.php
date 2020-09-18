<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Instagramapi.Instagramapi',
            'Instagramapi',
            'Insatagram api'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('instagramapi', 'Configuration/TypoScript', 'instagram_api');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_instagramapi_domain_model_instagramapi', 'EXT:instagramapi/Resources/Private/Language/locallang_csh_tx_instagramapi_domain_model_instagramapi.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_instagramapi_domain_model_instagramapi');

    }
);
