
<!doctype html>
<head>
<script src='https://www.google.com/recaptcha/api.js'></script>
<meta charset="UTF-8">

<title>Website </title>

<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
<h1> Login form</h1>
<form action="" method="post">
Username : <input type="text" name="name"><br>
Password : <input type="password" name="password"><br><br>
<div class="g-recaptcha" data-sitekey="6LfLi6keAAAAAAdnOz_YNVzEdVIHWY8FwN8RvU1O"></div>
<input type="submit" name="submit" value="submit">

</form>
<?php
if(isset($_POST['submit']))
$user = $_POST['name'];
$pass = $_POST['password'];
if ($user !="Jay" && $pass !="admin")
echo 'Username or Password is incorrect!<br>'
?>

<?php

if(isset($_POST['submit']))
{

function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LfLi6keAAAAAAY0tuXZr2ZbIvn97uMBV4-5VAUB',
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }


    // Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);

    if ($result['success']) {
        //If the user has checked the Captcha box
           
  
	
    } else {
        
       echo "Please Check captcha";
    }
}
    ?>
    <?php

if ($user =="Jay" && $pass =="admin" && ($result)['success']){
echo '<script type="text/javascript">;
window.location="valid.php";
</script>';
}?>


    
    </body>
    </html>
    