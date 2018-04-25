@extends('layouts.master')

@section('content')
  <div class="container">
    @include('layouts.error')

    @include('layouts.message')
    
      <div class="col-sm-12">        
        <form method = "post" action="{{route('ord.store')}}"> 
          {{ csrf_field() }}
            
          <div class="row">

            <div class="form-group col-sm-6">
              <label for="">SKU:</label>
              <input type="text" class="form-control" name= "sku" id="sku" ">
            </div>

            <div class="form-group col-sm-3">
              <label for="qtd">Quantidade:</label>
              <input type="text" class="form-control" name= "qtd" id="qtd" ">
            </div> 

          </div><!-- /.row -->         

          <hr>
                        
         <div class="form-group">
            <div class=" col">
                <button type="submit" class="form-control btn btn-primary ">Adicionar Pedido</button> 
            </div> 
          </div>

        </form>        
      </div>
    

  </div><!-- /.container -->

@endsection