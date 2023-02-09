<?php

namespace App\Http\Controllers;

use App\products;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Product;
class ProductsController extends Controller
{

    // function __construct()
    // {

    //     $this->middleware('permission: المنتجات', ['only' => ['index']]);
    //     $this->middleware('permission:اضافة منتج', ['only' => ['create','store']]);
    //     $this->middleware('permission:تعديل منتج', ['only' => ['edit','update']]);
    //     $this->middleware('permission:حذف منتج', ['only' => ['destroy']]);

    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        $products = Product::get();
        return view('products.index',compact('sections' , 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            'product_name' => $request->product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $products)
    {
        $id = Section::where('section_name', $request->section_name)->first()['id'];

        $Products = Product::findOrFail($request->id);
 
        $Products->update([
        'product_name' => $request->product_name,
        'description' => $request->description,
        'section_id' => $request->section_id,
        ]);
 
        session()->flash('Edit', 'تم تعديل المنتج بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , Product $products)
    {
        $id = $request->id;
        Product::find($id)->delete();
        session()->flash('delete','تم حذف المنتج  بنجاح');
        return redirect('/products');
    }
}
