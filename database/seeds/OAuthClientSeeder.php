<?php

use CodeDelivery\Entities\OauthClient;
use Illuminate\Database\Seeder;

class OAuthClientSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run ()
	{

		OauthClient::create ( [
			'id' => 'appid01',
			'secret' => 'secret',
			'name' => 'Minha App Mobile'
		] );

	}
}
