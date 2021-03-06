
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Baiscope Mania Login</title>

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;	
	background-image: url(images/Collage21.jpg);
        background-size: cover;
	-webkit-filter: blur(10px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
        background-color: #fff
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 50px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: #fff;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 5px;
	color: #5379fa;
	font-family: 'Exo', sans-serif;
	font-size: 18px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 5px;
	color: #5379fa;
	font-family: 'Exo', sans-serif;
	font-size: 18px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #666;
	border: 1px solid #151515;
	cursor: pointer;
	border-radius: 5px;
	color: #151515;
	font-family: 'Exo', sans-serif;
	font-size: 18px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}

</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
                <div>
		<div class="header">
                    <div><span><img src="images/baiscope_mania_small_1.png" alt="" /></span></div>
		</div>
		<br>
		<form method="post" action="logincheck.php">
		<div class="login">
                                <br>
                                <input type="text" placeholder="Mobile Number" name="username" style="height: 50px; width: 300px; color: #151515; text-align: center; border: solid #151515 thin"><br>
                                <br>
                                <input type="submit" value="Login" style="height: 50px; width: 300px; text-align: center; border: solid #151515 thin">
		</div>
		</form>
                </div>
		

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>