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
		  href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/darkly/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet"
		  href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="/.site/css/styles.css" />
</head>

<body>
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">UW StudyFinder</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="<?php if($pageRequest == "about") echo "active"; ?>"><a href="/about">About</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="<?php if($pageRequest == "home") echo "active"; ?>"><a href="/">Find Study Spaces</a></li>
			</ul>
		</div>
	</div>
</nav>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/.site/pages/$pageRequest.php"; ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/.site/js/global.js"></script>
</body>
</html>

