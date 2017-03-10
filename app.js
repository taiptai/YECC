var adminDash = angular.module('adminDash', [])

.controller('getData', ['$scope', '$http', function(s,h){
	s.save = function () {
		h.get("/weather/cron_tracking.php")
    	.then(function(response) {
        	console.log("success");
			console.log(response);
    	});
	 	
	 	
	 	console.log("3 HOUR");
	};
	setInterval(function(){
  		s.save();
	}, 108000000)

}]);