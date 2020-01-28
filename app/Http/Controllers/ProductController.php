<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$products = Product::join( 'users', 'products.supplier_id', '=', 'users.id' )
		                   ->select( 'users.name as supplier_name', 'products.*' )
		                   ->latest()->get();

		return view( 'admin.product.index', compact( 'products' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$products  = Product::all();
		$suppliers = User::where( 'user_type', '=', 2 )->get();

		return view( 'admin.product.create', compact( 'products', 'suppliers' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$inputs = $request->except( '_token' );

		$rules = [
			'name'        => 'required | min:3',
			'description' => 'required',
			'photo'       => 'image',
			'price'       => 'required',
			'quantity'    => 'required | integer',
			'supplier_id' => 'required | integer',
		];

		$validation = Validator::make( $inputs, $rules );
		if ( $validation->fails() ) {
			return redirect()->back()->withErrors( $validation )->withInput();
		}

		$supplier_id = intval( $inputs['supplier_id'] );

		$up_photo = $request->file( 'photo' );
		if ( ! is_null( $up_photo ) ) {
			$current_date     = Carbon::now()->toDateString();
			$store_photo_name = uniqid() . '--' . $up_photo->getClientOriginalName();

			$store_dir     = 'products/' . $supplier_id . '/' . $current_date;
			$photo_db_path = $up_photo->storeAs( $store_dir, $store_photo_name );
		} else {
			$photo_db_path = null;
		}

		$product              = new Product();
		$product->name        = filter_var( $inputs['name'], FILTER_SANITIZE_STRING );
		$product->description = filter_var( $inputs['description'], FILTER_SANITIZE_STRING );
		$product->price       = $inputs['price'];
		$product->photo       = $photo_db_path;
		$product->quantity    = intval( $inputs['quantity'] );
		$product->supplier_id = $supplier_id;
		$product->save();

		$request->session()->flash( 'status', 'Product Successfully Created!' );

		return redirect()->route( 'admin.product.index' );
	}

	/**
	 * @param $id
	 *
	 * return all products of specific supplier
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function supplierProduct( $id ) {
		$supplier_id = intval($id);

		$products = User::find($supplier_id)->products;
		$supplier_name = User::find( $supplier_id )->name;

		return view( 'admin.product.index', compact( 'products', 'supplier_name' ) );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Product $product ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Product $product ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Product $product ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Product $product ) {
		//
	}
}
