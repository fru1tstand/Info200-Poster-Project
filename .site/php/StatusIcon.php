<?php

/**
 * Info status icons for locations
 */
class StatusIcon {
	/** It's loud */
	const LOUD = 0;
	/** There's an event going on */
	const EVENT = 1;
	/** A friend is studying as well */
	const FRIEND = 2;
	/** A classmate is studying as well */
	const CLASSMATE = 3;

	/**
	 * Grabs the HTML for the corresponding icon ID
	 * @param $iconId
	 * @return string
	 */
	public static function getHtml($iconId) {
		switch($iconId) {
			case self::LOUD:
				return '<i class="fa fa-volume-up" title="It\'s loud here!"><span class="label label-warning">It\'s loud here</span></i>';
			case self::EVENT:
				return '<i class="fa fa-warning" title="There\'s an event going on"><span class="label label-warning">There\'s an event going on</span></i>';
			case self::FRIEND:
				return '<i class="fa fa-child" title="You\'ve got a friend studying here"><span class="label label-info">You\'ve got a friend studying here</span></i>';
			case self::CLASSMATE:
				return '<i class="fa fa-user" title="You\'ve got a classmate here"><span class="label label-info">You\'ve got a classmate here</span></i>';
			default:
				return "";
		}
	}
}