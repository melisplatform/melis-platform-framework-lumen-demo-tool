<?php
namespace MelisPlatformFrameworkLumenDemoTool\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LumenDemoToolController extends AbstractActionController
{
    /**
     * Through this function lumen will render
     * @return ViewModel
     */
    public function renderLumenAction()
    {
        $view = new ViewModel();
        $this->serviceLocator->get('MelisDispatchThirdPartyService')->setRoute('/lumen');
        $view->lumen = $this->serviceLocator->get('MelisDispatchThirdPartyService')->getContent();

        return $view;
    }


}