<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Card Generator | Mozilla Portal | Mozilla Kerala</title>
        <meta name="description" content="Card Generator for Mozillians">
  
        <!--    favicon     -->
        <link rel="shortcut icon" type="image/ico" href="images/favicon.ico">

        <!-- For Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Card Generator | Mozilla Kerala">
        <meta property="og:title" content="Card Generator | Mozilla Kerala">
        <meta property="og:url" content="http://cards.mozillakerala.org">
        <meta property="og:description" content="Card Generator for Mozillians">
        <meta property="og:image" content="images/mozilla_og.png">
        <meta property="fb:page_id" content="290667851051610">

        <!--    Cascade Style Sheets Includes       -->
        <link rel="stylesheet" href="css/style.css" />

        <!--    Tabzilla stylesheet     -->
        <link rel="stylesheet" type="text/css" href="//mozorg.cdn.mozilla.net/media/css/tabzilla-min.css" />

        <!--    Javascript Includes     -->
        <script src="js/jquery-2.0.3.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#gen-card-button').click(function () {
                    var template_html = $("#gen-template-frame").contents().find('html').html();
                    $('#gen-html-textarea').val(template_html);
                    $('#gen-create-form').submit();
                });
            });
        </script>
    </head>
    
    <body>
        
        <div id="page">
            <a href="/en-US/" id="tabzilla">mozilla</a>

            <div id="header">
                <span>Card Generator</span>
            </div>
            
            <div class="gen-select-template-container">
                Select card template: 
                <select id="gen-select-template" class="">
                    <?php
                        $dir = __DIR__.'/templates';

                        if (is_dir($dir)) {
                            if ($dh = opendir($dir)) {
                                while (($file = readdir($dh)) !== false) {
                                    if ($file != '.' && $file != '..') {
                                        $template_name = rtrim($file, '.html');
                                        echo "<option value='". $template_name ."'>". $template_name ."</option>";
                                    }
                                }
                                closedir($dh);
                            }
                        }
                    ?>
                </select>
            </div>
            
            <!-- TODO: Need to change this to support choosing other card templates. -->
            <iframe id="gen-template-frame" src="templates/reps-card.html"></iframe>
            
            <form id="gen-create-form" action="generate.php" method="post">
                <input name="paper" type="hidden" value="card"/>
                <input name="orientation" type="hidden" value="portrait"/>

                <textarea name="html" id="gen-html-textarea"></textarea>

                <div style="text-align: center; margin-top: 1em;">
                    <input type="button" value="Generate Card" id="gen-card-button" class="button" />
                </div>
            </form>
            
            <div id="footer"><br/>Created by fox lovers in Kerala | <a href="https://github.com/MozillaKerala/Card-Generator/">Grab the code</a> and improve it. | <a href="https://github.com/MozillaKerala/Card-Generator/tree/master#how-to-add-new-card-template">Add</a> a new card template.<br/><br/></div>

        </div>

    </body>

</html>
