<?php
namespace Instagramapi\Instagramapi\Domain\Model;

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

/**
 * Instagramapi
 */
class Instagramapi extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * newToken
     * 
     * @var string
     */
    protected $newToken = '';

    /**
     * oldToken
     * 
     * @var string
     */
    protected $oldToken = '';

    /**
     * expiresIn
     * 
     * @var int
     */
    protected $expiresIn = 0;

    /**
     * Returns the newToken
     * 
     * @return string $newToken
     */
    public function getNewToken()
    {
        return $this->newToken;
    }

    /**
     * Sets the newToken
     * 
     * @param string $newToken
     * @return void
     */
    public function setNewToken($newToken)
    {
        $this->newToken = $newToken;
    }

    /**
     * Returns the oldToken
     * 
     * @return string $oldToken
     */
    public function getOldToken()
    {
        return $this->oldToken;
    }

    /**
     * Sets the oldToken
     * 
     * @param string $oldToken
     * @return void
     */
    public function setOldToken($oldToken)
    {
        $this->oldToken = $oldToken;
    }

    /**
     * Returns the expiresIn
     * 
     * @return int $expiresIn
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * Sets the expiresIn
     * 
     * @param int $expiresIn
     * @return void
     */
    public function setExpiresIn($expiresIn)
    {
        $this->expiresIn = $expiresIn;
    }
}
