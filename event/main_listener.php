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

namespace senky\structureddata\event;

class main_listener implements \Symfony\Component\EventDispatcher\EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'	=> 'prepare_template_vars',

			// phpbb/pages
			'phpbb.pages.modify_content_for_display'	=> 'phpbb_pages_find_images',
		);
	}

	protected $template;
	protected $config;
	protected $php_ext;
	protected $same_as;
	public function __construct(\phpbb\template\template $template, \phpbb\config\config $config, $php_ext, $same_as)
	{
		$this->template = $template;
		$this->config = $config;
		$this->php_ext = $php_ext;
		$this->same_as = $same_as;
	}

	public function prepare_template_vars()
	{
		$this->template->assign_vars([
			'SENKY_STRUCTUREDDATA_NAME'			=> $this->config['senky_structureddata_name'],
			'U_SENKY_STRUCTUREDDATA_LOGO'		=> $this->config['senky_structureddata_logo_url'],
			'U_SENKY_STRUCTUREDDATA_SEARCH'		=> generate_board_url() . '/search.' . $this->php_ext,
		]);

		foreach ($this->same_as as $profile)
		{
			if (!empty($this->config['senky_structureddata_' . $profile]))
			{
				$this->template->assign_block_vars('senky_structureddata_social_profiles', [
					'URL'	=> $this->config['senky_structureddata_' . $profile],
				]);
			}
		}
	}

	public function phpbb_pages_find_images($event)
	{
		$images = [];
		if (preg_match_all('/<img.+src=["\']?([^"\' >]*)["\']?[^>]*>/i', $event['content'], $matches))
		{
			foreach ($matches[1] as $match)
			{
				$images[] = $match;
			}
		}

		$images = array_unique($images);
		foreach ($images as $image)
		{
			$this->template->assign_block_vars('senky_structureddata_pages_images', [
				'URL'	=> $image,
			]);
		}
	}
}
