<?php
header('Access-Control-Allow-Origin: *');

if (!$_GET['location']) {
  print "You need to set 'location'.";
  exit();
}


$googleApiKey = 'YOUR_PRIVATE_KEY_GOES_HERE';
$mapsApiUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($_GET['location']) . '&key=' . $googleApiKey;

$headers = [
  'Accepts: application/json',
];
$request = $mapsApiUrl;

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,
  CURLOPT_HTTPHEADER => $headers,
  CURLOPT_RETURNTRANSFER => 1
));

$response = curl_exec($curl);
print_r($response);
curl_close($curl);
?>
