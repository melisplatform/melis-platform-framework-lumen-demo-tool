<?php
namespace MelisPlatformFrameworkLumenDemoTool;


use MelisPlatformFrameworkLumenDemoTool\Listener\ZendRouterLumenRenderer;
use Laminas\Mvc\MvcEvent;
use Laminas\Session\Container;
use Laminas\Stdlib\ArrayUtils;

class Module
{
    /**
     * Bootstraping the module
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $this->createTranslations($e);
    }

    /**
     * Get config of this module
     * @return array
     */
    public function getConfig()
    {
        $config = array();
        $configFiles = array(
            include __DIR__ . '/../config/module.config.php',
            include __DIR__ . '/../config/app.interface.php',
            // plugins
            include __DIR__ . '/../config/plugins/LumenDemoToolTablePlugin.config.php',
        );
        foreach ($configFiles as $file) {
            $config = ArrayUtils::merge($config, $file);
        }

        return $config;
    }

    /**
     * Autoloader
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Laminas\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * Create translations dynamically depends on platform locale
     * @param $e
     * @param string $locale
     */
    public function createTranslations($e, $locale = 'en_EN')
    {
        $sm = $e->getApplication()->getServiceManager();
        $translator = $sm->get('translator');

        $container = new Container('meliscore');
        $locale = $container['melis-lang-locale'];

        if (!empty($locale)) {

            $translationType = [
                'interface',
                'forms',
                'install',
                'setup',
            ];

            $translationList = [];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../module/MelisModuleConfig/config/translation.list.php')) {
                $translationList = include 'module/MelisModuleConfig/config/translation.list.php';
            }

            foreach ($translationType as $type) {

                $transPath = '';
                $moduleTrans = __NAMESPACE__ . "/$locale.$type.php";

                if (in_array($moduleTrans, $translationList)) {
                    $transPath = "module/MelisModuleConfig/languages/" . $moduleTrans;
                }

                if (empty($transPath)) {

                    // if translation is not found, use melis default translations
                    $defaultLocale = (file_exists(__DIR__ . "/../language/$locale.$type.php")) ? $locale : "en_EN";
                    $transPath = __DIR__ . "/../language/$defaultLocale.$type.php";
                }
                // create translations
                if (file_exists($transPath)) {
                    $translator->addTranslationFile('phparray', $transPath);
                }
            }
        }

        $lang = explode('_', $locale);
        $lang = $lang[0];
    }
}