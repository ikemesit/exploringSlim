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
		<form action="/destination/new" method="POST" accept-charset="utf-8">	
			<!-- <input type="number" name="id" placeholder="id"> -->
			<ul>

				<li><input type="text" name="name" placeholder="name"></li>
				<li><input type="text" name="address" placeholder="address"></li>
				<li><textarea name="description" placeholder="description"></textarea></li>
				<li><input type="text" name="phone" placeholder="phone"></li>
				<li><input type="text" name="email" placeholder="email"></li>
				<li><input type="text" name="facilities" placeholder="facilities"></li>
				<li><input type="text" name="activities" placeholder="activities"></li>
				<li><input type="text" name="cordinates" placeholder="cordinates"></li>
				<li><input type="text" name="path" placeholder="path"></li>
				<li><button type="submit">submit</button></li>
			</ul>
			
			
		</form>
	</div>
</body>
</html>