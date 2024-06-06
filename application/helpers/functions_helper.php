<?php
function debug( $var ) {
    echo '<pre>'; print_r($var); die();
}

function img_seo_name($s) {
    $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç');
    $eng = array('s','s','i','i','g','g','u','u','o','o','c','c');
    $s = str_replace($tr,$eng,$s);
    $s = strtolower($s);
	$s = preg_replace('/[^.%a-z0-9 _-]/', '', $s);
	$s = preg_replace('/&+?;/', '', $s);
    $s = preg_replace('/\s+/', '-', $s);
    $s = preg_replace('|-+|', '-', $s);
    $s = trim($s, '-');
 
    return $s;
}

function discount_20($price, $d=null){
    
    if($d != null){
        return number_format(($price*(0.8-$d)), 2,".","");
    }else{
        return number_format(($price*(0.8)), 2,".","");
    }
    
    
}

function send_email($domain, $to, $subject, $body){
	
	$endpoint = $domain."mail/gonder.php";
	$cURLConnection = curl_init();
		
	$params = array(
		'token' => 'gvdssad5adashdgvewh65dasfd5fv3r4rhgrvhdscsx5ef36cdefdch',
		'to' => $to,
		'subject' => $subject,
		'body' => $body
	);
	$url = $endpoint;
	
	curl_setopt($cURLConnection, CURLOPT_URL, $url);
	curl_setopt($cURLConnection, CURLOPT_POST, 1);
	curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, http_build_query($params));
	curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($cURLConnection);
	
	curl_close($cURLConnection);

	$response = json_decode($result, true);
	return $response;
	
}