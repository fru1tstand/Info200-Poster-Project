<?php
spl_autoload_register(function ($className) {
	// Replace namespace backslashes with folder directory forward slashes
	$className = str_replace("\\", "/", $className);
	$path = $_SERVER["DOCUMENT_ROOT"] . "/.site/php/" . $className . ".php";
	if (file_exists($path)) {
		/** @noinspection PhpIncludeInspection */
		include_once($path);
	}
});

session_name("fm-info");
session_start();

// set language
if (!isset($_SESSION['locale']))
	$_SESSION['locale'] = I18n::LOCALE_EN_US;
if (isset($_GET['lang']))
	$_SESSION['locale'] = $_GET['lang'];
I18n::setlocale($_SESSION['locale']);

// set theme
if (!isset($_SESSION['theme']))
	$_SESSION['theme'] = "DARKLY";
if (isset($_GET['theme']))
	$_SESSION['theme'] = strtoupper($_GET['theme']);
Theme::setTheme($_SESSION['theme']);

// Too lazy to make an actual page loader. This is lazy-man's page request sanitizer.
$pages = array("home", "about");
$pageRequest = "home";
if (isset($_GET['page']))
	$pageRequest = preg_replace("/[^a-z0-9_-]/", "", strtolower($_GET['page']));
if (!in_array($pageRequest, $pages))
	$pageRequest = "home";
?>
<!DOCTYPE html>
<html lang="en">
<head><!--
	Heya! Yeah, I know. Bootstrap. Don't hate. It's an intro info course. :)
	Feel free to look at the source: https://github.com/fru1tstand/Info200-Poster-Project
	Enjoy my past 3 hours of work... I really shoulda done this sooner...
-->

	<title>UW Info200 - AA: Red - App Mock</title>
	<meta charset="UTF-8" />
	<link type="text/css" rel="stylesheet"
		  href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet"
		  href="<?php echo Theme::getThemeUrl(); ?>" />
	<link type="text/css" rel="stylesheet"
		  href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="/.site/css/styles.css" />
</head>

<body>
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">UW SpotSpotter</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li class="<?php if($pageRequest == "home") echo "active"; ?>"><a href="/">Find Study Spaces</a></li>
				<li class="<?php if($pageRequest == "about") echo "active"; ?>"><a href="/about">About</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Theme <i class="fa fa-image"></i></a>
					<ul class="dropdown-menu" role="menu">
						<li class="<?php if ($_SESSION['theme'] == "CERULEAN") echo "active"; ?>"><a href="/?theme=cerulean">Cerulean</a></li>
						<li class="<?php if ($_SESSION['theme'] == "CYBORG") echo "active"; ?>"><a href="/?theme=cyborg">Cyborg</a></li>
						<li class="<?php if ($_SESSION['theme'] == "DARKLY") echo "active"; ?>"><a href="/?theme=darkly">Darkly</a></li>
						<li class="<?php if ($_SESSION['theme'] == "FLATLY") echo "active"; ?>"><a href="/?theme=flatly">Flatly</a></li>
						<li class="<?php if ($_SESSION['theme'] == "JOURNAL") echo "active"; ?>"><a href="/?theme=journal">Journal</a></li>
						<li class="<?php if ($_SESSION['theme'] == "PAPER") echo "active"; ?>"><a href="/?theme=paper">Paper</a></li>
						<li class="<?php if ($_SESSION['theme'] == "READABLE") echo "active"; ?>"><a href="/?theme=readable">Readable</a></li>
						<li class="<?php if ($_SESSION['theme'] == "SANDSTONE") echo "active"; ?>"><a href="/?theme=sandstone">Sandstone</a></li>
						<li class="<?php if ($_SESSION['theme'] == "SIMPLEX") echo "active"; ?>"><a href="/?theme=simplex">Simplex</a></li>
						<li class="<?php if ($_SESSION['theme'] == "SLATE") echo "active"; ?>"><a href="/?theme=slate">Slate</a></li>
						<li class="<?php if ($_SESSION['theme'] == "SPACELAB") echo "active"; ?>"><a href="/?theme=spacelab">Spacelab</a></li>
						<li class="<?php if ($_SESSION['theme'] == "SUPERHERO") echo "active"; ?>"><a href="/?theme=superhero">Superhero</a></li>
						<li class="<?php if ($_SESSION['theme'] == "UNITED") echo "active"; ?>"><a href="/?theme=united">United</a></li>
						<li class="<?php if ($_SESSION['theme'] == "YETI") echo "active"; ?>"><a href="/?theme=yeti">Yeti</a></li>

					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Language <i class="fa fa-language"></i></a>
					<ul class="dropdown-menu" role="menu">
						<li class="active"><a href="/?lang=en">English</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/.site/pages/$pageRequest.php"; ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/.site/js/global.js"></script>
</body>
</html>

