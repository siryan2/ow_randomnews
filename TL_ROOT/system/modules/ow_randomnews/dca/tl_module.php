<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * RandomNews
 *
 * @copyright  Heiko Unger, Odenwerk 2013
 * @author     Heiko Unger <odenwerk@gmail.com>
 * @package    ow_randomnews
 * @license    LGPL
 * @filesource
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['ow_randomnews'] = '{title_legend},name,headline,type;{config_legend};{ow_randomnews_legend},ow_randomnews,ow_randomnews_showtitle,ow_randomnews_showteaser,ow_randomnews_showimage;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['ow_randomnews'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['ow_randomnews'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
    'foreignKey'             => 'tl_news_archive.title',
	'eval'                    => array('multiple'=>true, 'mandatory'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['ow_randomnews_showteaser'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['ow_randomnews_showteaser'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('mandatory'=>false),
	'sql'                     => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['ow_randomnews_showimage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['ow_randomnews_showimage'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('mandatory'=>false),
	'sql'                     => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['ow_randomnews_showtitle'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['ow_randomnews_showtitle'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('mandatory'=>false),
	'sql'                     => "char(1) NOT NULL default '0'"
);
