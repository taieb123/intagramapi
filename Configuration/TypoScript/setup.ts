
plugin.tx_instagramapi_instagramapi {
    view {
        templateRootPaths.0 = EXT:instagramapi/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_instagramapi_instagramapi.view.templateRootPath}
        partialRootPaths.0 = EXT:instagramapi/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_instagramapi_instagramapi.view.partialRootPath}
        layoutRootPaths.0 = EXT:instagramapi/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_instagramapi_instagramapi.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_instagramapi_instagramapi.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

page.headerData {
   150 = TEXT
   150.value =  <link rel="stylesheet" type="text/css" href="/typo3conf/ext/instagramapi/Resources/Public/Css/instagramapi.css" media="all">
}

page.footerData {
   300 = TEXT
   300.value = <script src="typo3conf/ext/instagramapi/Resources/Public/Js/instafeed.min.js"></script>

   305 = TEXT
   305.value = <script src="typo3conf/ext/instagramapi/Resources/Public/Js/configInstagram.js"></script>
}
