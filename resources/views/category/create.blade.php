@extends('layout.master')
@section('content')
<a href="{{ route('category.index') }}" class="btn btn-dark btn-sm">Back</a>
    <form action="{{route ('category.store') }}" method="post" class="form-group">
        @csrf
        <label for="name">Name</label><br>
        <input type="text" name="name" class="form-control" placeholder="Enter name"><br>
        <input type="submit" value="Submit" class="btn btn-info">
    </form>
@endsection