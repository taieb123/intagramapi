
plugin.tx_instagramapi_instagramapi {
    view {
        # cat=plugin.tx_instagramapi_instagramapi/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:instagramapi/Resources/Private/Templates/
        # cat=plugin.tx_instagramapi_instagramapi/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:instagramapi/Resources/Private/Partials/
        # cat=plugin.tx_instagramapi_instagramapi/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:instagramapi/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_instagramapi_instagramapi//a; type=string; label=Default storage PID
        storagePid =
    }
}
