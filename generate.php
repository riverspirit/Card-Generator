<?php

require_once("dompdf/dompdf_config.inc.php");

if ( isset( $_POST["html"] )) {

  if (get_magic_quotes_gpc()) {
      $_POST["html"] = stripslashes($_POST["html"]);
  }
  
  $dompdf = new DOMPDF();
  $dompdf->load_html($_POST["html"]);
  $dompdf->set_paper($_POST["paper"], $_POST["orientation"]);
  $dompdf->render();

  $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

  exit(0);
}

?>
