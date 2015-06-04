<?php
/** @var Location[] $places */
$places = Location::getAll();
usort($places, function(Location $a, Location $b) {
	return $a->compare($b);
});
?>

<div class="container">
	<div class="transition transition-setup transition-in">
		<h1><?php echo I18n::get(I18n::LETS_GET_STARTED); ?></h1>
		<p><label id="find-study" class="btn btn-primary btn-lg"><?php echo I18n::get(I18n::FIND_STUDY); ?></label></p>
	</div>

	<div id="find-searching" class="transition">
		<h3><?php echo I18n::get(I18n::HANG_ON); ?></h3>
		<h3><i class="fa fa-refresh fa-spin"></i></h3>
	</div>

	<div id="find-found" class="transition">
		<h3><?php echo I18n::get(I18n::HERES_WHAT_I_FOUND); ?></h3>
	</div>

	<div id="find-results">
		<h4 id="results-recommend"><?php echo I18n::get(I18n::RECOMMENDED); ?></h4>
		<div id="results-recommend-well" class="well">
			<?php
			for ($i = 0; $i < 5; $i++) {
				echo $places[$i]->getHtml();
			}
			?>
		</div>

		<h4 id="results-other" class="hide"><?php echo I18n::get(I18n::OTHER); ?></h4>
		<div id="results-other-well" class="well hide">
			<?php
			for ($i = 5; $i < count($places); $i++) {
				echo $places[$i]->getHtml();
			}
			?>
		</div>
	</div>
</div>