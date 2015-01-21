<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initView()
    {

        $docTypeHelper = new Zend_View_Helper_Doctype();
        $docTypeHelper->doctype(Zend_View_Helper_Doctype::HTML5);

        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $config = Zend_Registry::get('config');
        define('MEDIA_URL', $config->app->mediaUrl);
        define('ELEMENTS_URL', $config->app->elementsUrl);
        define('SITE_URL', $config->app->siteUrl);
        define('STATIC_URL', $config->app->staticUrl);

        $view->addHelperPath('Core/View/Helper/', 'Core_View_Helper');

        $doctypeHelper = new Zend_View_Helper_Doctype();
        $doctypeHelper->doctype(Zend_View_Helper_Doctype::XHTML1_STRICT);
        $view->headTitle($config->resources->view->title)->setSeparator(' - ');
        $view->headMeta()->appendHttpEquiv('Content-Type',
            'text/html; charset=utf-8');
        $view->headMeta()->appendName("author", "slovacus");
        $view->headLink()->appendStylesheet($view->S('/css/style.css'));
        $view->headLink()->appendStylesheet($view->S(
                '/js/fancybox/jquery.fancybox.css'
            ));

        $view->headLink(array('rel' => 'shortcut icon',
            'href' => $view->S('/imagenes/favicon.ico')));
        $view->headScript()->appendFile($view->S('/js/libs/jquery-1.7.1.min.js'),
            'text/javascript', array('defer' => 'defer'));
        $view->headScript()->appendFile($view->S('/js/libs/modernizr-2.5.3-respond-1.1.0.min.js'),
            'text/javascript', array('defer' => 'defer'));
        $view->headScript()->appendFile($view->S('/js/fancybox/jquery.fancybox.js'),
            'text/javascript', array('defer' => 'defer'));
        $view->headScript()->appendFile($view->S('/js/plugins.js'),
            'text/javascript', array('defer' => 'defer'));
        $view->headScript()->appendFile($view->S('/js/script.js'),
            'text/javascript', array('defer' => 'defer'));
    }

}

