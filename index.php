<?php
/*------------------------------------------------------------------------
# author    Kevin Solomon
# copyright Copyright © 2013 kevinsolomon.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.kevinsolomon.com
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die;
# Joomla ! variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx'); // parameter (menu entry)
$tpath = $this->baseurl.'/templates/'.$this->template;

# Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');


# Load Modernizr
$modernizr = $this->params->get('modernizr');
# Load BootStrap
$bootstrap = $this->params->get('bootstrap');
# Load PIE
$pie = $this->params->get('pie');
# Load Mootools
$loadMootools = $this->params->get('mootools');
# Load the Generator Tag content
$loadGeneratorTag = $this->params->get('setGeneratorTag');
# Set the Generator tag content
if(isset($loadGeneratorTag) && $loadGeneratorTag != null){
    $this->setGenerator($loadGeneratorTag);
}
else {
    $this->setGenerator(null);
}
# Load Google JS
$loadGoogleanalytics  = $this->params->get('analytics');

#Load the image if any
if ($this->params->get('logoFile'))
{
  $logo = '<img src="'. JURI::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('sitetitle'))
{
  $logo = '<span class="" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
  $logo = '<span class="" title="'. $sitename .'">'. $sitename .'</span>';
}


# load sheets and scripts
$doc->addStyleSheet($tpath.'/css/mason.css.php?b='.$bootstrap.'&amp;v=1');

# Load Google fonts styles
$loadGooglewebfonts = $this->params->get('googleWebFonts');
$loadGooglewebfont = explode(',',$loadGooglewebfonts);

foreach ($loadGooglewebfont  as $loadGooglewebfont) {
    if ($loadGooglewebfont != "copy the css link from Google here") {
    
    $doc->addStyleSheet($loadGooglewebfont);

  }
}



if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr-2.6.2.js'); // <- this script must be in the head

# unset scripts, put them into /js/template.js.php to minify http requests
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);

?>
<!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>

  <script type="text/javascript" src="<?php echo $tpath.'/js/mason.js.php?b='.$bootstrap.'&amp;v=1'; ?>"></script>
  <jdoc:include type="head" />
  <!-- mobile viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <!-- ipad --> <!-- iphone retina --> <!-- iphone, ipod, android -->
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114.png">
  <?php if ($pie==1) : ?>
    <!--[if lte IE 8]>
      <style> 
        {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
      </style>
    <![endif]-->
  <?php endif; ?>
</head>

<!-- ================================================== BODY STARTS ================================================== -->
<body class="<?php echo $pageclass; ?> <?php echo $option . " view-" . $view . " layout-" . $layout . " task-" . $task . " itemid-" . $itemid . " ";?>">

<!-- ======================== HEADER STARTS =================== -->
<header id="page-header" class="container">

   <!-- ======================== LOGO STARTS =================== -->
    <div class="row">
      <div class="span12 logo-container">
        <jdoc:include type="modules" name="logo" style="none" />
      </div>
    </div>
   <!-- ======================== LOGO ENDS =================== -->

  <!-- ======================== LOGO SUBTEXT STARTS =================== -->
    <div class="row">
       <div class="span12 logo-container">
        <jdoc:include type="modules" name="logo-subtext" style="none" />
      </div>
    </div>  
  <!-- ======================== LOGO SUBTEXT ENDS =================== -->  
</header>
<!-- ======================== HEADER ENDS =================== -->



<!-- ======================== NAVIGATION BAR  SECTION STARTS =================== -->
<section id="navigation-section" class="container">

  <div class="row">

    <div class="navbar-wrapper span12">

      <div class="container">
      <div class="navbar navbar-fixed-top navbar-fixed-top-margin">
      <div class="nav-top-border"></div>  
      <div class="navbar-inner">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">


          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
           
        <div class="nav-collapse collapse">
          <!-- ======================== ADD MENU MODULE POSITION HERE =================== -->
        </div>
        </div>     
        </div>
      </div>
    </div>
   </div> 
  </div> 
</section>
<!-- ======================== NAVIGATION BAR  SECTION ENDS =================== -->



<!-- ======================== SPOTLIGHT QUOTE SECTION STARTS ===================-->
<section id="spotlight-container-1" class="container">
   <jdoc:include type="modules" name="spotlight-quote" style="none" />
</section>
<!-- ======================== SPOTLIGHT QUOTE SECTION ENDS =================== -->




<!-- ======================== SPOTLIGHT XXX SECTION STARTS ===================-->
<section id="spotlight-container-2" class="container">
</section>
<!-- ======================== SPOTLIGHT XXX SECTION ENDS =================== -->



<!-- ======================== SPOTLIGHT XXX SECTION STARTS ===================-->
<section id="spotlight-container-3" class="container">
</section>
<!-- ======================== SPOTLIGHT XXX SECTION ENDS =================== -->



<!-- ======================== SPOTLIGHT XXX SECTION STARTS ===================-->
<section id="spotlight-container-4" class="container">
</section>
<!-- ======================== SPOTLIGHT XXX SECTION ENDS =================== -->



<!-- ======================== SPOTLIGHT XXX SECTION STARTS ===================-->
<section id="spotlight-container-5" class="container">
</section>
<!-- ======================== SPOTLIGHT XXX SECTION ENDS =================== -->



<!--Google Analytics Code Snippet -->
<?php if ($loadGoogleanalytics != "UA-XXXXX-X") : ?>
<script>
      var _gaq=[['_setAccount','<?php echo htmlspecialchars($loadGoogleanalytics); ?>'],["_trackPageview"]];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
          g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
          s.parentNode.insertBefore(g,s)}(document,"script"));
 </script>
<?php endif; ?>

</body>
<!-- ================================================== BODY ENDS ================================================== -->

</html>

