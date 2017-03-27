<!DOCTYPE html>
<html lang="en" data-ng-app="empApp">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="description" content="Employee Listing">
		<meta name="author" content="Vic Rubio">

		<title>Employee List</title>

		<!-- Bootstrap core CSS -->
		<link href="<?php echo site_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="<?php echo site_url('assets/css/app.css') ?>" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body data-ng-controller="empCtrl">

		<!-- Begin page content -->
		<div class="container">
			
			<div style="text-align:center">
				<h1>Employee List</h1>
				
				<h2 data-ng-show="employees.length == 0">No employees yet!</h2>
			</div>
			
			<form style="form-inline" role="form" ng-submit="addEmployee()">
				<div class="form-group col-md-10">
					<input type="text" class="form-control" name="employeeName" ng-model="employeeName" placeholder="Enter employee name" required>
				</div>
				<button type="submit" class="btn btn-primary">Add an Employee</button>
			</form>

			<div class="col-md-12" data-ng-show="employees.length > 0">
				<table class="table table-hover">
					<tbody>
						<tr data-ng-repeat="employee in employees track by $index">
							<td>{{ $index + 1 }}</td>
							<td><input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateTask(employees[$index])" ng-model="employees[$index].emp_name"></td>
							<td><input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateTask(employees[$index])" ng-model="employees[$index].emp_age"></td>
							<td style="text-align:center"><a class="btn btn-xs btn-default" ng-click="deleteTask(employees[$index])"><span class="glyphicon glyphicon-trash"></span></a></td>
						</tr>
					</tbody>
				</table>
			</div>
			
		</div>

		<script src="<?php echo site_url('assets/js/jquery.min.js') ?>"></script>
		<script src="<?php echo site_url('assets/js/bootstrap.min.js') ?>"></script>

		<script src="<?php echo site_url('assets/js/angular.min.js') ?>"></script>
		<script src="<?php echo site_url('assets/js/app.js') ?>"></script>
	</body>
</html>