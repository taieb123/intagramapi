<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['instagramapi_instagramapi'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['instagramapi_instagramapi'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('instagramapi_instagramapi',
    'FILE:EXT:instagramapi/Configuration/FlexForms/instagram.xml');