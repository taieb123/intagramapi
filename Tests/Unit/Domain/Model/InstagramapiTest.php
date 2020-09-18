<?php
namespace Instagramapi\Instagramapi\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Taieb.rekik <taieb.rekik@softtodo.com>
 */
class InstagramapiTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Instagramapi\Instagramapi\Domain\Model\Instagramapi
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Instagramapi\Instagramapi\Domain\Model\Instagramapi();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNewTokenReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNewToken()
        );
    }

    /**
     * @test
     */
    public function setNewTokenForStringSetsNewToken()
    {
        $this->subject->setNewToken('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'newToken',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOldTokenReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOldToken()
        );
    }

    /**
     * @test
     */
    public function setOldTokenForStringSetsOldToken()
    {
        $this->subject->setOldToken('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'oldToken',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getExpiresInReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getExpiresIn()
        );
    }

    /**
     * @test
     */
    public function setExpiresInForIntSetsExpiresIn()
    {
        $this->subject->setExpiresIn(12);

        self::assertAttributeEquals(
            12,
            'expiresIn',
            $this->subject
        );
    }
}
