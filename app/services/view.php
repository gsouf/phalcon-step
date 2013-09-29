<?php
use Phalcon\Mvc\View,
    Phalcon\Mvc\View\Engine\Twig as TwigEngine,
    \PhalconStep\Service\Device;
/**
 * Setting up the view component
 */
$di->set('view', function() use ($config,$di) {

    
    $view = new View();

    $view->setViewsDir(
        $config->application->viewsDir
      . ($di->get("device")->getApplicationDeviceType()==Device::DEVICE_MOBILE ? "mobile/" : "desktop/")
    );

    $view->registerEngines(array(
      
        '.twig' => function($view, $di) use ($config) {

            $twig = new TwigEngine($view, $di, array('charset' => DEFAULT_ENCODING /*, 'debug' => true*/) );
            $te=$twig->getTwig();
            $te->getLoader()->addPath($config->application->viewsDir . "share/");
            

            $enableViewCache = true;

            if(PhalconStep::isDevEnvironment()){
                // add the twig debug extension
                $te->addExtension(new Twig_Extension_Debug());
                $enableViewCache = $di->get("dev")->enableViewCache();
                $te->addGlobal("pStepDevHelper",$di->get("dev"));
            }

            if($enableViewCache)
                // add cache only if not in dev
                $te->setCache($config->application->cacheDir."/twig");

            // time() function
            $te->addFunction(
                new Twig_SimpleFunction('time',function(){return time();})
            );

            return $twig;
        }
        
        
    ));

    return $view;
}, true);
