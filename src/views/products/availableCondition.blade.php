@extends('views::theme')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div><a href="{{ url('/products') }}" class="btn btn-warning">Turn to Home Page</a></div>
            <h1>Lista produktow ze stanem magazynowym > {{ $amount }}</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
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



