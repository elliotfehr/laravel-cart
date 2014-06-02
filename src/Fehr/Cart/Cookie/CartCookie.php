<?php namespace Fehr\Cart\Cookie;

use Fehr\Cart\CartConfig;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class CartCookie {

	public $exists;
	public $config;

    public function __construct()
    {

    	$this->config = New CartConfig;
        $this->exists = $this->checkForExistingCookie();

    }

    public function createNewCookie()
	{

		$session = Hash::make(Session::getId());

		$cookie = Cookie::queue($this->config->cookieName, $session, $this->config->cookieDuration);

		return $session;

	}

	public function destroyCookie()
	{

		$cookie = Cookie::forget($this->config->cookieName);

		return $cookie;

	}
	
	public function checkForExistingCookie()
	{

		if (is_null($this->getExistingCookie())) {

			return false;

		} else {

			return true;

		}
	}

	public function getExistingCookie()
	{
		$cookie = Cookie::get($this->config->cookieName);

		return $cookie;
	}

} 