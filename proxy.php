<?php
header('Access-Control-Allow-Origin: *');

// get 'location' from url params (http://your.domain.com/proxy.php?location=foo)
if (!$_GET['location']) {
  print "You need to set 'location'.";
  exit();
}

// set api key and api url
$googleApiKey = 'YOUR_PRIVATE_KEY_GOES_HERE';
$mapsApiUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($_GET['location']) . '&key=' . $googleApiKey;

// set request headers
$headers = [
  'Accepts: application/json',
];
$request = $mapsApiUrl;

// get response from api
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,
  CURLOPT_HTTPHEADER => $headers,
  CURLOPT_RETURNTRANSFER => 1
));
$response = curl_exec($curl);

// send response to client
print_r($response);
curl_close($curl);
?>
