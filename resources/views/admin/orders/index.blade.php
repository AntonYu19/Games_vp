@extends('layouts.base-app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Orders</h2>
                    </div>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th width="280px">Category</th>
            </tr>

            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $orders->links() !!}
    </div>
@endsection
