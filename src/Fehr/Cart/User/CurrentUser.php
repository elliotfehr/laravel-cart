<?php namespace Fehr\Cart\User;

use Illuminate\Support\Facades\Auth;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class CurrentUser {

	public function getCurrentUserId()
	{
		if (class_exists('Sentry')) {

			$user = Sentry::getUserId();
			return $user;

		} elseif (Auth::check()) {
			
			$user = Auth::id();
			return $user;

		} else {

			return false;

		}

	}
}