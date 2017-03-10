  <html>
  <head>
  <script src="http://yecccmu-test.herokuapp.com/justgage.js"></script>
  <script src="http://yecccmu-test.herokuapp.com/raphael-2.1.4.min.js"></script>
  
  <script>
  var g = new JustGage({
    id: "gauge",
    value: 25,
    min: 0,
    max: 50,
    title: "Temperature"
  });
</script>
  </head>
  <body>

    <div id="gauge" style="width: 300px; height: 200px"></div>

  </body>
</html>
