<?php

/**
 * Internationalization. To the best of whatever whatever.
 */
class I18n {
	// Strings that must be defined per language
	const SPOTS_TAKEN = "SPOTS_TAKEN";
	const AVAILABLE = "AVAILABLE";

	private static $isLangSet = false;

	/**
	 * Gets the requested string name. Unsafe call. Warning should be loud because whoever fails
	 * to correctly use this is stupid anyway.
	 * @param $stringName
	 * @return mixed
	 */
	public static function get($stringName) {
		// Make sure our language is defined
		if (!self::$isLangSet)
			self::setLocale();
		return constant("Lang::$stringName");
	}

	// Languages
	/** US English */		const LOCALE_EN_US = 0;
	/**
	 * Sets the website's language
	 * @param int $locale
	 */
	public static function setLocale($locale = self::LOCALE_EN_US) {
		switch ($locale) {

			case self::LOCALE_EN_US:
			default:
				include $_SERVER["DOCUMENT_ROOT"] . '/.site/php/I18n/en-us.php';
				break;
		}
		self::$isLangSet = true;
	}
}