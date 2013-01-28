<?php
/*------------------------------------------------------------------------
# author    Kevin Solomon
# copyright Copyright © 2013 kevinsolomon.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.kevinsolomon.com
-------------------------------------------------------------------------*/

// required header info and character set
header("Content-type: application/x-javascript");
// cache control to process
header("Cache-Control: must-revalidate");
// duration of cached content (1 hour)
$offset = 60 * 60 ;
// expiration header format
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s",time() + $offset) . " GMT";
// send cache expiration header to broswer
header($ExpStr);

// parameter
$bootstrap = $_GET['b'];
$mootools = $_GET['m'];

if ($bootstrap==1) require('jquery-1.8.3.min.js');
if ($bootstrap==1) require('bootstrap.min.js');

if($mootools==1){
	require('../../../media/system/js/mootools-core.js');
	require('../../../media/system/js/core.js');
	require('../../../media/system/js/caption.js');
}

?>