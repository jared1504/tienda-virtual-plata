<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * @param \App\Http\Requests\ProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $product = Product::create($request->validated());

        $request->session()->flash('product.id', $product->id); */


        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'height' => 'required',
            'width' => 'required',
            'weight' => 'required',
            'category_id' => 'required|numeric',
        ]);

        //guardar imagen
        $imagen = $request->file('image');
        $nombreImagen = Str::uuid() . "." . $imagen->extension();
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);
        $imagenPath = public_path('img/products') . "/" . $nombreImagen;
        $imagenServidor->save($imagenPath);

        //guardar cambios
        $product = new  Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $nombreImagen;
        $product->height = $request->height;
        $product->width = $request->width;
        $product->weight = $request->weight;
        $product->category_id = $request->category_id;
        $product->save();

        $request->session()->flash('message', "Producto registrado con éxito");

        return redirect()->route('product.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * @param \App\Http\Requests\ProductUpdateRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {/* 
        $product->update($request->validated());

        $request->session()->flash('product.id', $product->id); */
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'height' => 'required',
            'width' => 'required',
            'weight' => 'required',
            'category_id' => 'required|numeric',
        ]);

        //guardar imagen
        if ($request->image) {
            $imagen = $request->file('image');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);
            $imagenPath = public_path('img/products') . "/" . $nombreImagen;
            $imagenServidor->save($imagenPath);
        } else {
            $nombreImagen = $product->image;
        }


        //guardar cambios
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $nombreImagen;
        $product->height = $request->height;
        $product->width = $request->width;
        $product->weight = $request->weight;
        $product->category_id = $request->category_id;
        $product->save();

        $request->session()->flash('message', "Producto Actualizado con éxito");


        return redirect()->route('product.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        $request->session()->flash('danger', "Producto Eliminado con éxito");
        return redirect()->route('product.index');
    }
}
