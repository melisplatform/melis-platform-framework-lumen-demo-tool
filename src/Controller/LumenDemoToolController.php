<?php
namespace MelisPlatformFrameworkLumenDemoTool\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LumenDemoToolController extends AbstractActionController
{
    private $lumenUrl = "/melis/lumen-list";
    /**
     * Through this function lumen microframework will render
     * @return ViewModel
     */
    public function renderLumenAction()
    {
        // view model
        $view = new ViewModel();
        /**
         * melis platform frameworks service
         *
         * @var \MelisPlatformFrameworks\Service\MelisPlatformService $frameworksService
         */
        $frameworksService = $this->getServiceLocator()->get('MelisPlatformService');
        // set url
        $frameworksService->setRoute($this->lumenUrl);
        // get content
        $view->lumen = $frameworksService->getContent();
        $view->melisKey = $this->params()->fromRoute('melisKey','');

        return $view;
    }

    public function renderLumenAlbumModalAction()
    {
        $id = $this->params()->fromRoute('id', $this->params()->fromQuery('id', ''));

        $melisKey = $this->params()->fromRoute('melisKey', '');
        $title    = 'Lumen Album';
        $data     = array();

        $view = new ViewModel();

        $view->melisKey = $melisKey;
        $view->title    = $title;

        return $view;
    }
    public function renderLUmenAlbumModalContentAction()
    {
        $view = new ViewModel();
        /**
         * melis platform frameworks service
         *
         * @var \MelisPlatformFrameworks\Service\MelisPlatformService $frameworksService
         */
        $frameworksService = $this->getServiceLocator()->get('MelisPlatformService');
        $route = '/melis/lumen-get-album-form';
        // set url
        $frameworksService->setRoute($route);
        // set a variable
        $view->lumenContent = $frameworksService->getContent();

        return $view;
    }


}