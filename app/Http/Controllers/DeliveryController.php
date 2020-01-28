<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
	/**
	 * List of delivered products of each supplier
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		$products = User::find(auth()->id())->products;

		return view( 'supplier.index', compact( 'products' ) );
	}
}
