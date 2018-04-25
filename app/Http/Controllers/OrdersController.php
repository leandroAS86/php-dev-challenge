<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Order;
use App\Product;

class OrdersController extends Controller
{
     /* Create a new controller instance.
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
        return view('polvo.orders');
    }

    public function store(){

    	$validator = Validator::make(request()->all(), [
            'sku' => 'required|string|max:255',
            'qtd' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
    			->back()
                ->withErrors($validator)
                ->withInput();
        }

        $prod = Product::where('sku', request('sku'))->get()->toArray();
         
        $total = $prod[0]['price'] * request('qtd');

        Order::create([
        	'value' => $total,
        	'product_id' => $prod[0]['id'],
        ]);

        return redirect()
    			->back()
                ->with('success', 'Pedido adicionado com sucesso'); 
        /*$product = new Product;
        $product->request(['name','sdk','price','description']);
        $product->save();

        return redirect()
    			->back()
                ->withInput();*/
    }
}
