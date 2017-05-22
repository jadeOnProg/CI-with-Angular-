<!DOCTYPE html>
<html lang="en" data-ng-app="objApp">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="description" content="Object Listing">
		<meta name="author" content="Vic Rubio"> 

		<title>Object List</title>

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

	<body data-ng-controller="objCtrl">

		<!-- Begin page content -->
		<div class="container">
			
			<div style="text-align:center">
				<h1>Object List</h1>
				
				<h2 data-ng-show="objects.length == 0">No Objects yet!</h2>
			</div>
			
			<form style="form-inline" role="form" ng-submit="addObject()">
				<div class="form-group col-md-10">
					<input type="text" class="form-control" name="objectName" ng-model="objectName" placeholder="Enter Object name" required>
				</div>
				<button type="submit" class="btn btn-primary">Add an Object</button>
			</form>

			<div class="col-md-12" data-ng-show="objects.length > 0">
				<table class="table table-hover">
					<tbody>
						<tr data-ng-repeat="object in objects track by $index">
							<td>{{ $index + 1 }}</td>
							<td><input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateObject(objects[$index])" ng-model="objects[$index].name"></td>
							<td><input placeholder="object Description here" class="todo" type="text" ng-model-options="{ updateOn: 'blur' }" ng-change="updateObject(objects[$index])" ng-model="objects[$index].description"></td>
							<td style="text-align:center"><a class="btn btn-xs btn-default" ng-click="deleteObject(objects[$index])"><span class="glyphicon glyphicon-trash"></span></a></td>
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