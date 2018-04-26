@extends('layouts.master')

@section('content')
  <div class="container">
      @include('layouts.error')

      @include('layouts.message')

      @include('home.polvo')

      <hr>
      @isset($products)
        @include('home.products')
      @endisset

      @isset($orders)
        @include('home.orders')
      @endisset
  </div>
@endsection