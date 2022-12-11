@extends('layout.master')
@section('content')
<a href="{{ route('category.create') }}" class="btn btn-sm btn-success">Create</a>
<table class="table table-striped">
    <tr>
        <td>Name</td>
        <td>Option</td>
    </tr>
    @foreach($category as $c)
    <tr>
        <td> {{ $c->name }} </td>
        <td><a href="{{ route('category.edit',$c->id) }}" class="btn btn-info btn-sm rounded"> Edit</a>
       <form action="{{ route('category.destroy',$c->id) }}" method="post" class="d-inline" onsubmit="return confirm('sure')">
            @csrf
            @method('DELETE')
            <input type="submit"  value="Delete" class="btn bg-red-400 hover:bg-red-700 btn-sm rounded">
       </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $category->links()}}
@endsection
