function  sockopen(   $domain    )  {
$contents  = NULL ; $i = 0 ;   
$host     = parse_url( $domain )['host']     ;
echo $url = explode (  $host ,  $domain )[1]   ;
$fp       = @fsockopen( "ssl://$host" , 443 , $errno, $errstr , 3 )   ;
//       echo '<br>  fsockopen  In '.excute().' Seconds'.'<br/>';  
if(   !$fp    )  {
       $contents   .= $errstr. ' (' . $errno . ')<br />'   ;
       echo (    $contents    )   ;  
}
else   {
$out = "GET ". $url." HTTP/1.1\r\n"   ; 
$out .= "Host: ".$host."\r\n"    ;
$out .= "User-Agent: Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9b5) Gecko/2008050509 Firefox/3.0b5\r\n"    ;
// $out .= "Referer: https://www.google.com/\r\n";
$out .= "Connection: Close\r\n\r\n"     ;    
// var_dump (    $out    )   ; 
  fwrite (  $fp   ,   $out    )   ;      //   fwrite  fgets         exit()  ;
  while  (  !feof(  $fp  )   )   {
   $i++;
   // if (  $i > 1  )
   // break ; 
   $contents .=   fread  (  $fp   , 4096   ) ;
}
// $contents  =   fread  (  $fp, 14096   )  ;
fclose(      $fp   )    ;  
}
// echo (    $contents    )   ;
echo  $i; 
return     $contents  ;
}
