<?php

//
// This module add lesscss capabilities to SilverStripe CMS.
//
// 		How it works : 
//			- lessphp directory contains the "lessphp" project content (http://leafo.net/lessphp/#download)
//			- feel free to update it by simply untar the content in your silverstripe-lessphp directory
//			- code/LessPhp.php is a simple class with a static method that compiles less files to css ones
//
//		How to use it on your SilverStripe site :
//
//			- add the following to your mysite/code/Page.php controller init function :
//					if (Director::isDev() || isset($_GET['flush'])) {
//						$lessCompiled = LessPhp::compileThemedCssFiles();
//						if ($lessCompiled) SSViewer::flush_template_cache();
//					}
//
//			- create some .less files in lesscss sub-directory of your theme directory
//				example : /wwwroot/themes/mytheme/lesscss/layout.less
//				for more informations about lesscss, visit http://lesscss.org/
//
//			- refresh your browser, or if in live stage, add ?flush=1 to your url
//				- the module will compile all .less files found, 
//					resulting in some new css files in the css sub-directory of your theme directory
//						result example : /wwwroot/themes/mytheme/lesscss/layout.css
//					the resulting css should be automatically loaded in SilverStripe (flush_template_cache())
//
