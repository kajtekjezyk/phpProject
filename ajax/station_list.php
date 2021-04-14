<?php
    function resultToArray($result)
    {
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    require_once "connect.php";
    $db_connect = @new mysqli($host, $db_user, $db_password, $db_name);
    
    if($db_connect->connect_errno!=0)
    {
        echo "Error: ".$db_connect->connect_errno;
    }
    else
    {
        $db_connect->query('SET NAMES utf8');
        $result = @$db_connect->query("SELECT tajemnica, nazwa FROM `tajemnice` ORDER BY CASE WHEN tajemnica = 'Radosna' THEN '1' WHEN tajemnica = 'Światła' THEN '2' WHEN tajemnica = 'Bolesna' THEN '3' WHEN tajemnica = 'Chwalebna' THEN '4' ELSE tajemnica END ASC ");
        if ($result->num_rows > 0)
        {
            $rows = resultToArray($result);
            $output_string = '{"stations":[';
            for($x = 0; $x < $result->num_rows; $x++)
            {
                $tajemnica = $rows[$x]['tajemnica'];
                $nazwa = $rows[$x]['nazwa'];
                if ($x == $result->num_rows - 1)
                {
                    $output_string .= '{"tajemnica":"'.$tajemnica.'","nazwa":"'.$nazwa.'"}]}';
                    continue;
                }
                $output_string .= '{"tajemnica":"'.$tajemnica.'","nazwa":"'.$nazwa.'"},';
            }
            echo $output_string;
        }
    }
?>
