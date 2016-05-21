<?php
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';

//If you are running this from subdir it comes handy xy.com/SubDir/...
$GLOBALS['SUBDIR'] = '';
//Fixing dependency issues
$GLOBALS['RESOURCE'] = $protocol . $_SERVER['HTTP_HOST'] . $GLOBALS['SUBDIR'] . '/';

?>
