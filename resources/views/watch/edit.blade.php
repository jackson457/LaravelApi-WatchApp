@extends('layout.master')
@section('content')
<a href="{{ route('watch.index') }}" class="btn btn-dark btn-sm">Back</a>
    <form action="{{route ('watch.store') }}" method="post" class="form-group" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label><br>
        <select name="category_id" id="" class="form-control">
            
        </select>
        <label for="name">Enter Name</label>
        <input type="text" name="name" value={{ $watch->name }}  class="form-control">
        <label for="name">Enter price</label>
        <input type="number" name="price" value={{ $watch->price }} class="form-control" placeholder="Enter name">
        <label for="name">choose image</label>
        <input type="file" name="image" class="form-control" value={{ $watch->image }}>
        <label for="">Enter Description</label>
        <textarea name="description" id="" class="form-control" >{{ $watch->description }}</textarea>
        <input type="submit" value="Submit" class="btn btn-sm btn-warning mt-2">
    </form>
@endsection