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
 * Run in a custom namespace, so the class can be replaced
 */
namespace MCupic;

/**
 * Class ContentQuote
 *
 * Front end content element "quote".
 * @author    Marko Cupic
 * @package   Quote
 * @copyright Marko Cupic 2013
 */
class ContentQuote extends \ContentElement
{
       /**
        * Template
        * @var string
        */
       protected $strTemplate = 'ce_quote';

       /**
        * Parse the template
        * @return string
        */
       public function generate()
       {
              if (TL_MODE == 'BE')
              {
                     return '<p>' . $this->quoteAuthor . '</p><p>' . nl2br($this->quoteText) . '</p>';
              }

              // check for selected image
              $this->addImage = false;
              if (strlen($this->singleSRC && $this->addImageToQuote))
              {
                     $objFile = \FilesModel::findByPk($this->singleSRC);

                     if ($objFile !== null && is_file(TL_ROOT . '/' . $objFile->path))
                     {
                            // get size
                            $size = deserialize($this->size);

                            // get image
                            $src = \Image::get($objFile->path, $size[0], $size[1], $size[2]);

                            // Image dimensions
                            if (($imgSize = @getimagesize(TL_ROOT . '/' . rawurldecode($src))) !== false)
                            {
                                   $this->imgSRC = $src;
                                   $this->imageWidth = $imgSize[0];
                                   $this->imageHeight = $imgSize[1];
                                   $this->alt = strlen($this->alt) ? ampersand($this->alt) : ampersand($objFile->name);
                                   $this->addImage = true;
                            }
                     }

              }

              // add 'noimage' to the class property of the figure element, if no image was selected
              $arrCss = $this->cssID;
              $arrCss[1] = $this->addImage ? $arrCss[1] : $arrCss[1] . ' noimage';
              // overwrite cssClass
              $this->cssID = $arrCss;

              return parent::generate();
       }

       /**
        * Generate the content element
        */
       protected function compile()
       {
              // get image properties
              if ($this->addImage)
              {
                     $this->Template->imgSRC = $this->imgSRC;
                     $this->Template->imageWidth = $this->imageWidth;
                     $this->Template->imageHeight = $this->imageHeight;
                     $this->Template->alt = $this->alt;
              }

              // quoteAuthor, quoteText, quoteUrl
              $this->Template->quoteAuthor = $this->quoteAuthor;
              $this->Template->quoteText = $this->quoteText;
              $this->Template->quoteUrl = $this->quoteUrl;
       }

}
