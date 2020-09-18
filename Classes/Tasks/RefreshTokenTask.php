<?php
/**
 * Created by PhpStorm.
 * User: Softtodo
 * Date: 07/05/2020
 * Time: 10:59
 */

namespace Instagramapi\Instagramapi\Task;

use Instagramapi\Instagramapi\Helper\RefreshTokenHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Scheduler\Task\AbstractTask;


class RefreshTokenTask extends AbstractTask
{
    public function execute()
    {
        try {
            $refreshtokenHelper = GeneralUtility::makeInstance(RefreshTokenHelper::class);
            $refreshtokenHelper->RefreshMyToken();
            return true;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die;
        }
    }
}