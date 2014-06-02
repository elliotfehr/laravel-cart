Laravel Shopping Cart Package
=============================

[![Build Status](https://travis-ci.org/laravel/framework.png)](https://travis-ci.org/laravel/framework)

This is a quick package to allow the creation of shopping 
carts for users that may or may not be logged into your 
application.

If a user is not logged in, a cookie will be placed with a
unique value that is then stored in a database.  If the
user returns before the cookie has expired (can be set in
the `config.php` file), they will still have all of their
items in their cart.

If a user logs in using Laravel's native Auth class or
uing Sentry, the user_id will be added to the cart created
in the database, allowing the user to return back to the
same cart.

To install this package you will need to add the following
to your `composer.json` file:

```
"repositories": [
    {
        "type": "git",
        "url": "git@github.com:elliotfehr/laravel-cart.git"
    }
],
"require": {
	"laravel/framework": "4.2.*",
	"fehr/cart": "dev-master"
},
```

Now you will need to run:

	composer update

Next you will need to register the CartServiceProvider as
a provider in `app.php`:

	'Fehr\Cart\CartServiceProvider'

And you can optionally register the Cart Facade as an
alias in `app.php`

	'Cart'	=>	'Fehr\Cart\CartFacade'


To create new cart you will need to call:
	
	Cart::createCart();

To add an item to the cart you will need to pass an array
with the item you would like to add to the cart:

	$item = array(
		"cart_id" 		=> 1,
		"item_id" 		=> 7,
		"quantity" 		=> 20,
	);

	Cart::addItemToCart($item);

To retrieve every item in a users cart:

	Cart::cartItems();

To remove an item from the cart you will need to pass the ID
of the item you would like to remove:

	$itemId = 3;

	Cart::removeItemFromCart($itemId);

To empty every item from the cart:

	Cart::emptyCart();