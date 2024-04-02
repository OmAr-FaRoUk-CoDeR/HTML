<?php
header("Content-Type: application/json; charset=UTF-8");
$url = $_GET['brok'];
/// مصدر : قناتي @SuPeRx1 - معرفي @iMok7 ///
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.cole13.com/vidgrab/wp-json/aio-dl/video-data/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "url=$url&token=0fcb48c1f14fee946c2af864af52c3d416d01634858e2c6f102194b0c647c4f6");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
/// مصدر : قناتي @SuPeRx1 - معرفي @iMok7 ///
$headers = array();
$headers[] = 'Sec-Ch-Ua: \"Not:A-Brand\";v=\"99\", \"Chromium\";v=\"112\"';
$headers[] = 'Sec-Ch-Ua-Platform: \"Android\"';
$headers[] = 'Referer: https://www.cole13.com/vidgrab/';
$headers[] = 'Sec-Ch-Ua-Mobile: ?1';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 12; M2004J19C) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
/// مصدر : قناتي @SuPeRx1 - معرفي @iMok7 ///
$response = curl_exec($ch);
curl_close($ch);
$json =  json_decode($response);
echo json_encode($json,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);