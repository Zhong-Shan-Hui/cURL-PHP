<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cURL&PHP</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <script type = "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

</head>
<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_name=$_POST["u_name"];
    $data=$_POST["data"];
    $fields_string='';
    $url = 'http://verifiedperson.epizy.com/gobal_receive.php';
    $fields = array(
                        "u_name" => $u_name,
                         "data" => $data
                );

    //url-ify the data for the POST
    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');
    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    //execute post
     $result = curl_exec($ch);

    //close connection
    curl_close($ch);
}
?>

<body style="background-image: url('img/bg-01.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
  <div class="main_container login_signup_container">
    <center><h3>Send $_POST data from domain1.com to domain2.com Using cURL and PHP</h3></center>
    <form id="sub_tic" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="sender_name">Sender Name</label>
      <input type="text" id="u_name" name="u_name" placeholder="Enter your name" required>
      <label for="sender_msg">Sender Message</label>
      <input type="text" id="data" name="data" placeholder="Enter your message" required>      
      <input type="submit" id="submit" value="Submit"> 
    </form>
  </div>
</body>
</html>