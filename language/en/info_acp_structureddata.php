<?php
/**
 *
 * Structured Data. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2019, Jakub Senko
 * @license Proprietary/All rights reserved
 * @licensee {{LICENSEE}}
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ACP_STRUCTUREDDATA_TITLE'	=> 'SEO - Structured Data',
	'ACP_STRUCTUREDDATA'		=> 'Settings',

	'LOG_ACP_STRUCTUREDDATA_SETTINGS'		=> '<strong>SEO - Structured Data settings updated</strong>',
));
