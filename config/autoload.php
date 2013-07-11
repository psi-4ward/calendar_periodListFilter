<?php

/**
 * @copyright 4ward.media 2013 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */



// Register the classes
ClassLoader::addClasses(array
(
	'Contao\ModuleEventlistPeriodFilter' 	=> 'system/modules/calendar_periodListFilter/ModuleEventlistPeriodFilter.php',
));

// Register the templates
TemplateLoader::addFiles(array
(
	'mod_eventlist_periodiflter' 			=> 'system/modules/calendar_periodListFilter/templates',
	'event_list_periodfilter' 				=> 'system/modules/calendar_periodListFilter/templates',
));

