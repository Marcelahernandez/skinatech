<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index($id = null){
        if($id == null){
            $category = Category::where('padre',0)->get();
            return view('category.index',compact('category','id'));
        } else {
            $category = Category::where('padre',$id)->get();
            return view('category.index',compact('category','id'));
        }
        
    }

    public function create($id = null){
        return view('category.create', compact('id'));
    }

    public function store(Request $request){
        $category = new Category;
        $category->name = $request->nombre;
        $category->status = $request->estado;
        if($request->padre == ''){
            $category->padre = 0;
        } else {
            $category->padre = $request->padre;
        }
        $category->save();
        if($request->padre == ''){
            return redirect('category'); 
        } else {
            return redirect('category/'.$request->padre); 
        }

        
    }

    public function edit($id){
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->nombre;
        $category->status = $request->estado;
        $category->padre = $request->padre;
        $category->save(); 
        if($category->padre != 0){
            return redirect('category/'.$category->padre);
        } else {
            return redirect('category');
        }
        
    }
    public function delete($id){
       
        $category = Category::find($id)->delete();
        return redirect('category');
    }
}
