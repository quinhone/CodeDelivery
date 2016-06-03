<?php
/**
 * Created by PhpStorm.
 * User: LuisCarlos
 * Date: 02/06/2016
 * Time: 21:40
 */

namespace CodeDelivery\OAuth2;


use Illuminate\Support\Facades\Auth;

class PasswordVerifier
{
	public function verify($username, $password)
	{
		$credentials = [
			'email'    => $username,
			'password' => $password,
		];

		if (Auth::once($credentials)) {
			return Auth::user()->id;
		}

		return false;
	}
}