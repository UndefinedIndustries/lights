<?php 
    if(isset($_GET['status']) ){
            if ($_GET['status'] == "off"){
                #exec('./off.py');
                $test = shell_exec('sudo python off.py'); echo $test;
            }
            if ($_GET['status'] == "on"){
                #exec('./off.py');
                $test = shell_exec('sudo python on.py'); echo $test;
            }
    }
 ?>