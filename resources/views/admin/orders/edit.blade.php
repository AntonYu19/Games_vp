@extends('layouts.base-app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Order</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
	
	
		Имя: {{ $order->user->name  }}<br>
		Емайл: {{ $order->user->email  }}<br>

		<table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th width="280px">Price</th>
            </tr>

            @foreach ($order->goods as $good)
                <tr>
                    <td>{{ $good->id }}</td>
                    <td>{{ $good->title }}</td>
                    <td>{{ $good->price }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
