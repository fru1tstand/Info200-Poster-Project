<?php
/** @var Location[] $places */
$places = Location::getAll();
usort($places, function(Location $a, Location $b) {
	return $a->compare($b);
});
?>

<div class="container">
	<div class="transition transition-setup transition-in">
		<h1>Let's get started</h1>
		<p><label id="find-study" class="btn btn-primary btn-lg">Find Study Spaces</label></p>
	</div>

	<div id="find-searching" class="transition">
		<h3>Hang on while I crunch some numbers...</h3>
		<h3><i class="fa fa-refresh fa-spin"></i></h3>
	</div>

	<div id="find-found" class="transition">
		<h3>Here's what I found for you</h3>
	</div>

	<div id="find-results" class="">
		<h4 id="results-recommend">Recommended Places</h4>
		<div id="results-recommend-well" class="well">
			<?php
			for ($i = 0; $i < 5; $i++) {
				echo $places[$i]->getHtml();
			}
			?>
		</div>

		<h4 id="results-other" class="hide">Other Places</h4>
		<div id="results-other-well" class="well hide">
			<?php
			for ($i = 5; $i < count($places); $i++) {
				echo $places[$i]->getHtml();
			}
			?>
		</div>
	</div>
</div>