<?php

require_once("vendor/autoload.php");
require_once("config.php");

use Dompdf\Dompdf;
use Dompdf\Options;

function resolveDependency($html) {
	$html = str_replace('../fonts/', 'fonts/', $html);
	$html = str_replace('src="../', 'src="'. $GLOBALS['IMG_PATH'], $html);
	return $html;
}

if ( isset( $_POST[ "html" ] ) && isset( $_POST[ "html2" ] ) ) {

	if ( get_magic_quotes_gpc() ) {
		$_POST[ "html" ] = stripslashes( $_POST[ "html" ] );
		$_POST[ "html2" ] = stripslashes( $_POST[ "html2" ] );
	}

	$card_data = resolveDependency($_POST[ "html" ] . $_POST[ "html2" ]);
	$dompdf = new Dompdf();
	$options = new Options();
	$options->set( 'isRemoteEnabled', true );
	$dompdf->setOptions($options);
	$dompdf->load_html( $card_data );
	$dompdf->setPaper( array(0,0,295.00, 175.50), 'portrait' );
	$dompdf->render();

	$dompdf->stream( "card", array( "Attachment" => false ) );

	exit( 0 );
}
