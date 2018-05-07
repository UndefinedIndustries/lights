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
	if(isset($_GET['timeon']) ){
		$time = $_GET['timeon'];	
		$test = shell_exec('mysql -h 192.168.1.143 -u root -proot -s -N -e "UPDATE Lighting.Time SET \`On\`= \'"'.$time.'"\'"');
		echo $test;
		
		
	}
if(isset($_GET['timeoff']) ){
		$time = $_GET['timeoff'];	
		$test = shell_exec('mysql -h 192.168.1.143 -u root -proot -s -N -e "UPDATE Lighting.Time SET \`Off\`= \'"'.$time.'"\'"');
		echo $test;
		
		
	}

header('Location: .');
 ?>