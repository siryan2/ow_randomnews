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
 * Run in a custom namespace, so the class can be replaced
 */
namespace odenwerk;


/**
 * Class ow_randomnews
 *
 * Show random news
 * @copyright   Heiko Unger, Odenwerk 2013
 * @author      Heiko Unger <odenwerk@gmail.com>
 * @package     ow_randomnews
 */
class ow_randomnews extends \Module
{

    /**
	 * Template
	 * @var string
	 */
    protected $strTemplate = 'ow_randomnews';


	/**
	 * Generate the module
	 */
    protected function compile() {

        $objRandomNewsID = $this->Database->prepare("SELECT ow_randomnews, ow_randomnews_showteaser, ow_randomnews_showimage, ow_randomnews_showtitle FROM tl_module WHERE id = ?")
            ->execute($this->id);

        $newsarchiv = deserialize($objRandomNewsID->ow_randomnews);
        shuffle($newsarchiv);

        $objNews = $this->Database->prepare("SELECT id, headline, subheadline, teaser, addImage, singleSRC, size, caption FROM tl_news WHERE pid = ? AND published = 1")
            ->execute($newsarchiv);

        if ($objNews->addImage == 1 && $objRandomNewsID->ow_randomnews_showimage == 1)
        {
            $objImage = \FilesModel::findByUuid($objNews->singleSRC);

            if ($objNews->size != '')
            {
                $size = deserialize($objNews->size);
                $image = $this->generateImage($this->getImage($objImage->path, $size[0], $size[1], $size[2]), $objNews->caption);
            }

            $this->Template->image = '{{news_open::'.$objNews->id.'}}'.$image.'{{link_close}}';
            $this->Template->caption = $objNews->caption;

        }

        $this->Template->title = ($objRandomNewsID->ow_randomnews_showtitle == 1) ? '{{news_open::'.$objNews->id.'}}'.$objNews->headline.'{{link_close}}' : '';
        $this->Template->teaser = ($objRandomNewsID->ow_randomnews_showteaser == 1) ? $objNews->teaser : '';
        $this->Template->link = '{{news_url::'.$objNews->id.'}}';
        $this->Template->subheadline = $objNews->subheadline;
    }

}
