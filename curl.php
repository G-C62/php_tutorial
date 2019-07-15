<?php
$url = 'http://localhost:5000/test_curl';
$id = $_POST['login_id'];
$pw = $_POST['login_pw'];
$from_url = $_POST['from_url'];

$postfields = array(
    'login_id' => $id,
    'login_pw' => $pw,
    'from_url' => $from_url
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields); 

$data = curl_exec($ch); 
 if (curl_error($ch))  
 { 
    exit('CURL Error('.curl_errno( $ch ).') '.curl_error($ch)); 
 } 
 curl_close($ch); 

 print_r($data); 
?>
<html>
<head>

</head>
<body>
<form method="POST">
id
<input type="text" name="login_id"/>
PW
<input type="password" name="login_pw"/>
<input id="from" type="hidden" name="from_url"/>
<button type="submit">echo_telegram login</button>
</form>
</body>
<script>
document.getElementById('from').value = location.href;
</script>
</html>
