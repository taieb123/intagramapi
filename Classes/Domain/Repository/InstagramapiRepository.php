<?php
namespace Instagramapi\Instagramapi\Domain\Repository;

/***
 *
 * This file is part of the "instagram_api" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Taieb.rekik <taieb.rekik@softtodo.com>, soft 2 do
 *
 ***/
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
/**
 * The repository for Instagramapis
 */
class InstagramapiRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function initializeObject()
    {
        $defaultQuerySettings = $this->objectManager->get(Typo3QuerySettings::class);
        $defaultQuerySettings->setRespectStoragePage(False);
        $this->setDefaultQuerySettings($defaultQuerySettings);
    }

    public function findByFolder($settings){

        $query = $this->createQuery();
        $query->getQuerySettings()->setStoragePageIds([0 => (int)$settings['startingpoint']]);
        return $query->execute();
    }
}
