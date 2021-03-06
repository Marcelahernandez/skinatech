<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\CategoryProduct;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function show($id){
        $product = Product::find($id);
        $categorias = CategoryProduct::where('id_products',$id)->where('nivel',1)->get();
        foreach($categorias as $category){
           $categoria = Category::where('id',$category->id_category)->first();
        }

        $subcategorias = CategoryProduct::where('id_products',$id)->where('nivel',2)->get();
        
        foreach($subcategorias as $key =>$subcategoria){
            $arraySubcategorias[$key] = Category::where('id',$subcategoria->id_category)->get();
            $nombreSubcategoria[$key] = $arraySubcategorias[$key][0]->name;
        }
       
        return view('products.show', compact('product','categoria','nombreSubcategoria'));
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
        $categoria = $request->categoria;
        $categoryProducts = new CategoryProduct;
        /**Traer categorias */
        $productosCategory = $categoryProducts::where('id_products',$id)->where('nivel',1)->get();
        foreach($productosCategory as $productCategory){
            if($productCategory->id_category != $categoria){
                CategoryProduct::where('id_products',$id)->where('nivel',1)->delete();
                $categoryProducts->id_products = $id;
                $categoryProducts->id_category = $categoria;
                $categoryProducts->nivel = 1;
                $categoryProducts->save();
            }
        }

        /**Traer subcategorias */
        $productosSubcategory = $categoryProducts::where('id_products',$id)->where('nivel',2)->get();
        $subcategorias =  $request->subcategoria;
        foreach($productosSubcategory as $productSubcategory){
            CategoryProduct::where('id_products',$id)->where('nivel',2)->delete();
            foreach($subcategorias as $subcategory){
                if($productSubcategory->id_category != $subcategory){
                    $categoryProducts = new CategoryProduct;
                    $categoryProducts->id_products = $id;
                    $categoryProducts->id_category = $subcategory;
                    $categoryProducts->nivel = 2;
                    $categoryProducts->save();
                } 
            }
           
        }
        return redirect('products');
    }

    public function delete($id){
        $product = Product::find($id)->delete();
        CategoryProduct::where('id_products',$id)->delete();
        return redirect('products');
    }
}
