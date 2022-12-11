<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Watch;

class ApiController extends Controller
{
    public function showCategory(){
        $category = Category::all();
        return response()->json(['success' => true, 'data' =>$category]);
    }
    public function showProduct(Request $req){
        $watch=Watch::orderby('id','asc');
       if($req->category_id){
        $watch->where('category_id',$req->category_id);
       }
       $watch=$watch->paginate(4);
       return response()->json(['success'=>true, 'data' => $watch]);
    }
}
