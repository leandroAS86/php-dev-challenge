<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Product;
use App\Order;

class HomeController extends Controller
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
    	return view('index');
    }

    public function show(){
        switch (request('action')) {
            case 'Pesquisar Produto':

                $product = Product::where('sku', request('sku'))->get();

                if($product->isNotEmpty()){
                    //dd($product);
                    return view('home.index', [
                        'products' => $product
                    ]);   
                }
                else 
                    return redirect('/')
                        ->with('alert', 'Produto não cadastrado para SKU informado.');
                break;

            case 'Pesquisar Pedido':

                $product = Product::where('sku', request('sku'))->first();                    //verifica se existe produto cadastrado com sdk informado
                
                if(!is_null($product)){
                    
                    $order = Order::where('product_id', $product->id)->get();               //verifica se existe pedido para o produto com sdk informado

                    if($order->isNotEmpty()){
                            return view('home.index', [
                            'orders' => $order
                        ]);    
                    } 
                    else 
                        return redirect('/')
                            ->with('alert', 'Pedido não cadastrado para SKU informado.'); 
                }
                else 
                    return redirect('/')
                        ->with('alert', 'Produto não cadastrado para SKU informado.');
                break;
        }
    }
}