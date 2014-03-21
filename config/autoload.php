<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package XExtendedFormTarget
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'cogizz',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'cogizz\ExtendedFormTarget' => 'system/modules/xExtendedFormTarget/classes/ExtendedFormTarget.php',
));
