
<html>
<head>
<title>
Photos
</title>
</head>
<body>
Post a Picture:
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
Enter URL:  <input type = "text" name="url"> <br>
<input type="submit" value="Submit" name="submit">
</form> 
Get Likes:
<form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
Enter Photo ID:  <input type = "text" name="id"> <br>
<input type="submit" value="Get Likes" name="submit1">
</form> 



<?php
//include the Facebook PHP SDK

require __DIR__ . '/facebook-php-sdk-v4-4.0-dev/autoload.php';
 
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
if(isset($_POST['submit']))
{

FacebookSession::setDefaultApplication('699063006887466', 'b4d6d8b4e4a7e373f3a6e9da22a36aea');
session_start();
$_SESSION['a']=$_POST['url'];

$helper = new FacebookRedirectLoginHelper($redirect_url='http://localhost/swaniti/connect.php', $appId = '699063006887466', $appSecret = 'b4d6d8b4e4a7e373f3a6e9da22a36aea');
$scope = array('publish_actions','user_photos');
$login=$helper->getLoginUrl();

header('Location: '.$login);
}

if(isset($_POST['submit1']))
{

FacebookSession::setDefaultApplication('699063006887466', 'b4d6d8b4e4a7e373f3a6e9da22a36aea');
session_start();
$_SESSION['b']=$_POST['id'];
$helper1 = new FacebookRedirectLoginHelper($redirect_url1='http://localhost/swaniti/likes.php', $appId1 = '699063006887466', $appSecret1 = 'b4d6d8b4e4a7e373f3a6e9da22a36aea');
$scope1 = array('publish_actions','user_photos');
$login1=$helper1->getLoginUrl();
header('Location: '.$login1);
}
?>
</body>
</html>
