<?php

/**
 * A simple class that stores a single location's information
 */
class Location {
	private static $allLocationsCache = null;
	/**
	 * Gets all locations as an unordered array
	 */
	public static function getAll() {
		if (is_null(self::$allLocationsCache)) {
			self::$allLocationsCache = array(
					new Location("Suzzallo 3rd Floor Octagon", 100),
					new Location("Suzzallo 102", 25),
					new Location("Reading Room", 30),
					new Location("Suzzallo 1st Floor", 60),
					new Location("Suzzallo 4th Floor Overlook", 20),
					new Location("Allen North Balcony", 20),
					new Location("Assigned Study Carrels", 18),
					new Location("Allen North &amp; South, 2nd &amp; 3rd Floors", 24),
					new Location("Gallery Study Area", 36),
					new Location("Scholar Study Rooms", 30),
					new Location("Research Commons", 110),
					new Location("Group Study Rooms", 36),
					new Location("Suzzallo Ground Floor Study Area", 160),
					new Location("Odegaard Undergraduate Library", 410),
					new Location("Odegaard Group Rooms", 46)
			);
		}
		return self::$allLocationsCache;
	}

	// Class
	/** @var string The name of the location */
	private $name;
	/** @var int The percentage (0-100) that the location is filled to */
	private $currentFillPercent;
	/** @var int The maximum capacity of the location */
	private $capacity;
	/** @var array The event ids that are occurring */
	private $events;

	/**
	 * Creates a location with a random fill level
	 * @param $name
	 * @param $capacity
	 */
	public function __construct($name = "", $capacity = 0) {
		// Simple constructor
		$this->name = $name;
		$this->capacity = $capacity;
		$this->currentFillPercent = rand(0, 100);
		$this->events = array();

		// Set random events
		// 33% chance of loud
		if (rand(1, 100) <= 33) $this->events[] = StatusIcon::LOUD;
		// 5% of event
		if (rand(1, 100) <= 5) $this->events[] = StatusIcon::EVENT;
		// 20% chance of friend
		if (rand(1, 100) <= 20) $this->events[] = StatusIcon::FRIEND;
		// 33% chance of classmate
		if (rand(1, 100) <= 33) $this->events[] = StatusIcon::CLASSMATE;
	}

	// Simple getters
	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return int
	 */
	public function getCurrentFillPercent() {
		return $this->currentFillPercent;
	}

	/**
	 * @return int
	 */
	public function getCapacity() {
		return $this->capacity;
	}


	// Processed getters
	/**
	 * Retrieves the number of people at/in the location
	 * @return int
	 */
	public function getCurrentFill() {
		return round($this->capacity * $this->currentFillPercent / 100);
	}

	/**
	 * Creates the HTML for this location
	 * ** Note. To anyone actually reading this. I know. It's bad practice. But c'mon. It's an
	 * introductory informatics course and I have like 2 hours until class starts. Making files is
	 * hard. :)
	 */
	public function getHtml() {
		$outName = $this->getName();
		$outIcons = "";
		foreach ($this->events as $event)
			$outIcons .= StatusIcon::getHtml($event);
		$outFill = $this->getCurrentFill();
		$outFillPercent = $this->getCurrentFillPercent();
		$outFillRemaining = $this->getCapacity() - $outFill;
		$outProgressbarClassStyle = $this->getFillBarStyleClass();

		$i18nTaken = I18n::get(I18n::SPOTS_TAKEN);
		$i18nAvailable = I18n::get(I18n::AVAILABLE);

		return <<<HTML
<div class="entry entry-transition">
	<div class="location-information">
		<div class="title">$outName</div>
		<div class="icons">$outIcons</div>
		<div class="fill">$outFill $i18nTaken ($outFillRemaining $i18nAvailable)</div>
	</div>
	<div class="progress entry-transition-hold">
		<div class="progress-bar progress-bar-$outProgressbarClassStyle" style="width: $outFillPercent%;"></div>
	</div>
</div>
HTML;
	}

	/**
	 * Gets the CSS class associated with the fill bar this location should be rendered with
	 * @return string
	 */
	public function getFillBarStyleClass() {
		if ($this->currentFillPercent < 34)
			return "success";
		if ($this->currentFillPercent < 67)
			return "warning";
		return "danger";
	}

	/**
	 * Compares this library with another using the fill level
	 * @param Location $other
	 * @return mixed
	 */
	public function compare(Location $other) {
		return $this->getCurrentFillPercent()- $other->getCurrentFillPercent();
	}
}