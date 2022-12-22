@extends('layout.master')
@section('content')
<a href="{{ route('category.index') }}" class="btn bg-pink-400 hover:bg-pink-600 rounded btn-block btn-sm">Back</a>
<form action="{{ route('category.update',$category->id) }} " class="form-group " method="post">
    @csrf
    @method('PUT')
    <label for="Update name">Update Name</label>
    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholdler="Enter update name">
    <input type="submit" value="Update" name="submit" class="btn btn-info mt-2 btn-sm rounded">
</form>
@endsection