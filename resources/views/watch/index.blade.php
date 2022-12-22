@extends('layout.master')
@section('content')
<a href="{{ route('watch.create') }}" class="btn btn-sm btn-success">Create</a>
<table class="table table-striped">
    <tr>
        <td>Name</td>
        <td>Price</td>
        <td>Image</td>
        <td>Description</td>
        <td>Option</td>
    </tr>
    @foreach($watch as $c)
    <tr>
        <td> {{ $c->name }} </td>
        <td> {{ $c->price }}</td>
        <td> <img src={{ asset('image/'.$c->image) }} class="img-thumbnail img-fluid"  alt="img"></td>
        <td> {{  $c->description }}</td>
        <td><a href="{{ route('watch.edit',$c->id) }}" class="btn btn-info btn-sm rounded"> Edit</a>
       <form action="{{ route('watch.destroy',$c->id) }}" method="post" class="d-inline" onsubmit="return confirm('sure')">
            @csrf
            @method('DELETE')
            <input type="submit"  value="Delete" class="btn btn-danger btn-sm rounded">
       </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $watch->links()}}
@endsection
