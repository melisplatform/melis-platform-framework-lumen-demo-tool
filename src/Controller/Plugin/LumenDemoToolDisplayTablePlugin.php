<?php


namespace MelisPlatformFrameworkLumenDemoTool\Controller\Plugin;


use MelisEngine\Controller\Plugin\MelisTemplatingPlugin;
use Zend\View\Model\ViewModel;

/**
 * This plugin implements the business logic of the
 * "Lumen demo tool display table" plugin.
 *
 * Please look inside app.plugins.php for possible awaited parameters
 * in front and back function calls.
 *
 * front() and back() are the only functions to create / update.
 * front() generates the website view
 *
 * Configuration can be found in $pluginConfig / $pluginFrontConfig / $pluginBackConfig
 * Configuration is automatically merged with the parameters provided when calling the plugin.
 * Merge detects automatically from the route if rendering must be done for front or back.
 *
 * How to call this plugin without parameters:
 * $plugin = $this->LumenDemoToolDisplayTablePlugin();
 * $pluginView = $plugin->render();
 *
 * How to call this plugin with custom parameters:
 * $plugin = $this->LumenDemoToolDisplayTablePlugin();
 * $parameters = array(
 *      'template_path' => 'MelisLumenDemotool/render-plugin'
 * );
 * $pluginView = $plugin->render($parameters);
 *
 * How to add to your controller's view:
 * $view->addChild($pluginView, 'lumenDemoToolDisplayTable');
 *
 * How to display in your controller's view:
 * echo $this->lumenDemoToolDisplayTable;
 *
 *
 */
class LumenDemoToolDisplayTablePlugin extends MelisTemplatingPlugin
{
    private $lumenRoute = "/melis/lumen-plugin";

    public function __construct($updatesPluginConfig = [])
    {
        $this->configPluginKey = 'melisplatformframeworklumendemotool';
        $this->pluginXmlDbKey = 'LumenDemoToolDisplayTable';
        parent::__construct($updatesPluginConfig);
    }

    public function  front()
    {
        /**
         * melis platform frameworks service
         *
         * @var \MelisPlatformFrameworks\Service\MelisPlatformService $frameworksService
         */
        $frameworksService = $this->getServiceLocator()->get('MelisPlatformService');
        // set route
        $frameworksService->setRoute($this->lumenRoute);
        // get the content
        $lumenContent = $frameworksService->getContent();

        /*
         * construct view variables
         */
        $pluginData = $this->getFormData();
        // get preview mode
        $pluginData['previewMode'] = $this->previewMode;
        // get render mode
        $pluginData['renderMode'] = $this->renderMode;
        $viewVariables = [
            'lumenContent' => $lumenContent,
            'pluginData'   => $pluginData
        ];

        return $viewVariables;
    }

    /**
     * Returns the data to populate the form inside the modals when invoked
     * @return array|bool|null
     */
    public function getFormData()
    {
        $data = parent::getFormData();

        return $data;
    }
    public function createOptionsForms()
    {
        // construct form
        $factory = new \Zend\Form\Factory();
        $formElements = $this->getServiceLocator()->get('FormElementManager');
        $factory->setFormElementManager($formElements);
        $formConfig = $this->pluginBackConfig['modal_form'];

        $response = [];
        $render   = [];
        if (!empty($formConfig)) {
            foreach ($formConfig as $formKey => $config) {
                $request = $this->getServiceLocator()->get('request');
                $parameters = $request->getQuery()->toArray();

                if (!isset($parameters['validate'])) {

                    $viewModelTab = new ViewModel();
                    $viewModelTab->setTemplate($config['tab_form_layout']);
                    $viewRender = $this->getServiceLocator()->get('ViewRenderer');
                    $html = $viewRender->render($viewModelTab);

                    array_push($render, [
                            'name' => $config['tab_title'],
                            'icon' => $config['tab_icon'],
                            'html' => $html,
                            'empty' => 'Empty'
                        ]
                    );
                }
            }
        }

        if (!isset($parameters['validate'])) {
            return $render;
        }
        else {
            return $response;
        }

    }
    /**
     * This method will decode the XML in DB to make it in the form of the plugin config file
     * so it can overide it. Only front key is needed to update.
     * The part of the XML corresponding to this plugin can be found in $this->pluginXmlDbValue
     */
    public function loadDbXmlToPluginConfig()
    {
        $configValues = [];

        $xml = simplexml_load_string($this->pluginXmlDbValue);
        if ($xml) {
            if (!empty($xml->template_path))
                $configValues['template_path'] = (string)$xml->template_path;
            if (!empty($xml->lumen_route))
                $configValues['lumen_route'] = (string)$xml->lumen_route;
        }

        return $configValues;
    }

    /**
     * This method saves the XML version of this plugin in DB, for this pageId
     * Automatically called from savePageSession listenner in PageEdition
     */
    public function savePluginConfigToXml($parameters)
    {
        $xmlValueFormatted = '';

        // template_path is mendatory for all plugins
        if (!empty($parameters['template_path']))
            $xmlValueFormatted .= "\t\t" . '<template_path><![CDATA[' . $parameters['template_path'] . ']]></template_path>';
        if (!empty($parameters['lumen_route']))
            $xmlValueFormatted .= "\t\t" . '<lumen_route><![CDATA[' . $parameters['lumen_route'] . ']]></lumen_route>';

        // for resizing
        $widthDesktop = null;
        $widthMobile   = null;
        $widthTablet  = null;
        if (! empty($parameters['melisPluginDesktopWidth'])) {
            $widthDesktop =  " width_desktop=\"" . $parameters['melisPluginDesktopWidth'] . "\" ";
        }
        if (! empty($parameters['melisPluginMobileWidth'])) {
            $widthMobile =  "width_mobile=\"" . $parameters['melisPluginMobileWidth'] . "\" ";
        }
        if (! empty($parameters['melisPluginTabletWidth'])) {
            $widthTablet =  "width_tablet=\"" . $parameters['melisPluginTabletWidth'] . "\" ";
        }


        // Something has been saved, let's generate an XML for DB
        $xmlValueFormatted = "\t" . '<' . $this->pluginXmlDbKey . ' id="' . $parameters['melisPluginId'] . '"' .$widthDesktop . $widthMobile . $widthTablet . '>' .
            $xmlValueFormatted .
            "\t" . '</' . $this->pluginXmlDbKey . '>' . "\n";

        return $xmlValueFormatted;
    }
}