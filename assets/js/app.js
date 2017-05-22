var objApp = angular.module('objApp', []);

objApp.controller('objCtrl', function ($scope, $http) {
	
	$http.get('api/objects').success(function(data){
		$scope.objects = data;
	}).error(function(data){
		$scope.objects = data;
	});

	$scope.refresh = function(){
		$http.get('api/objects').success(function(data){
			$scope.objects = data;
		}).error(function(data){
			$scope.objects = data;
		});
	}
	
	$scope.addObject = function(){
		var new_object = {
			objectName: $scope.objectName
		};

		$http.post('api/objects', new_object).success(function(data){
			$scope.refresh();
			$scope.objectName = '';
		}).error(function(data){
			alert(data.error);
		});

	}
	
	$scope.deleteObject  = function(object){
		$http.delete('api/objects/' + object.id);
		$scope.objects.splice($scope.objects.indexOf(object),1);
	}
	
	$scope.updateObject = function(object){
		$http.put('api/objects', object).error(function(data){
			alert(data.error);
		});
		$scope.refresh();
	}
	
});