<?php

/**
 * @copyright 4ward.media 2013 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 
namespace Contao;

class ModuleEventlistPeriodFilter extends \ModuleEventlist
{

	protected $strTemplate = 'mod_eventlist_periodiflter';


	public function __construct($objModule, $strColumn='main')
	{
		parent::__construct($objModule, $strColumn);
		$this->cal_template = 'event_list_periodfilter';
	}


	protected function compile()
	{
		parent::compile();

		echo \Date::formatToJs($GLOBALS['objPage']->dateFormat);

		$this->Template->filterStart = $this->genDate($this->eventlist_start);
		$this->Template->filterStop  = $this->genDate($this->eventlist_stop);
		$this->Template->pickerFormat = $this->getJsDateFormat();
	}

	protected function genDate($val)
	{
		if(preg_match("~^\d{4}-\d{2}-\d{2}$~", $val, $erg))
			return date($GLOBALS['objPage']->dateFormat, mktime(0,0,0,$erg[2],$erg[3],$erg[1]));
		elseif (preg_match("~^([+-])(\d+)$~", $val, $erg))
		{
			$offset = 3600*24*$erg[2];
			return date($GLOBALS['objPage']->dateFormat, time() + $offset * (($erg[1]=='+')?1:(-1)));
		}
		return date($GLOBALS['objPage']->dateFormat, time() + $offset * (($erg[1]=='+')?1:(-1)));
	}

	protected function getJsDateFormat()
	{
		$chunks = str_split($GLOBALS['objPage']->dateFormat);

		foreach ($chunks as $k=>$v)
		{
			switch ($v)
			{
				case 'l': $chunks[$k] = 'dddd'; break;
				case 'D': $chunks[$k] = 'ddd'; break;
				case 'd': $chunks[$k] = 'dd'; break;
				case 'j': $chunks[$k] = 'd'; break;
				case 'n': $chunks[$k] = 'm'; break;
				case 'm': $chunks[$k] = 'mm'; break;
				case 'M': $chunks[$k] = 'mmm'; break;
				case 'F': $chunks[$k] = 'mmmm'; break;
				case 'Y': $chunks[$k] = 'yyyy'; break;
				case 'y': $chunks[$k] = 'yy'; break;
			}
		}

		return preg_replace('/([a-zA-Z])/', '$1', implode('', $chunks));
	}
}