<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Product;
use App\Order;

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
    	$orders = Order::all();

        return view('polvo.products', [
        	'order' => $orders 
        ]);
    }

    public function formUpdate($key)
    {
        $product = Product::where('sku', $key)->first();
        
        return view('polvo.update', [
            'products' => $product 
        ]);
    }

    public function store(){

    	$validator = Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
            'sku' => 'required|unique:products|max:255',
            'price' => 'required|numeric',
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
    }

    public function update($key){

        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = request()->all();

        DB::table('products')->where('sku', $key)->update([
            'name' => $input['name'],
            'price' => $input['price'],
            'description' => $input['description']
        ]);
            return redirect()
                ->back()
                ->with('success', 'Produto Atualizado');
        
    }

    public function delete($key){

        $product = Product::where('sku', $key)->first();

        if(!is_null($product)){

            $order = Order::where('product_id', $product->id)->get();
       
            foreach ($order as $ord) {
                $ord->delete();                                          //se existir pedido para esse produto, deverá ser deletado
            } 
           
            $product->delete();
            return redirect('/')
                ->with('status', 'Produto excluído');
        }else
            return redirect()->back()->withErrors($product);
    }
}
