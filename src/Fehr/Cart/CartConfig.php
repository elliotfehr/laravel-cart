<?php namespace Fehr\Cart;

use Illuminate\Support\Facades\Config;

class CartConfig {

	public $cookieName;
	public $cookieDuration;
	public $cache;
	public $cacheDuration;

	public function __construct()
    {

        $this->cookieName = Config::get('cart::config.cookie', 'cart_cookie');
        $this->cookieDuration = Config::get('cart::config.cookie_duration', '43200');
        $this->cache = Config::get('cart::config.cache', false);
        $this->cacheDuration = Config::get('cart::config.cache_duration', 60);

    }

    public function cookieName()
    {

    	return $cookieName;

    }

    public function cookieDuration()
    {

    	return $cookieDuration;

    }

    public function cacheEnabled()
    {

    	return $cache;

    }

    public function cacheDuration()
    {

    	return $cacheDuration;

    }
}