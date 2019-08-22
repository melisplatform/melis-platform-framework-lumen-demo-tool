<?php
namespace MelisPlatformFrameworkLumenDemoTool\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LumenDemoToolController extends AbstractActionController
{
    /**
     * Through this function lumen microframework will render
     * @return ViewModel
     */
    public function renderLumenAction()
    {
        // view model
        $view = new ViewModel();
        // get meliskey from route
        $melisKey = $this->params()->fromRoute('melisKey');
        /**
         * melis core config service
         *
         * @var \MelisCore\Service\MelisCoreConfigService $coreConfig
         */
        $coreConfig = $this->getServiceLocator()->get('MelisCoreConfig');
        // get tool configs
        $appConfig = $coreConfig->getItem($melisKey);
        // get lumen_url key
        if (! isset($appConfig['forward']['lumen_url'])) {
            throw new \Exception("No lumen url was set in app.interface.php [melis_platform_framework_lumen_demo][interface][melis_platform_framework_lumen_demo_tool][forward]");
        }
        /**
         * melis platform frameworks service
         *
         * @var \MelisPlatformFrameworks\Service\MelisPlatformService $frameworksService
         */
        $frameworksService = $this->getServiceLocator()->get('MelisPlatformService');
        // set url
        $frameworksService->setRoute($appConfig['forward']['lumen_url']);
        // get content
        $view->lumen = $frameworksService->getContent();

        return $view;
    }


}