<?php  require_once 'config.php';
    $u_name= $_POST['u_name'];
    $data= $_POST['data'];
    if (!empty($u_name) and !empty($data)) {
       
    $sql = "INSERT INTO receiver_tbl (u_name, data) VALUES ('$u_name', '$data')";
    if(mysqli_query($link, $sql))
    {
          echo "<center>Insert was succesful</center>";
    }
    else
    {
        echo "<center>Mysql_error";
    }
    mysqli_close($link);
    }
    else {
        echo "<center>Please fill the name and message</center>";
    }
?>