<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProduct['products'] = Product::paginate(8);
        return view('product.index', $dataProduct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         /*----- validate field ---------*/

         $field = [
            'name' => 'required|string|max:200',
            'description' => 'required|string|max:500',
            'value' => 'required|integer',
            'amount' => 'required|integer',
            'photo' => 'max:10000|mimes:jpg,png,jpeg'
        ];

        $message = [
            'required' => 'El :attribute es requerido',
            'description.required' => 'la descripcion es requerida',
            'value.required' => 'El valor es requerido',
            'amount.required' => 'La cantidad es requerida',
            'mimes' => 'La imagen debe ser png, jpg o jpeg'

        ];

        $this->validate($request, $field, $message);

        /* ---------------- */


        $dataProduct = request()->except('_token');

        if (request()->hasFile('photo')) {
            $dataProduct['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        Product::insert($dataProduct);

        return redirect('product')->with('message', 'Producto registado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            /*----- validate field ---------*/

            $field = [
                'name' => 'required|string|max:200',
                'description' => 'required|string|max:500',
                'value' => 'required|integer',
                'amount' => 'required|integer',
                'photo' => 'max:10000|mimes:jpg,png,jpeg'
            ];
    
            $message = [
                'required' => 'El :attribute es requerido',
                'description.required' => 'la descripcion es requerida',
                'value.required' => 'El valor es requerido',
                'amount.required' => 'La cantidad es requerida',
                'mimes' => 'La imagen debe ser png, jpg o jpeg'
    
            ];
    
            $this->validate($request, $field, $message);
    
            /* ---------------- */


        $dataProduct = request()->except(['_token', '_method']);

        if (request()->hasFile('photo')) {

            $product = Product::findOrFail($id);
            Storage::delete('public/' . $product->photo);
            $dataProduct['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        Product::where('id', '=', $id)->update($dataProduct);

        $product = Product::findOrFail($id);

       return redirect("product")->with('message', 'Producto actualizado con exito!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (Storage::delete('public/' . $product->photo)) {

            Product::destroy($id);
        } else {

            Product::destroy($id);
        }

        $message = '¡El producto fue eliminado con éxito!';

        return redirect("product")->with('message', 'Producto eliminado con exito!');
    }
}
