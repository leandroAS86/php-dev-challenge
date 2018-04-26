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
        $products = Product::all();

        return view('polvo.orders', [
        	'product' => $products 
        ]);
    }

    public function store(){

    	$validator = Validator::make(request()->all(), [
            'sku' => 'required|string|max:255',
            'qtd' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()
    			->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::where('sku', request('sku'))->first();
        
        if(is_null($product)){
            return redirect()
                ->back()
                ->with('status', 'Produto não cadastrado para SKU informado.');
        }
        
        $total = $product->price * request('qtd');

        Order::create([
        	'value' => $total,
        	'product_id' => $product->id,
        ]);

        return redirect()
    			->back()
                ->with('success', 'Pedido adicionado com sucesso');
    }

     public function delete($key){
        $order = Order::where('id', $key)->first();

        if(!is_null($order)){

            $order->delete();
            
            return redirect('/')
                ->with('status', 'Pedido excluído');
        }else
            return redirect()->back()->withErrors($product);
    }
}
