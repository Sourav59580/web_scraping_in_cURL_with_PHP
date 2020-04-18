<?php

$h = curl_init();
$data = $_POST['search'];
$data = strtolower($data);
$data = ucwords($data);
$data = str_replace(" ","_",$data);
$url = "https://en.wikipedia.org/wiki/".$data;
curl_setopt_array($h,array(
    CURLOPT_URL => $url,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true
));

$result = curl_exec($h);

if($result)
{ 
   echo $result;
}else{
    echo "Unable to connect please write the correct url";
}
curl_close($h);











?>