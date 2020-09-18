<?php
namespace Instagramapi\Instagramapi\Controller;

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
 * InstagramapiController
 */
class InstagramapiController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * instagramapiRepository
     * 
     * @var \Instagramapi\Instagramapi\Domain\Repository\InstagramapiRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $instagramapiRepository = null;

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $instagramapis = $this->instagramapiRepository->findAll();
        $this->view->assign('instagramapis', $instagramapis);
    }

    /**
     * action show
     * 
     * @param \Instagramapi\Instagramapi\Domain\Model\Instagramapi $instagramapi
     * @return void
     */
    public function showAction(\Instagramapi\Instagramapi\Domain\Model\Instagramapi $instagramapi)
    {
        
        $this->view->assign('instagramapi', $instagramapi);
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Instagramapi\Instagramapi\Domain\Model\Instagramapi $newInstagramapi
     * @return void
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     */
    public function createAction(\Instagramapi\Instagramapi\Domain\Model\Instagramapi $newInstagramapi)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->instagramapiRepository->add($newInstagramapi);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \Instagramapi\Instagramapi\Domain\Model\Instagramapi $instagramapi
     * @return void
     */
    public function editAction(\Instagramapi\Instagramapi\Domain\Model\Instagramapi $instagramapi)
    {
        $this->view->assign('instagramapi', $instagramapi);
    }

    /**
     * action update
     *
     * @param \Instagramapi\Instagramapi\Domain\Model\Instagramapi $instagramapi
     * @return void
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException
     */
    public function updateAction(\Instagramapi\Instagramapi\Domain\Model\Instagramapi $instagramapi)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->instagramapiRepository->update($instagramapi);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Instagramapi\Instagramapi\Domain\Model\Instagramapi $instagramapi
     * @return void
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     */
    public function deleteAction(\Instagramapi\Instagramapi\Domain\Model\Instagramapi $instagramapi)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->instagramapiRepository->remove($instagramapi);
        $this->redirect('list');
    }

    /**
     * action Instagram
     * 
     * @return void
     */
    public function instagramAction(){
        $results = $this->instagramapiRepository->findByFolder($this->settings);
        $token = '';
        foreach ($results as $key => $value) {
            $token = $value->getNewToken();
        }
        $assign = [
            'settings' => $this->settings,
            'token' => $token
        ];
        $this->view->assignMultiple($assign);
    }
}
