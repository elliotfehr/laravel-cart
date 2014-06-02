<?php

return array(
	/*
	|--------------------------------------------------------------------------
	| Set Your Shopping Cart Configurations Here
	|--------------------------------------------------------------------------
	|
	| Below you will find the configuration settings used
	| by the Cart class.  
	|
	*/

	'session' => array(

		/*
		|--------------------------------------------------------------------------
		| Set The Name Of The Cookie Here
		|--------------------------------------------------------------------------
		|
		| This is the name of the cookie that will be used
		| by the Cart Class.  It is recommended to give it an 
		| obscure name
		|
		*/


		'cookie' 	=> 'cart_cookie',

		/*
		|--------------------------------------------------------------------------
		| Set The Expiration Time On The Cookie
		|--------------------------------------------------------------------------
		|
		| This is the length amount of time in minutes before
		| the cookie will expire.  It is recommended to set this 
		| to be a large number so that non-registered users
		| will be able to keep items in their cart. 
		|
		|
		*/

		'duration'	=> '120',
	),



	'cache'	=> array(

		/*
		|--------------------------------------------------------------------------
		| Enable/Disable Cache Here
		|--------------------------------------------------------------------------
		|
		| This is where you can set whether or not you want your 
		| cart to use caching for all database interactions. It is 
		| recommended to set to true for production and false in 
		| development.
		|
		*/

		'enabled'	=> false,

		/*
		|--------------------------------------------------------------------------
		| Set the Cache Duration
		|--------------------------------------------------------------------------
		|
		| This is where you can set the cache duration.  This
		| number is purely a prefence and should be determined
		| by the amount of memory your server has.
		|
		*/


		'duration'	=> 60,
	)
);

