<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\MassDestroyProductRequest;
use App\Http\Controllers\Requests\UpdateProductRequest;
use App\Http\Controllers\Requests\StoreProductRequest;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getData($request);

        $products = Products::all();

        return view('admin.products.index', compact('products'))->with($data);
    }
   
    public function create(Request $request)
    {
        $data = $this->getData($request);

        return view('admin.products.create')->with($data);
    }

    public function store(StoreProductRequest $request )
    {
        $data = $this->getData($request);

        $product = Products::create($request->all());

        return redirect()->route('admin.products.index')->with($data);
    }

    public function edit(Products $product, Request $request)
    {
        $data = $this->getData($request);

        return view('admin.products.edit', compact('product'))->with($data);
    }

    public function update(UpdateProductRequest $request, Products $product)
    {
        $data = $this->getData($request);

        $product->update($request->all());

        return redirect()->route('admin.products.index')->with($data);
    }

    public function show(Products $product, Request $request)
    {
        $data = $this->getData($request);
        return view('admin.products.show', compact('product'))->with($data);
    }

    public function destroy(Products $product)
    {
        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Products::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    private function getData(Request $request)
    {
        $Today = date('y:m:d', time());
        $new = date('l, F d, Y', strtotime($Today));

        $data["username"] = $request->session()->get('user_name');
        $data["today"] = $new;

        return $data;
    }

}
