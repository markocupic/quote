<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Quote
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'MCupic',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'MCupic\ContentQuote' => 'system/modules/quote/ContentQuote.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_quote' => 'system/modules/quote/templates',
));
