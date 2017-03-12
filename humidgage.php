<html>
  <head>
    <title>Auto-adjust</title>
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

  </head>
  <body>
    <div id="g1"></div>
	<script src="http://yecccmu-test.herokuapp.com/raphael-2.1.4.min.js"></script>
    <script src="http://yecccmu-test.herokuapp.com/justgage.js"></script>
    <script>
      var g1;

      window.onload = function(){
        var g1 = new JustGage({
          id: "g1",
          value: 40,
          min: 0,
          max: 100,
          title: "Humidity",
          label: "%"
        });


      };
    </script>
  </body>
</html>
