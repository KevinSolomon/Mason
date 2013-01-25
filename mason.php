<?php
/*------------------------------------------------------------------------
# author    Kevin Solomon
# copyright Copyright © 2013 kevinsolomon.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.kevinsolomon.com
    -------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die;


# Pre-requisite's Joomla Variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx'); // parameter (menu entry)
$tpath = $this->baseurl.'/templates/'.$this->template;

#Template Param for Conditional Loading

# Load Modernizr
$loadModernizr = $this->params->get('modernizr');

#Load Support For Bad Browsers
$badBrowser = $this->params->get('badbrowser');

if ($badBrowser) 
{
$doc->addCustomTag('<!--[if (lt IE 9) & (!IEMobile)]>');
$doc->addCustomTag('<script src="'.$tpath.'/js/respond.min.js"></script>');
$doc->addCustomTag('<script src="'.$tpath.'/js/selectivizr-min.js"></script>');
$doc->addCustomTag('<![endif]-->');
}

# Load BootStrap CSS
$loadBootstrapCss = $this->params->get('bootstrapcss');

# Load BootStrap JS
$loadBootstrapJs = $this->params->get('bootstrapjs');

# Load Google JS
$loadGoogleanalytics  = $this->params->get('analytics');

# Load Mootools
$loadMootools = $this->params->get('mootools');


# If Load Mootools is NO then run this block to remove Mootools
if ( !$loadMootools ) {
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-more.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/modal.js']);
    unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools.js']);
    unset($doc->_scripts[$this->baseurl.'/plugins/system/mtupgrade/mootools.js']);
}


# Load Pie Lib for Certain CSS3 support for IE 8 :)))
$pie = $this->params->get('pie');

# Hide Component Output front Front Page
$paramFrontpage = $this->params->get('frontpage');

# Check if we are on the home page
$currentMenu = & JSite::getMenu();
if ($currentMenu->getActive() == $currentMenu->getDefault())
    {
        $siteHome = 'home';
    }
    else
    {
        $siteHome = 'sub';
    }


# Load the Generator Tag content
$loadGeneratorTag = $this->params->get('setGeneratorTag');

# Set the Generator tag content
if(isset($loadGeneratorTag) && $loadGeneratorTag != null){ 
   $this->setGenerator($loadGeneratorTag);
}
else {
    $this->setGenerator(null);    
}

# Load Style-Sheets
$doc->addStyleSheet($tpath.'/css/template.css.php?b='.$loadBootstrapCss.'&amp;v=1');

# Load Google fonts styles
$loadGooglewebfonts = $this->params->get('googleWebFonts');

if ($loadGooglewebfonts != "copy the css link from Google here") {
$doc->addStyleSheet(''.$loadGooglewebfonts.'');
}
if ($loadModernizr==1) $doc->addScript($tpath.'/js/modernizr-2.6.2.js'); // <- this script must be in the head

// unset scripts, put them into /js/template.js.php to minify http requests
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
?>