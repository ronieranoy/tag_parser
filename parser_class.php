<?php

class Parser {
  
     Public function Curl_init ($f_parser_url) {
        $cSession = curl_init(); 
        curl_setopt($cSession,CURLOPT_URL,$f_parser_url);
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false); 
        $result=curl_exec($cSession);
        curl_close($cSession);
        return $result;
     } 
     
    Public Function RegEx_parser ($c_parser_tag_start, $c_parser_tag_end, $cresult) {
        $parser_preg_txt= html_entity_decode("'".$c_parser_tag_start."(.*?)".$c_parser_tag_end."'si");  
        preg_match_all("$parser_preg_txt", $cresult, $match);
        return $match;  
    }
}

?>