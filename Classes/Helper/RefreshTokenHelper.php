<?php
/**
 * Created by PhpStorm.
 * User: Softtodo
 * Date: 07/05/2020
 * Time: 11:01
 */

namespace Instagramapi\Instagramapi\Helper;

use Instagramapi\Instagramapi\Domain\Repository\InstagramapiRepository;
use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class RefreshTokenHelper
{
    public function RefreshMyToken()
    {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $instagramrepo = $objectManager->get(InstagramapiRepository::class);
        $result_db = $instagramrepo->findAll();

        $url = 'https://graph.instagram.com/refresh_access_token';
        foreach ($result_db as $key1 => $valueDB) {

            $data = [
                'grant_type' => 'ig_refresh_token',
                'access_token' => $valueDB->getNewToken()
            ];

            $params = '';
            foreach ($data as $key => $value)
                $params .= $key . '=' . $value . '&';

            $params = trim($params, '&');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $params); //Url together with parameters
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); //Timeout after 7 seconds
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
            curl_setopt($ch, CURLOPT_HEADER, 0);

            $result = curl_exec($ch);

            if (curl_errno($ch))  //catch if curl error exists and show it
                echo 'Curl error: ' . curl_error($ch);
            else {
                $data_result = (array)json_decode($result);

                $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_instagramapi_domain_model_instagramapi');
                $queryBuilder
                ->update('tx_instagramapi_domain_model_instagramapi')
                ->where(
                    $queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($valueDB->getUid(), \PDO::PARAM_INT))
                )
                ->set('new_token',$data_result['access_token'] )
                ->set('old_token',$valueDB->getNewToken())
                ->set('expires_in',$data_result['expires_in'])
                ->execute();
            }
            curl_close($ch);
        }
    }
}