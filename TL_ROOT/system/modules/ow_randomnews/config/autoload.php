<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package     ow_randomnews
 * @copyright   Heiko Unger, Odenwerk 2013
 * @author      Heiko Unger <odenwerk@gmail.com>
 * @link        https://contao.org
 * @license     http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'odenwerk',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'odenwerk\ow_randomnews' => 'system/modules/ow_randomnews/classes/ow_randomnews.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ow_randomnews' => 'system/modules/ow_randomnews/templates',
));
