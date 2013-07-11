<?php

/**
 * @copyright 4ward.media 2013 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */


$GLOBALS['TL_DCA']['tl_module']['fields']['eventlist_start'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['tl_module']['eventlist_start'],
	'inputType'	=> 'text',
	'eval'		=> array('tl_class'=>'w50'),
	'sql'		=> "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['eventlist_stop'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['tl_module']['eventlist_stop'],
	'inputType'	=> 'text',
	'eval'		=> array('tl_class'=>'w50'),
	'sql'		=> "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['palettes']['eventlist_priodfilter']   = '{title_legend},name,headline,type;{config_legend},cal_calendar,cal_noSpan,eventlist_start,eventlist_stop,cal_format,cal_ignoreDynamic,cal_order,cal_readerModule,;{template_legend:hide},imgSize;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
