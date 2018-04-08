@extends('views::theme')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">            
            <div class="text-left">
                <div><a href="{{ url('/products') }}" class="btn btn-warning">Turn to Home Page</a></div>
                <h3>Edytuj produkt</h3>
                <form action="{{ url('/products/' . $product->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $product->name }}" name="name" placeholder="Nazwa produktu ..." style="margin-bottom:10px;">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col">
                                <input type="text" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" value="{{ $product->amount }}" name="amount" placeholder="Ilość ..." style="margin-bottom:10px;">
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            
                            <div class="col">
                                <button class="btn btn-primary float-left" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
            </div>
            
            
        </div>
    </div>
</div>
@endsection

