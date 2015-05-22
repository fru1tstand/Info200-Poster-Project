<?php

/**
 * Class Library
 */
class Library {
	private $name;
	private $fill;
	private $style;

	public function __construct($name) {
		$this->name = $name . '<i class="icon-space"></i>';
		$this->fill = rand(0, 100);

		// fa-child (friend)
		// exclamation-circle (event/loud)
		// meh (loud)

		// 33% chance of loud
		if (rand(1, 100) <= 33)
			$this->name .= '<i class="fa fa-volume-up" title="It\'s loud here!"></i>';

		// 5% of event
		if (rand(1, 100) <= 5)
			$this->name .= '<i class="fa fa-warning" title="There\'s an event going on"></i>';

		// 20% chance of friend
		if (rand(1, 100) <= 20)
			$this->name .= '<i class="fa fa-child" title="You\'ve got a friend studying here"></i>';

		if (rand(1, 100) <= 33)
			$this->name .= '<i class="fa fa-user" title="You\'ve got a classmate here"></i>';



		$this->style = "danger";
		if ($this->fill < 67)
			$this->style = "warning";
		if ($this->fill < 34)
			$this->style = "success";
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return mixed
	 */
	public function getFill() {
		return $this->fill;
	}

	/**
	 * @return mixed
	 */
	public function getStyle() {
		return $this->style;
	}

	public function getHtml($place) {
		echo "<div class='bbar bar-$place'><p>", $this->name, "<span class='pull-right'>(",
		$this->fill, "% Capacity)</p>",
		"<div class='progress'>",
		"<div class='progress-bar progress-bar-", $this->style,
		"' style='width:", $this->fill, "%'></div></div></div>";
	}

	public function compare(Library $other) {
		return $this->fill - $other->getFill();
	}
}

$places = array(
		new Library("Suzzallo 3rd Floor Octagon"),
		new Library("Suzzallo 102"),
		new Library("Reading Room"),
		new Library("Suzzallo 1st Floor"),
		new Library("Suzzallo 4th Floor Overlook"),
		new Library("Allen North Balcony"),
		new Library("Assigned Study Carrels"),
		new Library("Allen North &amp; South, 2nd &amp; 3rd Floors"),
		new Library("Gallery Study Area"),
		new Library("Scholar Study Rooms"),
		new Library("Research Commons"),
		new Library("Group Study Rooms"),
		new Library("Suzzallo Ground Floor Study Area"),
		new Library("Odegaard Undergraduate Library"),
		new Library("Odegaard Group Rooms")
);
usort($places, function(Library $a, Library $b) {
	return $a->compare($b);
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>UW Info200 - AA: Red - App Mock</title>
	<meta charset="UTF-8" />
	<link type="text/css" rel="stylesheet"
		  href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet"
		  href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/darkly/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet"
		  href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="style.css" />

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
				<li><a href="/about">About</a></li>
				<li><a href="#">Blah</a></li>
				<li><a href="#">Donate</a></li>
				<li><a href="#">Login</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="/">Find Me A Study!</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<input type="checkbox" id="results-trigger" class="trigger" />
	<div class="welcome">
		<div class="visibility">
			<div class="spacer"></div>
			<h1>Let's get started</h1>
			<p><label for="results-trigger" class="btn btn-primary btn-lg">Find Study Spaces</label></p>
		</div>
	</div>
	<div class="searching">
		<div class="visibility-inv">
			<div class="spacer"></div>
			<h3>Hang on while I crunch some numbers...</h3>
			<h3><i class="fa fa-refresh fa-spin"></i></h3>
		</div>
	</div>
	<div class="found">
		<div class="visibility-inv">
			<div class="spacer"></div>
			<h3>Here's what I found for you</h3>
		</div>
	</div>
	<div class="results">
		<div class="visibility-inv">
			<div class="spacer"></div>
			<h4 class="recommended">Recommended Places</h4>
			<div class="well recommended">
				<?php
				/** @var Library[] $places */
				for ($i = 0; $i < 5; $i++) {
					$places[$i]->getHtml($i);
				}
				?>
			</div>

			<div class="other-spacer"></div>
			<h4 class="everythingelse">Other Places</h4>
			<div class="well everythingelse">
				<?php
				for ($i = 5; $i < count($places); $i++) {
					$places[$i]->getHtml($i);
				}
				?>
			</div>
		</div>
	</div>
	<div class="spacer"></div>
</div>


</body>
</html>

