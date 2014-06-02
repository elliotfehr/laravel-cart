<?php namespace Fehr\Cart\Cart;

use Fehr\Cart\CartConfig;
use Fehr\Cart\User\CurrentUser;
use Fehr\Cart\Models\Cart;
use Fehr\Cart\Models\CartItem;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Cookie; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;



class CartInterface {

	public $cookie;
	public $user;
	public $config;

	public function __construct()
	{
		$this->cookie = new CartCookie;
		$this->user = new CurrentUser;
		$this->config = new CartConfig;
	}

	public function createCart()
	{
		if ($this->cookie->checkForExistingCookie() == true)
		{

			if ($this->config->cache == true) {

				//User has a cookie already so let's check to see if they have a cart
				$cart = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
									->orWhere('user_id', '=', $this->user->getCurrentUserId())->remember($this->config->cacheDuration)->first();

			} else {

				$cart = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
									->orWhere('user_id', '=', $this->user->getCurrentUserId())->first();

			}

			if (is_null($cart)) {

				$cart = new Cart;
				$cart->session_id = $this->cookie->getExistingCookie();
				$cart->save();
				return $cart;

			} else {

				return Response::make('User Already Has a Cart');

			}

		} else {
			//Cookie does not exist for this user
			//Let's create the cookie and the cart for that cookie

			if ($this->config->cache == true) {

				//User has a cookie already so let's check to see if they have a cart
				$cart = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
									->orWhere('user_id', '=', $this->user->getCurrentUserId())->remember($this->config->cacheDuration)->first();

			} else {

				$cart = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
									->orWhere('user_id', '=', $this->user->getCurrentUserId())->first();

			}
			if (is_null($cart)) {

				$cookie = $this->cookie->createNewCookie();
				$cart = new Cart;
				$cart->session_id = $cookie;
				$cart->save();
				return $cart;

			} else {

				return Response::make('User Already Has a Cart');

			}

		}
	}

	private function destroyCart()
	{

		$cart = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
							->orWhere('user_id', '=', $this->user->getCurrentUserId())->delete();

		return $cart;

	}

	public function addItem($item)
	{

		$addItem 				= new CartItem;
		$addItem->cart_id 		= $item["cart_id"];
		$addItem->item_id 		= $item["item_id"];
		$addItem->quantity 		= $item["quantity"];
		$addItem->save();
		
		return $addItem;

	}

	public function removeItem($itemId)
	{

		if ($this->config->cache == true) {

			$cartId = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
								->orWhere('user_id', '=', $this->user->getCurrentUserId())->remember($this->config->cacheDuration)->first();

		} else {

			$cartId = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
								->orWhere('user_id', '=', $this->user->getCurrentUserId())->first();

		}

		$cartItems = CartItem::where('cart_id', '=', $cartId->id)
								->where('item_id', '=', $itemId)
								->delete();

		return $cartItems;

	}

	public function emptyCart()
	{

		if ($this->config->cache == true) {

			$cart = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
								->orWhere('user_id', '=', $this->user->getCurrentUserId())->remember($this->config->cacheDuration)->first();

		} else {

			$cart = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
								->orWhere('user_id', '=', $this->user->getCurrentUserId())->first();

		}

		$cartItems = CartItem::where('cart_id', '=', $cart->id)->delete();

		return $cartItems;

	}

	public function getCartContents()
	{

		if ($this->config->cache == true) {

			$cart = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
								->orWhere('user_id', '=', $this->user->getCurrentUserId())->remember($this->config->cacheDuration)->first();

		} else {

			$cart = Cart::where('session_id', '=', $this->cookie->getExistingCookie())
								->orWhere('user_id', '=', $this->user->getCurrentUserId())->first();

		}

		if ($this->config->cache == true) {

			$items = CartItem::where('cart_id', '=', $cart->id)->remember($this->config->cacheDuration)->get();

		} else {

			$items = CartItem::where('cart_id', '=', $cart->id)->get();

		}

		return $items;

	}

}