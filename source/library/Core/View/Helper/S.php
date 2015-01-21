<?php

/**
 * S view Helpers is a Loader for Static files
 * providing ability to read prefix from config 
 * and suffix a versioning query string 
 *
 * @author eanaya Ernesto Anaya
 */
class Core_View_Helper_S extends Zend_View_Helper_HtmlElement
{

    /**
     * @param  String
     * @return string
     */
    public function S($file)
    {
        /**
         * @todo cache to avoid file reading frequently
         * @tutorial use a post-commit hook 
         */
        $lc_file = APPLICATION_PATH . '/../last_commit';
        if (is_readable($lc_file)) {
            $vqs = trim(file_get_contents($lc_file));
        } else {
            $vqs = date('YmdHi');
        }

        return STATIC_URL . $file . '?' . $vqs;
    }

}