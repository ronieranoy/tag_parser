<?php

include_once ("inc_form.php");

if (isset ($_POST['fld_parser_url'])) {
  $f_parser_url = htmlentities(trim(mysql_escape_string($_POST['fld_parser_url'])));
  $f_parser_tag_start = htmlentities(trim(mysql_escape_string($_POST['fld_parser_tag_start'])));
  $f_parser_tag_end = htmlentities(trim(mysql_escape_string($_POST['fld_parser_tag_end'])));
  
  include_once ("parser_class.php");
  $Parse = new Parser;
  $result = $Parse->Curl_init($f_parser_url);

  $match = $Parse->RegEx_parser($f_parser_tag_start, $f_parser_tag_end, $result);
  if ($match) {
    echo "<pre>";
    print_r ($match[0]);
    echo "</pre>";
  }
  else {
    echo "<br>No match found.";
  }
}

?>
