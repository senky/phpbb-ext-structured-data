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

namespace senky\structureddata\controller;

class acp_controller
{
	protected $config;
	protected $language;
	protected $log;
	protected $request;
	protected $template;
	protected $user;
	protected $ext_manager;
	protected $same_as;

	protected $u_action;
	public function __construct(\phpbb\config\config $config, \phpbb\language\language $language, \phpbb\log\log $log, \phpbb\request\request $request, \phpbb\template\template $template, \phpbb\user $user, \phpbb\extension\manager $ext_manager, $same_as)
	{
		$this->config = $config;
		$this->language = $language;
		$this->log = $log;
		$this->request = $request;
		$this->template = $template;
		$this->user = $user;
		$this->ext_manager = $ext_manager;
		$this->same_as = $same_as;
	}

	public function display_settings()
	{
		$this->language->add_lang('acp', 'senky/structureddata');

		add_form_key('senky_structureddata_acp');

		if ($this->request->is_set_post('submit'))
		{
			$errors = $this->validate_data();
			if (empty($errors))
			{
				$this->config->set('senky_structureddata_name', $this->request->variable('senky_structureddata_name', '', true));
				$this->config->set('senky_structureddata_logo_url', $this->request->variable('senky_structureddata_logo_url', '', true));
				foreach ($this->same_as as $profile)
				{
					$this->config->set('senky_structureddata_' . $profile, $this->request->variable('senky_structureddata_' . $profile, '', true));
				}

				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_ACP_STRUCTUREDDATA_SETTINGS');

				trigger_error($this->language->lang('ACP_STRUCTUREDDATA_SETTING_SAVED') . adm_back_link($this->u_action));
			}
		}

		$s_errors = !empty($errors);
		$this->template->assign_vars(array(
			'S_ERROR'		=> $s_errors,
			'ERROR_MSG'		=> $s_errors ? implode('<br />', $errors) : '',

			'U_ACTION'		=> $this->u_action,

			'SENKY_STRUCTUREDDATA_NAME'					=> $this->config['senky_structureddata_name'],
			'SENKY_STRUCTUREDDATA_LOGO_URL'				=> $this->config['senky_structureddata_logo_url'],
			'STRUCTUREDDATA_SOCIAL_PROFILES_FACEBOOK'	=> $this->config['senky_structureddata_facebook'],
			'STRUCTUREDDATA_SOCIAL_PROFILES_TWITTER'	=> $this->config['senky_structureddata_twitter'],
			'STRUCTUREDDATA_SOCIAL_PROFILES_INSTAGRAM'	=> $this->config['senky_structureddata_instagram'],
			'STRUCTUREDDATA_SOCIAL_PROFILES_YOUTUBE'	=> $this->config['senky_structureddata_youtube'],
			'STRUCTUREDDATA_SOCIAL_PROFILES_LINKEDIN'	=> $this->config['senky_structureddata_linkedin'],
			'STRUCTUREDDATA_SOCIAL_PROFILES_MYSPACE'	=> $this->config['senky_structureddata_myspace'],
			'STRUCTUREDDATA_SOCIAL_PROFILES_PINTEREST'	=> $this->config['senky_structureddata_pinterest'],
			'STRUCTUREDDATA_SOCIAL_PROFILES_SOUNDCLOUD'	=> $this->config['senky_structureddata_soundcloud'],
			'STRUCTUREDDATA_SOCIAL_PROFILES_TUMBLR'		=> $this->config['senky_structureddata_tumblr'],

			'S_PAGES_ENABLED'			=> $this->ext_manager->is_enabled('phpbb/pages'),
		));
	}

	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}

	protected function validate_data()
	{
		$errors = [];

		// form key
		if (!check_form_key('senky_structureddata_acp'))
		{
			$errors[] = $this->language->lang('FORM_INVALID');
		}

		// logo URL
		$logo_url = $this->request->variable('senky_structureddata_logo_url', '', true);
		if (!empty($logo_url))
		{
			if (substr($logo_url, 0, 4) !== 'http')
			{
				$errors[] = $this->language->lang('LOGO_URL_ABSOLUTE');
			}
			else
			{
				$size = getimagesize($logo_url);
				if ($size === false)
				{
					$errors[] = $this->language->lang('LOGO_URL_NO_FETCH');
				}
				else
				{
					if ($size[0] < 112 || $size[1] < 112)
					{
						$errors[] = $this->language->lang('LOGO_URL_TOO_SMALL');
					}
					if (!in_array($size['mime'], ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']))
					{
						$errors[] = $this->language->lang('LOGO_URL_INVALID_TYPE');
					}
				}
			}
		}

		// social profiles
		foreach ($this->same_as as $profile)
		{
			$url = $this->request->variable('senky_structureddata_' . $profile, '', true);
			if (!empty($url))
			{
				if (strpos($url, $profile . '.com/') === false)
				{
					$errors[] = $this->language->lang(strtoupper($profile) . '_INVALID');
				}
			}
		}

		return $errors;
	}
}
