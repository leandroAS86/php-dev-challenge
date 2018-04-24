@extends('layouts.master')

@section('content')
  <div class="container">
    @include('layouts.error')

    @include('layouts.message')

    
      <div class="col-sm-12">        
        <form method = "post" action="{{route('prod.store')}}"> 
          {{ csrf_field() }}
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="name">Nome:</label>
              <input type="text" class="form-control" name= "name" id="name"">
            </div>

            <div class="form-group col-sm-4">
              <label for="">SKU:</label>
              <input type="text" class="form-control" name= "sku" id="sku" ">
            </div>

            <div class="form-group col-sm-4">
              <label for="price">Preço:</label>
              <input type="text" class="form-control" name= "price" id="price" ">
            </div>

            <div class="form-group col-sm-12">
              <label for="description">Descrição:</label>
              <textarea class="form-control" rows="3" name= "description" id="price"></textarea>
            </div>  

          </div><!-- /.row -->         

          <hr>
                        
         <div class="form-group">
            <div class=" col">
                <button type="submit" class="form-control btn btn-primary ">Adicionar Produto</button> 
            </div> 
          </div>

        </form>        
      </div>
    

  </div><!-- /.container -->

@endsection