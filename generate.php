<?php

require_once("vendor/autoload.php");
require_once("config.php");

use Dompdf\Dompdf;
use Dompdf\Options;

function resolveDependency($html) {
	$html = str_replace('src="../../', 'src="'. $GLOBALS['RESOURCE'], $html);
	$html = str_replace('src="../', 'src="'. $GLOBALS['RESOURCE'], $html);

	return $html;
}

function getCSSFromHTML($html) {
	$css = '';
	preg_match_all("/(?<=link[\s]rel=\"stylesheet\"[\s]href=\"[.][.]\/css\/)(.*?)\"/", $html, $fmatches);

	foreach($fmatches as $key => $m) {
		if($key % 2 == 1) {
			$css .= file_get_contents('./css/' . $m[0]);
		}
	}

	return $css;
}

if ( isset( $_POST[ "html" ] ) && isset( $_POST[ "html2" ] ) ) {

	$frontPage = resolveDependency(stripslashes( $_POST[ "html" ] ));
	$backPage = resolveDependency(stripslashes( $_POST[ "html2" ]) );

	$frontPageCSS = getCSSFromHTML($frontPage);
	$backPageCSS = getCSSFromHTML($backPage);

	$mpdf = new mPDF('utf-8', array(93, 54.87), 0, '', 0, 0, 0, 0, 0, 0);
	$mpdf->WriteHTML($frontPageCSS, 1);
	$mpdf->WriteHTML($frontPage, 0);
	$mpdf->WriteHTML('<pagebreak>', 2);
	$mpdf->WriteHTML($backPageCSS, 1);
	$mpdf->WriteHTML($backPage, 0);
	$mpdf->Output('card.pdf', 'I');

	exit( 0 );
}
