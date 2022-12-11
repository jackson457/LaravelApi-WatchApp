<?php

namespace App\Http\Controllers;
use App\Models\Watch;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class WatchController extends Controller
{
    public function index()
    {
        $watch=Watch::orderBy('id','asc')
        
        ->paginate(2);
        return view('watch.index',compact('watch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('watch.create',compact('category'));
    }
    public function create1(){
        $category=Category::all();
        return view('watch.edit')->compact('category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => "required",
            'name' => "required",
            'price' => "required",
            'description' => "required",
            'image' => "required|mimes:png,jpg,webp"
        ]);
        //image_upload
        $file=$request->file('image');
        $name=uniqid().$file->getClientOriginalName();
        $file->move(public_path('/image'), $name);
        Watch::create([
            'category_id'=> $request->category_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'image'=>$name,
            "description"=> $request->description
        ]);
        return redirect()->back()->with('success','Watch created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $watch=Watch::all();
        return view('watch.index')->compact('watch');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $watch=watch::find($id);
        return view('watch.edit',compact('watch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "category_id" => "required",
            "name" => "price",
            "price" => "required",
            "image" => "required",
            "description" => "required"
        ]);
        $info=watch::where('id', $id)->update([
            "category_id" => $request->category_id,
            "name" => $request->name,
            "image" => $request->name,
            "description" => $request->description
        ]);
        return redirect()->back()->with('success','Data has been updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        watch::find($id)->delete();
        return redirect()->back()->with('success','Record deleted successfully.');
    }
}
