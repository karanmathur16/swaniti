<?php

require __DIR__ . '/facebook-php-sdk-v4-4.0-dev/autoload.php';


use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('699063006887466', 'b4d6d8b4e4a7e373f3a6e9da22a36aea');

session_start();

use Facebook\FacebookRedirectLoginHelper;
 $helper = new FacebookRedirectLoginHelper('http://localhost/swaniti/likes.php' );
try {
    $session = $helper->getSessionFromRedirect();

} catch(FacebookRequestException $ex) {
 echo "1"   ;// When Facebook returns an error
} catch(\Exception $ex) {
    echo "2";// When validation fails or other local issues
}
if ( isset( $session ) ) {

$accessToken = $session->getAccessToken();
  $longLivedAccessToken = $accessToken->extend();

$id=$_SESSION['b'];
$json = file_get_contents('https://graph.facebook.com/'.$id.'/likes?summary=true&access_token='.$longLivedAccessToken);

$json_a = json_decode($json,true);
             echo "likes: " .$json_a['summary']['total_count'];
     


}   
?>

