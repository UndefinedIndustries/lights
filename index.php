<head>
    <script src="https://gt3ch1.tk/js/1jquery.js"></script>
    <script>
        function getData(sys){
            var xhttp = new XMLHttpRequest();
            var test = document.getElementById(sys).name;
            var info="status="+sys;
            xhttp.open("GET", "submit.php?"+info, true);
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

	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link href="/modules/SQLSprinkler/css/style.css" rel="stylesheet" type="text/css"></link>
</head> 
<body>

<style>
.btn{

float:none!important;
}
</style>
<div style="position:fixed;top:0;left:0;">

<a href="../.." class="w3-btn w3-hover-pink" style="float: left">Home</a> &nbsp <a href="edit.php" class="w3-btn w3-hover-pink" style="float: left">Config</a>

	</div>

<center>
    <div id="data">
        <?php include 'check.php'; ?>
    </div>
</center>
</body>