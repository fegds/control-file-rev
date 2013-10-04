<!doctype html>
<html lang="en" ng-app>
<head>
	<meta charset="utf-8">
	<title>控制文件版本号</title>

	<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

	<style>
		body { padding: 20px 30px; font-size: 16px;}
	</style>
</head>
<body>

<?php
	function rev($project){
		echo shell_exec("svn --username huyh --password 123456 --no-auth-cache info http://192.168.10.7/svn/cantonpm/tags/".$project."/build4prd | grep 'Last Changed Rev:' | cut -c19-");
	} 
?>

<h1>控制文件版本号</h1>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>本期控制文件夹号</th>
		</tr>
	</thead>
	<tbody ng-init=" projects = [
		{ name: 'C', rev: '<?php rev('cfec-C'); ?>'},
		{ name: 'en_cantonfair', rev: '<?php rev('en_cantonfair'); ?>'},
		{ name: 'java', rev: '<?php rev('java'); ?>'},
		{ name: 'timer', rev: '<?php rev('timer'); ?>'}
	]">
		<tr ng-repeat="project in projects">
			<td>
				{{ project.name }}
			</td>
			<td>
				{{ project.rev }}
			</td>
		</tr>
	</tbody>
</table>

<script src="vendor/angular/angular.min.js"></script>

</body>
</html>
