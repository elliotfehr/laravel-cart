<?php namespace Fehr\Cart;

use Illuminate\Support\Facades\Config;

class CartConfig {

	public $cookieName;
	public $cookieDuration;
	public $cache;
	public $cacheDuration;

	public function __construct()
    {

        $this->cookieName = Config::get('cart::cart.session.cookie');
        $this->cookieDuration = Config::get('cart::cart.session.duration');
        $this->cache = Config::get('cart::cart.cache.enabled');
        $this->cacheDuration = Config::get('cart::cart.cache.duration');

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