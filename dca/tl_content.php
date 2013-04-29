<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package   Quote
 * @author    Marko Cupic
 * @license   GNU/LGPL
 * @copyright Marko Cupic 2013
 */


/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'addImageToQuote';
$GLOBALS['TL_DCA']['tl_content']['palettes']['quote'] = '{type_legend},type;{quote_legend},quoteText,quoteAuthor,quoteOrganization,quoteUrl;{image_legend},addImageToQuote;{protected_legend:hide},protected;{expert_legend:hide},align,space,cssID';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addImageToQuote'] = 'singleSRC,alt,size';

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['addImageToQuote'] = array
(
       'label' => &$GLOBALS['TL_LANG']['tl_content']['addImage'],
       'exclude' => true,
       'inputType' => 'checkbox',
       'eval' => array('submitOnChange' => true),
       'sql' => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['quoteText'] = array
(
       'label' => &$GLOBALS['TL_LANG']['tl_content']['quoteText'],
       'exclude' => true,
       'search' => true,
       'inputType' => 'textarea',
       'eval' => array('mandatory' => true),
       'sql' => "mediumtext NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['quoteAuthor'] = array
(
       'label' => &$GLOBALS['TL_LANG']['tl_content']['quoteAuthor'],
       'exclude' => true,
       'search' => true,
       'inputType' => 'text',
       'eval' => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'),
       'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['quoteOrganization'] = array
(
       'label' => &$GLOBALS['TL_LANG']['tl_content']['quoteOrganization'],
       'exclude' => true,
       'search' => true,
       'inputType' => 'text',
       'eval' => array('maxlength' => 255, 'tl_class' => 'w50'),
       'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['quoteUrl'] = array
(
       'label'                   => &$GLOBALS['TL_LANG']['tl_content']['quoteUrl'],
       'exclude'                 => true,
       'search'                  => true,
       'inputType'               => 'text',
       'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
       'wizard' => array
       (
              array('tl_content', 'pagePicker')
       ),
       'sql'                     => "varchar(255) NOT NULL default ''"
);