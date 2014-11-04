<?php

require_once("dompdf/dompdf_config.inc.php");

if ( isset( $_POST["html"] ) && isset( $_POST["html2"] )) {

  if (get_magic_quotes_gpc()) {
      $_POST["html"] = stripslashes($_POST["html"]);
      $_POST["html2"] = stripslashes($_POST["html2"]);
  }

  $card_data = $_POST["html"].$_POST["html2"];
  $dompdf = new DOMPDF();
  $dompdf->load_html($card_data);
  $dompdf->set_paper($_POST["paper"], $_POST["orientation"]);
  $dompdf->render();

  $dompdf->stream("card.pdf", array("Attachment" => false));

  exit(0);
}

?>