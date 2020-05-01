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
	'ACP_STRUCTUREDDATA_EXPLAIN'	=> 'Here you can set various information to improve structured data of your board. Structured data are very underrated SEO aspect, yet they can have bigger impact than any other on-page SEO optimisation technique. Structured data don\'t improve search position as much as how your data are displayed. Adding images, rating stars, carousels or other information to standard page title, URL and description make your item more distinct and highlighted. And if Google rewards you by adding your website card on the right side of the search results, structured data will add additional content to it such as social profiles. All in all, structured data are different kind of search engine optimisation - the one that makes more sense.',

	'ACP_STRUCTUREDDATA_SETTING_SAVED'	=> 'Settings have been saved successfully!',

	'ACP_SENKY_STRUCTUREDDATA_NAME'			=> 'Website name',
	'ACP_SENKY_STRUCTUREDDATA_NAME_EXPLAIN'	=> 'This name will be prominently displayed on the right side of the search results. Keep it short and ensure that it matches your identity.',

	'ACP_STRUCTUREDDATA_LOGO_URL'			=> 'Board logo URL',
	'ACP_STRUCTUREDDATA_LOGO_URL_EXPLAIN'	=> 'This logo will be displayed on the right side of the search results. Logo URL must be absolute (starting with http(s)://) and image must be 112x112px at minimum with .jpg, .png or .gif format. <a href="https://developers.google.com/search/docs/data-types/logo" target="_blank">Read more</a>',
	'LOGO_URL_ABSOLUTE'						=> 'Logo URL must be full (absolute) URL starting with http(s)://.',
	'LOGO_URL_NO_FETCH'						=> 'Logo image could not be fetched. Please check logo URL.',
	'LOGO_URL_TOO_SMALL'					=> 'Logo image must be 112x112px, at minimum.',
	'LOGO_URL_INVALID_TYPE'					=> 'Logo image must be in .jpg, .png, or .gif format.',

	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES'			=> 'Social Profiles',
	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES_EXPLAIN'	=> 'Google can display your social profiles on the identity card (displayed on the right side of the search results) when provided. Make sure to only link to your social profiles and only to the ones you actively maintain. Use full (absolute) URLs. Leave unused social profiles empty. <a href="https://developers.google.com/search/docs/data-types/social-profile" target="_blank">Read more</a>',
	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES_FACEBOOK'	=> 'Facebook',
	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES_TWITTER'	=> 'Twitter',
	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES_INSTAGRAM'	=> 'Instagram',
	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES_YOUTUBE'	=> 'Youtube',
	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES_LINKEDIN'	=> 'Linkedin',
	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES_MYSPACE'	=> 'Myspace',
	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES_PINTEREST'	=> 'Pinterest',
	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES_SOUNDCLOUD'	=> 'Soundcloud',
	'ACP_STRUCTUREDDATA_SOCIAL_PROFILES_TUMBLR'		=> 'Tumblr',
	'FACEBOOK_INVALID'								=> 'Facebook URL is invalid. Make sure it links to facebook.com.',
	'TWITTER_INVALID'								=> 'Twitter URL is invalid. Make sure it links to twitter.com.',
	'INSTAGRAM_INVALID'								=> 'Instagram URL is invalid. Make sure it links to instagram.com.',
	'YOUTUBE_INVALID'								=> 'Youtube URL is invalid. Make sure it links to youtube.com.',
	'LINKEDIN_INVALID'								=> 'Linkedin URL is invalid. Make sure it links to linkedin.com.',
	'MYSPACE_INVALID'								=> 'Myspace URL is invalid. Make sure it links to myspace.com.',
	'PINTEREST_INVALID'								=> 'Pinterest URL is invalid. Make sure it links to pinterest.com.',
	'SOUNDCLOUD_INVALID'							=> 'Soundcloud URL is invalid. Make sure it links to soundcloud.com.',
	'TUMBLR_INVALID'								=> 'Tumblr URL is invalid. Make sure it links to tumblr.com.',

	'SUPPORTED_EXTENSIONS'		=> 'Supported extensions',
	'ENABLED'					=> '<strong style="color:green">✔ Enabled</strong>',
	'NOT_INSTALLED'				=> 'Not installed',
	'PAGES'						=> '<a href="https://www.phpbb.com/customise/db/extension/pages/" target="_blank">Pages</a>',
	'PAGES_EXPLAIN'				=> 'The extension will generate Article data for all pages. Note that Google has very strict rules on articles so pages may not get prominent look in the search even with the structured data. <a href="https://developers.google.com/search/docs/data-types/article" target="_blank">Read more</a>',
	'FIRST_POST_ONLY'			=> '<a href="https://www.phpbb.com/customise/db/extension/show_first_post_only_to_guest/" target="_blank">Show First Post Only To Guest</a>',
	'FIRST_POST_ONLY_EXPLAIN'	=> 'The extension will generate Subscription and paywalled content data so that Google will not penalise your board for cloaking. <a href="https://developers.google.com/search/docs/data-types/paywalled-content" target="_blank">Read more</a>',

	'PLANNED_EXTENSIONS_SUPPORT'	=> 'Planned extensions support',
	'BETA'							=> 'BETA',
	'WAITING_FOR_FINAL_RELEASE'		=> 'Waiting for stable release',
	'CALENDAR_MONO'					=> '<a href="https://www.phpbb.com/community/viewtopic.php?f=456&t=2487151" target="_blank">Calendar Mono</a>',
	'CALENDAR_MONO_EXPLAIN'			=> 'The extension will add Event data to events. <a href="https://developers.google.com/search/docs/data-types/event" target="_blank">Read more</a>',
	'CALENDAR_EVENTS'				=> '<a href="https://www.phpbb.com/community/viewtopic.php?f=456&t=2469651" target="_blank">Calendar Events (w/karma)</a>',
	'CALENDAR_EVENTS_EXPLAIN'		=> 'The extension will add Event data to events. <a href="https://developers.google.com/search/docs/data-types/event" target="_blank">Read more</a>',
	'BEST_ANSWER'					=> '<a href="https://www.phpbb.com/community/viewtopic.php?f=456&t=2368876" target="_blank">Best Answer</a>',
	'BEST_ANSWER_EXPLAIN'			=> 'The extension will add Q&A Page data to topics. <a href="https://developers.google.com/search/docs/data-types/qapage" target="_blank">Read more</a>',
));
