@extends('views::theme')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Lista opcji</h1>
            <a class="btn btn-primary" href="{{ url('products/available') }}">Lista produktow ze stanem magazynowym > 0</a>
            <a class="btn btn-primary" href="{{ url('products/available/5') }}">Lista produktow ze stanem magazynowym > 5</a>
            <a class="btn btn-primary" href="{{ url('products/unavailable') }}">Lista niedostepnych produktow</a>
        
            
        </div>
    </div>
</div>
@endsection



