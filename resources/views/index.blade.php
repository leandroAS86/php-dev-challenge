@extends('layouts.master')

@section('content')
  <div class="container">
      @include('layouts.error')

      @include('layouts.message')

      @include('home.polvo')

      <hr>
  </div>
@endsection