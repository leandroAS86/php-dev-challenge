@extends('layouts.master')

@section('content')
  <div class="container">
    @include('layouts.error')

    @include('layouts.message')

      <div class="col-sm-12"> 
        <h2>Produto {{$products->sku}}</h2>       
        <form method = "post" action="{{route('prod.update', $products->sku)}}"> 
          {{ csrf_field() }}
          <div class="row">
            <div class="form-group col-sm-4">
              <label for="name">Nome:</label>
              <input type="text" class="form-control" name= "name" value="{{$products->name}}" id="name"">
            </div>

            <div class="form-group col-sm-4">
              <label for="price">Preço:</label>
              <input type="text" class="form-control" name= "price" value="{{$products->price}}" id="price" ">
            </div>

            <div class="form-group col-sm-12">
              <label for="description">Descrição:</label>
              <textarea class="form-control" rows="3" name= "description" value="" id="price">{{$products->description}}</textarea>
            </div>  

          </div><!-- /.row -->         
                 
         <div class="form-group">
            <div class=" col">
                <button type="submit" class="form-control btn btn-primary ">Atualizar Produto {{$products->sku}}</button> 
            </div> 
          </div>

        </form>        
      </div>
  </div><!-- /.container -->

  <hr>

@endsection