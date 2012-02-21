<?php

//
// This module add lesscss capabilities to SilverStripe CMS.
// 
// Created by the brilliant https://github.com/openhoat and forked by https://github.com/tractorcow
//
// 		How it works : 
//			- lessphp directory contains the "lessphp" project content (http://leafo.net/lessphp/#download)
//			- feel free to update it by simply untar the content in your silverstripe-lessphp directory
//			- code/LessPhp.php is a simple class with a static method that compiles less files to css ones
//
//		How to use it on your SilverStripe site :
//
//			- Either do nothing and allow LessPhp to automatically build less files, or set 
//              LessPhp::$auto_load = false and add your own code to determine when compilation
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

if(LessPhp::$auto_load)
    Object::add_extension ('Page_Controller', 'LessPhpLoader');
