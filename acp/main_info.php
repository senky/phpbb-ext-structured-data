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

class main_info
{
	public function module()
	{
		return [
			'filename'	=> '\senky\structureddata\acp\main_module',
			'title'		=> 'ACP_STRUCTUREDDATA_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'ACP_STRUCTUREDDATA',
					'auth'	=> 'ext_senky/structureddata && acl_a_board',
					'cat'	=> ['ACP_STRUCTUREDDATA_TITLE'],
				],
			],
		];
	}
}
