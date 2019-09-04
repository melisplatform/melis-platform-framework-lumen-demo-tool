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

        return $view;
    }


}