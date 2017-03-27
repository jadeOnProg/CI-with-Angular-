var empApp = angular.module('empApp', []);

empApp.controller('empCtrl', function ($scope, $http) {
	
	$http.get('api/employees').success(function(data){
		$scope.employees = data;
		console.log(data);
	}).error(function(data){
		$scope.employees = data;
	});
	
	$scope.refresh = function(){
		$http.get('api/employees').success(function(data){
			$scope.employees = data;
		}).error(function(data){
			$scope.employees = data;
		});
	}
	
	$scope.addEmployee = function(){
		var newEmployee = {
								employeeName: $scope.employeeName
							};
		$http.post('api/employees', newEmployee).success(function(data){
			console.log(data);
			$scope.refresh();
			$scope.employeeName = '';
		}).error(function(data){
			alert(data.error);
		});
	}
	
	$scope.deleteEmployee = function(employee){
		$http.delete('api/employees/' + employee.id);
		$scope.employees.splice($scope.employees.indexOf(employee),1);
	}
	
	$scope.updateEmployee = function(employee){
		$http.put('api/employees', employee).error(function(data){
			alert(data.error);
		});
		$scope.refresh();
	}
	
});