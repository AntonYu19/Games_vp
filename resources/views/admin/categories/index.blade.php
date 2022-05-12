@extends('layouts.base-app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Products</h2>
                    </div>
                    <div class="col-lg-6">
                        <div style="float:right">
                            <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
                        </div>
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
                <th>Name</th>
                <th>Description</th>
                <th width="280px">Category</th>
            </tr>

            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>                    
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                           @csrf
                            @method('DELETE')
                           
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $categories->links() !!}
    </div>
@endsection
