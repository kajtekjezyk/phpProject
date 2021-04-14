<?php
    require_once "connect.php";
    $db_connect = @new mysqli($host, $db_user, $db_password, $db_name);
    
    if($db_connect->connect_errno!=0)
    {
        echo "Error: ".$db_connect->connect_errno;
    }
    else
    {
        $db_connect->query('SET NAMES utf8');
        $okres = $_POST['okres'];
        $result = @$db_connect->query("select * from modlitwy where typ='$okres'");
        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            echo $row['tekst'];
        }
    }
?>
