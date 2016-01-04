<?php

/**
 * Injects hook required to ensure that less files are built when necessary
 *
 * @author Damian Mooyman
 */
class LessPhpLoader extends Extension
{

    /**
     * Performs automatic injection of LessPhp compilation
     */
    public function onAfterInit()
    {
        if (Director::isDev() || isset($_GET['flush'])) {
            $compiler = new LessPhp();
            $compiler->CompileThemedCssFiles();
        }
    }
}
