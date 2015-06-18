

<?php


require __DIR__ . '/facebook-php-sdk-v4-4.0-dev/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

FacebookSession::setDefaultApplication('699063006887466', 'b4d6d8b4e4a7e373f3a6e9da22a36aea');

session_start();



 $helper = new FacebookRedirectLoginHelper('http://localhost/swaniti/connect.php' );
try {
    $session = $helper->getSessionFromRedirect();
} catch(FacebookRequestException $ex) {
    // When Facebook returns an error
} catch(\Exception $ex) {
    // When validation fails or other local issues
}
if ( isset( $session ) ) {
try {

$url=$_SESSION['a'];
  $response = (new FacebookRequest(
      $session, 'POST', '/me/photos', array(
        'message' => 'User provided message',
          'url'=> $url
      )
    ))->execute()->getGraphObject();


    echo "Posted with id: " . $response->getProperty('id');

} 

catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }
}



?>