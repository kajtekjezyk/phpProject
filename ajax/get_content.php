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
        $numer = $_POST['numer'];
        $tajemnica = $_POST['tajemnica'];
        $result = @$db_connect->query("select * from tajemnice where id=$numer and tajemnica='$tajemnica'");
        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $tajemnica = $row['tajemnica'];
            $nazwa = $row['nazwa'];
            $obraz = $row['zdjecie'];
            $tekst = $row['tekst'];
echo <<< END
        <h2 class="text-center">Tajemnica $tajemnica</h2>
        <p class="text-center">$nazwa</p>
        <div class="row mb-4">
            <div class="col-md-4 text-center">
                <img class="img-fluid" style="width: 164px; height: 216px;" src="$obraz">
            </div>
            <div class="col-md-8">
            $tekst
            </div>
        </div>
END;
            
        }
    }
?>
