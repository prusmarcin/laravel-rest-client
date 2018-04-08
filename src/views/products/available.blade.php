@extends('views::theme')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div><a href="{{ url('/products') }}" class="btn btn-warning">Turn to Home Page</a></div>
            <h1>Lista dostepnych produktow - amount > 0</h1>
            
            <div class="text-left">
                <h3>Dodaj nowy produkt</h3>
                <form action="{{ url('/products') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" name="name" placeholder="Nazwa produktu ..." style="margin-bottom:10px;">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col">
                                <input type="text" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" value="{{ old('amount') }}" name="amount" placeholder="Ilość ..." style="margin-bottom:10px;">
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            
                            <div class="col">
                                <button class="btn btn-primary float-left" type="submit">Dodaj produkt</button>
                            </div>
                        </div>
                    </form>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->amount }}</td>
                                <td><a class="btn btn-info" href="{{ url('products/' . $product->id . '/edit') }}">Edit</a></td>
                                <td><form method="POST" action="{{ url('/products/' . $product->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger" onClick="return confirm('Are you sure?')">Delete</button>
                    </form></td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

