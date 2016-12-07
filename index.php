<?php

include_once ("inc_form.php");

if (isset ($_POST['fld_parser_url'])) {
  $f_parser_url = htmlentities(trim(mysql_escape_string($_POST['fld_parser_url'])));
  $f_parser_tag_start = htmlentities(trim(mysql_escape_string($_POST['fld_parser_tag_start'])));
  $f_parser_tag_end = htmlentities(trim(mysql_escape_string($_POST['fld_parser_tag_end'])));
  
  $cSession = curl_init(); 
  curl_setopt($cSession,CURLOPT_URL,$f_parser_url);
  curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($cSession,CURLOPT_HEADER, false); 
  $result=curl_exec($cSession);
  curl_close($cSession);

  $parser_preg_txt= "'".$f_parser_tag_start."(.*?)".$f_parser_tag_end."'si";
  $parser_preg_txt = html_entity_decode($parser_preg_txt);  
  preg_match_all("$parser_preg_txt", $result, $match);
  
  
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
