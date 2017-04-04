<head>

    <script src="http://gavinscodetest.tk/js/1jquery.js"></script>
    <script>
        function getData(sys){
            var xhttp = new XMLHttpRequest();
            var test = document.getElementById(sys).name;
            
            var info="status="+sys;
            
            xhttp.open("GET", "/submit.php?"+info, true);
            console.log("sending");
            console.log(info);
            xhttp.send();
        }
        function update(){
                $("#data").load("check.php");
        }
        $( document ).ready(function() {
         setInterval(function(){
        
            $("#data").load("check.php");
        }, 2500);
        
        
        });
    </script>
</head> 
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link href="https://gavinscodetest.tk/css/style.css" rel="stylesheet" type="text/css"></link>
<center>
    <div id="data">
        <?php include 'check.php'; ?>
    </div>
</center>