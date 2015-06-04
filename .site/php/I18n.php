<?php

/**
 * Internationalization. To the best of whatever whatever.
 */
class I18n {
	// Strings that must be defined per language
	// Nav
	const NAV_FIND = "NAV_FIND";
	const NAV_ABOUT = "NAV_ABOUT";
	const NAV_THEME = "NAV_THEME";
	const NAV_LANGUAGE = "NAV_LANGUAGE";

	// Home
	const SPOTS_TAKEN = "SPOTS_TAKEN";
	const AVAILABLE = "AVAILABLE";
	const LETS_GET_STARTED = "LETS_GET_STARTED";
	const FIND_STUDY = "FIND_STUDY";
	const HANG_ON = "HANG_ON";
	const HERES_WHAT_I_FOUND = "HERES_WHAT_I_FOUND";
	const RECOMMENDED = "RECOMMENDED";
	const OTHER = "OTHER";

	// About
	const ABOUT = "ABOUT";
	const WHY_WE_ARE = "WHY_WE_ARE";
	const WHY_WE_ARE_TEXT = "WHY_WE_ARE_TEXT";
	const WHO_IS_USING = "WHO_IS_USING";
	const WHO_IS_USING_TEXT = "WHO_IS_USING_TEXT";
	const WHAT_WE_PROVIDE = "WHAT_WE_PROVIDE";
	const WHAT_WE_PROVIDE_TEXT = "WHAT_WE_PROVIDE_TEXT";
	const NOTHING_TO_LOSE = "NOTHING_TO_LOSE";
	const GET_STARTED = "GET_STARTED";

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
	/** US English */						const LOCALE_EN_US = "en-us";
	/** Colombian Spanish */				const LOCALE_ES_CO = "es-co";
	/** Vietnam Vietnamese */				const LOCALE_VI_VN = "vi-vn";
	/** Chinese Mandarin (Simplified) */	const LOCALE_ZH_CN = "zh-cn";
	/** Chinese Mandarin (Traditional) */	const LOCALE_ZH_HK = "zh-hk";
	/** S.Korea Korean */					const LOCALE_KO_KR = "ko-kr";

	/**
	 * Sets the website's language
	 * @param string $locale
	 */
	public static function setLocale($locale = self::LOCALE_EN_US) {
		$locale = strtolower($locale);
		switch ($locale) {
			case self::LOCALE_ES_CO:
			case self::LOCALE_KO_KR:
			case self::LOCALE_VI_VN:
			case self::LOCALE_ZH_CN:
			case self::LOCALE_ZH_HK:
			case self::LOCALE_EN_US:

			include $_SERVER["DOCUMENT_ROOT"] . "/.site/php/I18n/$locale.php";
				break;

			default:
				include $_SERVER["DOCUMENT_ROOT"] . '/.site/php/I18n/en-us.php';
			break;
		}
		self::$isLangSet = true;
	}
}