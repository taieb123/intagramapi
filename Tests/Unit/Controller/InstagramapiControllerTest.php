<?php
namespace Instagramapi\Instagramapi\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Taieb.rekik <taieb.rekik@softtodo.com>
 */
class InstagramapiControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Instagramapi\Instagramapi\Controller\InstagramapiController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Instagramapi\Instagramapi\Controller\InstagramapiController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllInstagramapisFromRepositoryAndAssignsThemToView()
    {

        $allInstagramapis = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $instagramapiRepository = $this->getMockBuilder(\Instagramapi\Instagramapi\Domain\Repository\InstagramapiRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $instagramapiRepository->expects(self::once())->method('findAll')->will(self::returnValue($allInstagramapis));
        $this->inject($this->subject, 'instagramapiRepository', $instagramapiRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('instagramapis', $allInstagramapis);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenInstagramapiToView()
    {
        $instagramapi = new \Instagramapi\Instagramapi\Domain\Model\Instagramapi();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('instagramapi', $instagramapi);

        $this->subject->showAction($instagramapi);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenInstagramapiToInstagramapiRepository()
    {
        $instagramapi = new \Instagramapi\Instagramapi\Domain\Model\Instagramapi();

        $instagramapiRepository = $this->getMockBuilder(\Instagramapi\Instagramapi\Domain\Repository\InstagramapiRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $instagramapiRepository->expects(self::once())->method('add')->with($instagramapi);
        $this->inject($this->subject, 'instagramapiRepository', $instagramapiRepository);

        $this->subject->createAction($instagramapi);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenInstagramapiToView()
    {
        $instagramapi = new \Instagramapi\Instagramapi\Domain\Model\Instagramapi();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('instagramapi', $instagramapi);

        $this->subject->editAction($instagramapi);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenInstagramapiInInstagramapiRepository()
    {
        $instagramapi = new \Instagramapi\Instagramapi\Domain\Model\Instagramapi();

        $instagramapiRepository = $this->getMockBuilder(\Instagramapi\Instagramapi\Domain\Repository\InstagramapiRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $instagramapiRepository->expects(self::once())->method('update')->with($instagramapi);
        $this->inject($this->subject, 'instagramapiRepository', $instagramapiRepository);

        $this->subject->updateAction($instagramapi);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenInstagramapiFromInstagramapiRepository()
    {
        $instagramapi = new \Instagramapi\Instagramapi\Domain\Model\Instagramapi();

        $instagramapiRepository = $this->getMockBuilder(\Instagramapi\Instagramapi\Domain\Repository\InstagramapiRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $instagramapiRepository->expects(self::once())->method('remove')->with($instagramapi);
        $this->inject($this->subject, 'instagramapiRepository', $instagramapiRepository);

        $this->subject->deleteAction($instagramapi);
    }
}
