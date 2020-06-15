<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\CategoryProduct;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    public function create(){
        $categorias =  Category::where('padre',0)->get();
        return view('products.create', compact('categorias'));
    }

    public function store(Request $request ){
        
        $product = new Product;
        $product->name = $request->nombre;
        $archivo = $request->imagen;
        if($archivo){
            $nombre = $archivo->getClientOriginalName();
            $product->image = $archivo->move('images',$nombre);
        }
        $product->save();

        $id = $product->id;
        $categoryProducts = new CategoryProduct;
        $categoryProducts->id_category = $request->categoria;
        $categoryProducts->id_products = $id;
        $categoryProducts->nivel = 1;
        $categoryProducts->save();
        $subcategorias = $request->subcategoria;
       
        foreach($subcategorias as $subcategoria){
            $subcategoryProduct = new CategoryProduct;
            $subcategoryProduct->id_category = $subcategoria;
            $subcategoryProduct->id_products = $id; 
            $subcategoryProduct->nivel = 2;
            $subcategoryProduct->save();
        }
        return redirect('products');
    }


    public function getSubcategories($id){
        $subcategorias = Category::subcategories($id);
        return response()->json($subcategorias);
    }

    public function edit($id){
        $product = Product::find($id);
        $categorias =  Category::where('padre',0)->get();
        $categoryProduct = CategoryProduct::where('id_products',$id)->where('nivel',1)->first();
        $subcategoryProduct = CategoryProduct::where('id_products',$id)->where('nivel',2)->get();
        return view('products.edit', compact('product','categorias','categoryProduct','subcategoryProduct'));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->nombre;
        $archivo = $request->imagen;
        if($archivo){
            $nombre = $archivo->getClientOriginalName();
            $product->image = $archivo->move('images',$nombre);
        }
        $product->save();
        /*
        $categoryProducts = new CategoryProduct;
        $categoryProducts->id_category = $request->categoria;
        $categoryProducts->id_products = $id;
        $categoryProducts->nivel = 1;
        $categoryProducts->save();
       */
        return redirect('products');
    }
}
