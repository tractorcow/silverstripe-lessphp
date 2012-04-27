<?php

require_once(dirname(__FILE__) . '/../lessphp/lessc.inc.php');

class LessPhp {

	public static function compileThemedCssFiles() {
		$themePath = THEMES_PATH."/".SSViewer::current_theme();
		$lessCssPath = $themePath."/less";
		$cssPath = $themePath."/css";
		$lessFiles = scandir($lessCssPath);
		$updated = false;
		foreach($lessFiles as $lessFilename) {
			if (!preg_match("/\.less/", $lessFilename)) continue;
			$pathParts = pathinfo($lessFilename);
			$cssFilename = $pathParts['filename'].".css";
			$lessFile = $lessCssPath."/".$lessFilename;
			$cssFile = $cssPath."/".$cssFilename;
            
//           Debug::message("lessFile=$lessFile, cssFile=$cssFile");

/*			if (!is_file($cssFile) || filemtime($lessFile) > filemtime($cssFile)) {
				$less = new lessc($lessFile);
				$less->importDir = $lessCssPath;
				file_put_contents($cssFile, $less->parse());
			}
*/
			$updated = $updated || lessc::ccompile($lessFile, $cssFile);
		}
		return $updated;
	}
}
