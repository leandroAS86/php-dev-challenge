<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Product;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.products');
    }

    public function store(){

    	$validator = Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()
    			->back()
                ->withErrors($validator)
                ->withInput();
        }

        Product::create([
        	'name' => request('name'),
        	'sku' => request('sku'),
        	'price' => request('price'),
        	'description' => request('description')
        ]);

        return redirect()
    			->back()
                ->with('success', 'Produto adicionado com sucesso'); 
        /*$product = new Product;
        $product->request(['name','sdk','price','description']);
        $product->save();

        return redirect()
    			->back()
                ->withInput();*/
    }
}
