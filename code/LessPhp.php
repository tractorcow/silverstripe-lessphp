<?php

require_once(dirname(__FILE__) . '/../lessphp/lessc.inc.php');

/**
 * Handles compliation of less files within the silverstripe theme directory
 * 
 * @author openhoat 
 */
class LessPhp
{

    /**
     * Flag to indicate whether this module should attempt to automatically load itself
     * @var boolean
     */
    public static $auto_load = true;

    /**
     * Flag indicating whether this module should also parse subthemes included under the current theme
     * @var type 
     */
    public static $include_subthemes = true;
    
    /**
     * Search regular expression for the file extension for less files. By default support for less files with either
     * the .less.css or .less extensions. The matched extension will be replaced with .css in the newly compiled file
     * @var string
     */
    public static $extension_mask = "/\.less(\.css)?$/i";

    /**
     * Determines the theme names that should be considered
     * @return type 
     */
    protected function findThemes()
    {
        if(!self::$include_subthemes)
            return array(SSViewer::current_theme());
        
        return array_filter(scandir(THEMES_PATH), function($theme){
            $currentTheme = SSViewer::current_theme();
            return preg_match("/^$currentTheme(_.+)?$/i", $theme);
        });
    }
    
    /**
     * Performs compilation of a specified theme path
     * @param string $themePath File path to the theme
     */
    protected function compileThemePath($themePath)
    {
        $lessCssPath = $themePath . "/lesscss";
        $cssPath = $themePath . "/css";
        
        // Ignore themes without a /lesscss folder
        if(!file_exists($lessCssPath))
            return;
        $lessFiles = scandir($lessCssPath);
        foreach ($lessFiles as $lessFilename)
        {
            if (!preg_match(self::$extension_mask, $lessFilename))
                continue;
            
            // Renames less files in the format layout.less.css or layout.less to layout.css
            $cssFilename = preg_replace(self::$extension_mask, '.css', $lessFilename);
            $lessFile = $lessCssPath . "/" . $lessFilename;
            $cssFile = $cssPath . "/" . $cssFilename;
            
            $this->updated = lessc::ccompile($lessFile, $cssFile) || $this->updated;
        }
    }
    
    /**
     * Record flag indicating whether this compiler has updated any files
     * @var boolean
     */
    protected $updated = false;

    /**
     * Performs compliation
     * @return boolean A flag indicating that any less files were generated or updated
     */
    public function CompileThemedCssFiles()
    {
        $themes = $this->findThemes();
        
        foreach($themes as $theme)
            $this->compileThemePath(THEMES_PATH."/".$theme);
        
        return $this->updated;
    }

}
