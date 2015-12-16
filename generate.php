<?php

require_once("vendor/autoload.php");

use Dompdf\Dompdf;
use Dompdf\Options;

if ( isset( $_POST[ "html" ] ) && isset( $_POST[ "html2" ] ) ) {

	if ( get_magic_quotes_gpc() ) {
		$_POST[ "html" ] = stripslashes( $_POST[ "html" ] );
		$_POST[ "html2" ] = stripslashes( $_POST[ "html2" ] );
	}

	$card_data = $_POST[ "html" ] . $_POST[ "html2" ];
	$card_data = str_replace('../fonts/', 'fonts/', $card_data);
	$dompdf = new Dompdf();
	$options = new Options();
	$options->set( 'isRemoteEnabled', true );
	$dompdf->setOptions($options);
	$dompdf->load_html( $card_data );
	$dompdf->setPaper( 'card', 'portrait' );
	$dompdf->render();

	$dompdf->stream( "card", array( "Attachment" => false ) );

	exit( 0 );
}