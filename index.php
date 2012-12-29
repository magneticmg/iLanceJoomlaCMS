<?php

/* ==========================================================================*\
  || ######################################################################## ||
  || # MMInc PHP                                                            # ||
  || # Project: FishingNumbers                                             # ||
  || #  $Id:  $                                                             # ||
  || # $Date:  $                                                            # ||
  || # $Author:  $                                                          # ||
  || # $Rev: $                                                              # ||
  || # -------------------------------------------------------------------- # ||
  || # @Copyright (C) 2010 - Cameron Barr, Magnetic Merchandising Inc.      # ||
  || # @license GNU/GPL http://www.gnu.org/copyleft/gpl.html                # ||
  || # -------------------------------------------------------------------- # ||
  || # http://www.magneticmerchandising.com  info@magneticmerchandising.com # ||
  ||                                                                          ||
  || # -------------------------------------------------------------------- # ||
  || ######################################################################## ||
  \*========================================================================== */

// #### load required javascript ###############################################
$jsinclude = array(
    'functions',
    'ajax',
    'inline',
    'cron',
    'jquery',
    'modal',
    'autocomplete',
    'tabfx'
    
);
define('_JEXEC', 1);
define('DS', DIRECTORY_SEPARATOR);

define('LOCATION', 'cms');

define('CMSDIR', dirname(__FILE__) . '/cms/');

if (!defined('JPATH_BASE'))
    define('JPATH_BASE', CMSDIR);

require_once('./functions/config.php');

if (file_exists(dirname(__FILE__) . '/defines.php')) {

    include_once dirname(__FILE__) . '/defines.php';
}

require_once JPATH_BASE . '/includes/framework.php';

// #### require backend ########################################################
// save the ilance session

$session_cache = $_SESSION;

$k = session_id();

// set the joomla template always to iLance initially. SHould be available for change after. 
JRequest::setVar('template', 'ilance');

// get the application

$cms = JFactory::getApplication('site', array('session' => true));
session_id($k);

// Initialise the application.
// This method calls JFactory::getUser which starts a session for the app if none exists

$cms->initialise();

$_SESSION = array_merge($_SESSION, $session_cache);

jimport('joomla.plugin.helper');
jimport('joomla.language.helper');

JDEBUG ? $_PROFILER->mark('afterInitialise') : null;
// get the iLance session back in there. 
// Route the application.
$cms->route();
// Mark afterRoute in the profiler.
JDEBUG ? $_PROFILER->mark('afterRoute') : null;

// Dispatch the application.
$cms->dispatch();

JDEBUG ? $_PROFILER->mark('afterDispatch') : null;
$_SESSION = array_merge($_SESSION, $session_cache);
// Mark afterDispatch in the profiler.
JDEBUG ? $_PROFILER->mark('afterDispatch') : null;

// Render the application.
$cms->render();
JDEBUG ? $_PROFILER->mark('afterRender') : null;
// Mark afterRender in the profiler.
JDEBUG ? $_PROFILER->mark('afterRender') : null;

// Return the response.

ob_start();
echo $cms;
$cmsout = ob_get_clean();


$pprint_array = array('cmsout', 'login_include', 'headinclude', 'onload', 'area_title', 'page_title', 'site_name', 'https_server', 'http_server', 'lanceads_header', 'lanceads_footer');

$ilance->template->fetch('main', '/../cms.html');
$ilance->template->parse_hash('main', array('ilpage' => $ilpage));
$ilance->template->parse_if_blocks('main');
$ilance->template->pprint('main', $pprint_array);

exit();
