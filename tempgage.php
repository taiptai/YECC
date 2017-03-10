  <html>
  <head>
  <script src="http://yecccmu-test.herokuapp.com/justgage.js"></script>
  <script src="http://yecccmu-test.herokuapp.com/raphael-2.1.4.min.js"></script>
  
  <script>
  var guage = new JustGage({
    id: "gauge",
    value: 25,
    min: 0,
    max: 50,
    title: "Visitors"
  });
</script>
  </head>
  <body>
	  <center>
    <div id="gauge" class="200x160px"></div>
		</center>
  </body>
</html>
