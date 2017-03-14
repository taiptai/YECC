<html>
    <head>
	
        <meta charset="UTF-8">
        <script src="https://netpie.io/public/netpieio/microgear.js"></script>
		<script src="http://yecccmu-test.herokuapp.com/raphael-2.1.4.min.js"></script>
		<script src="http://yecccmu-test.herokuapp.com/justgage.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
      body {
        text-align: center;
      }

      #g1 {
        width:200px; height:200px;
        display: inline-block;
        margin: 1em;
      }
    </style>
	<p hidden id="data"></p>
    </head>
    <body>
        <center>
         
		 <div id="g1"></div>
        </center>
    <script>
      const APPID     = 'SMART';
      const APPKEY    = '8bQ3bAAw8pWOvxW';
      const APPSECRET = 'J1xZ3Kaa3DZ0uHsVSOjqukv3F';

        var microgear = Microgear.create({
            key: APPKEY,
            secret: APPSECRET
        });

        microgear.on('message',function(topic,msg) {
           document.getElementById("data").innerHTML = msg;
        });

        microgear.on('present', function(event) {
            console.log(event);
        });

        microgear.on('absent', function(event) {
            console.log(event);
        });
		microgear.subscribe("/gearname/Smarthydro/temp")
        microgear.connect(APPID);
		
		
    var z1;
    document.addEventListener("DOMContentLoaded", function(event) {
        z1 = new JustGage({
            id: "g1",
			decimals: true,
            value: 0,
            min: 0,
            max: 50,
            title: "Temperature",
            label: "*C"
        });
	setInterval(function() {
            z1.refresh(document.getElementById("data").innerHTML);
        }, 2500);
    });
		</script>
    </body>
</html>
