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

namespace senky\structureddata\migrations;

class m1_config extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['senky_structureddata_logo_url']);
	}

	public static function depends_on()
	{
		return array('\phpbb\db\migration\data\v320\v320');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('senky_structureddata_logo_url', '')),
			array('config.add', array('senky_structureddata_name', '')),
			array('config.add', array('senky_structureddata_facebook', '')),
			array('config.add', array('senky_structureddata_twitter', '')),
			array('config.add', array('senky_structureddata_instagram', '')),
			array('config.add', array('senky_structureddata_youtube', '')),
			array('config.add', array('senky_structureddata_linkedin', '')),
			array('config.add', array('senky_structureddata_myspace', '')),
			array('config.add', array('senky_structureddata_pinterest', '')),
			array('config.add', array('senky_structureddata_soundcloud', '')),
			array('config.add', array('senky_structureddata_tumblr', '')),
		);
	}
}
