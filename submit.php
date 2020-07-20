  
<?php 
    if(isset($_GET['status']) ){
            if ($_GET['status'] == "off"){
                $test = shell_exec('sudo python /opt/lightpi/script/off.py'); echo $test;
            }
            if ($_GET['status'] == "on"){
                $test = shell_exec('sudo python /opt/lightpi/script/on.py'); echo $test;
            }
    }
?>
