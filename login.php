<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css" media="screen">
		ul{
			list-style: none;
			line-height: 4em;
		}
		input{
			height: 30px;
			min-width: 400px;
		}
		button, textarea{
			min-width: 400px;
		}
		button{
			height: 30px;
		}
		textarea{
			height: 400px;
		}
	</style>
</head>
<body>
	<div>
		<form action="/admin/login" method="POST" accept-charset="utf-8">	
			<!-- <input type="number" name="id" placeholder="id"> -->
			<ul>

				<li><input type="text" name="username" placeholder="username"></li>
				<li><input type="password" name="password" placeholder="password"></li>
				<li><button type="submit">submit</button></li>
			</ul>
			
			
		</form>
	</div>
</body>
</html>