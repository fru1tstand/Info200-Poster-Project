<?php

/**
 * Class Theme
 * Holds bootstrap themes
 */
class Theme {
	const DARKLY = "//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/darkly/bootstrap.min.css";
	const CERULEAN = "//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cerulean/bootstrap.min.css";
	const CYBORG = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css";
	const FLATLY = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css";
	const JOURNAL = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/journal/bootstrap.min.css";
	const PAPER = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/lumen/bootstrap.min.css";
	const READABLE = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/readable/bootstrap.min.css";
	const SANDSTONE = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/sandstone/bootstrap.min.css";
	const SIMPLEX = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/simplex/bootstrap.min.css";
	const SLATE = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/slate/bootstrap.min.css";
	const SPACELAB = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/spacelab/bootstrap.min.css";
	const SUPERHERO = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/superhero/bootstrap.min.css";
	const UNITED = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/united/bootstrap.min.css";
	const YETI = "https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/yeti/bootstrap.min.css";

	private static $themeUrl = null;
	public static function setTheme($themeName) {
		$themeName = strtoupper($themeName);
		if (defined("self::$themeName"))
			self::$themeUrl = constant("self::$themeName");
	}

	public static function getThemeUrl() {
		if (is_null(self::$themeUrl)) {
			self::$themeUrl = self::DARKLY;
		}
		return self::$themeUrl;
	}
}