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

namespace senky\structureddata\acp;

class main_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;
	public function main($id, $mode)
	{
		global $phpbb_container;
		$acp_controller = $phpbb_container->get('senky.structureddata.controller.acp');
		$language = $phpbb_container->get('language');

		$this->tpl_name = 'acp_structureddata_body';
		$this->page_title = $language->lang('ACP_STRUCTUREDDATA_TITLE');

		$acp_controller->set_page_url($this->u_action);
		$acp_controller->display_settings();
	}
}
