<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Card Generator | Mozilla Portal | Mozilla Kerala</title>
        <meta name="description" content="Card Generator for Mozillians">
        <!--    favicon     -->
        <link rel="shortcut icon" type="image/ico" href="images/favicon.ico">
        <!--    Facebook META Tags
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Card Generator | Mozilla Kerala">
        <meta property="og:title" content="Card Generator | Mozilla Kerala">
        <meta property="og:url" content="http://cards.mozillakerala.org">
        <meta property="og:description" content="Card Generator for Mozillians">
        <meta property="og:image" content="images/mozilla_og.png">
        <meta property="fb:page_id" content="290667851051610">  -->
        <!--    Cascade Style Sheets Includes       -->
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/tabzilla.css" />
        <script src="js/jquery-2.0.3.min.js"></script>
    </head>
    <body>

        <div id="page">

          <div id="header">
              <span>Card Generator</span>
              <div id="tabzilla">
                  <a href="https://www.mozilla.org/">Mozilla</a>
              </div>
          </div>
            <main>
            <div class="gen-select-template-container">
                Select card template:
                <select id="gen-select-template" class="" onchange="change()">
	               <?php
          					$files = scandir( './templates' );
          					$first = '';
          					foreach ( $files as $key => $file ) {
          						if ( is_file( './templates' . '/' . $file ) ) {
          							if ( 'Reps-Card.html' === $file ) {
          								unset( $files[$key] );
          							}
          						} else {
          							unset( $files[$key] );
          						}
          					}
          					$files[0] = 'Reps-Card.html';
          					ksort($files);
          					foreach ( $files as $file ) {
          						if ( empty( $first ) ) {
          							$first = $file;
          						}
          						echo '<option value="' . str_replace( '.html', '', $file ) . '">' . str_replace( '.html', '', $file ) . '</option>' . "\n";
          					}
        					?>
                </select>
            </div>
            <p class="help-text"><span class="heart">❤</span> Press <span class="shortcut-key">SHIFT</span> to highlight editable text. And click to edit.</p>
            <!-- TODO: Need to change this to support choosing other card templates. -->
            <div class="iframe-holder">
              <label for="avatar" class="upload-avatar">
                <div class="upload-icon">&#xf0ee;</div>
                <div class="notification">128x128</div>
                <input id="avatar" type="file" onchange="previewFile()">
              </label>
              <iframe id="gen-template-frame" src="templates/<?php echo $first ?>"></iframe>
            </div>
            <iframe id="gen-template-back-frame" src="templates/back/<?php echo $first ?>"></iframe>
            <form id="gen-create-form" action="generate.php" method="post">
                <textarea name="html" id="gen-html-textarea"></textarea>
                <textarea name="html2" id="gen-html-back-textarea"></textarea>
                <div>
                    <input type="button" value="Generate Card" id="gen-card-button" class="button" />
                </div>
            </form>
            <br>
          </main>
          <div id="footer"><br/>Created by fox lovers in Kerala & Hungary | <a href="https://github.com/MozillaKerala/Card-Generator/">Grab the code</a> and improve it. | <a href="https://github.com/MozillaKerala/Card-Generator/tree/master#how-to-add-new-card-template">Add</a> a new card template.<br/><br/></div>
        </div>
      </div>
      <script src="js/index.js"></script>
      <script src="js/google.js"></script>
      <script src="js/piwik.js"></script>
      <noscript>
	        <p><img src="//piwik.mozillakerala.org/piwik.php?idsite=6" style="border:0;" alt="" /></p>
      </noscript>
    </body>
</html>
