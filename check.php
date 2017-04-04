<?php 
    exec ( "gpio -g read 4", $status );
        foreach ($status as $value){
            if ($value == 1){
                 $data = "Off";
                 $color = "purple";
                 $toggle_to = "on";
                 $toggle_opp = "On";
              }else{
                  $data = "On"; 
                  $color = "green";
                  $toggle_to = "off";
                  $toggle_opp = "Off";
               }
        }
 ?>
 <br/>
 <span style="color: #fff;font-family:Arial;font-size: 2em;">
    Outdoor Lighting
    <br>
    Status: <?php echo $data; ?>
 </span>
 <br/>
 <br/>
 <form action="submit.php" method="get" onsubmit="return false;">
     <button id="<?php echo $toggle_to;?>" name="<?php echo $toggle_to;?>" class="w3-btn w3-<?php echo $color; ?> w3-xlarge" onclick="getData('<?php echo $toggle_to;?>')">
         Turn <?php 
             echo $toggle_opp;
          ?>
    </button>
</form>