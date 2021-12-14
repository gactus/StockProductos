<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\BranchProduct;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()!=null)
        {
            $products=Product::search($request);
            return view('products.index')->with('products',$products)->with('request',$request);
        }else
        {
            return view('auth.login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->validated();
        if($input)
        {
            $product= new Product();
            $product->product_name=$input['txtNombre'];
            $product->product_status=true;
            $product->product_code=$input['txtCodigo'];
            $product->description=$input['txtDescripcion'];
            $product->product_stock=$input['txtStock'];
            $product->product_price=$input['txtPrecio'];
            $product->category_id=$input['lstCategoria'];
            $productId=$product->create($product->toArray())->product_id;

            $productBranche= new BranchProduct();
            $productBranche->product_id=$productId;
            $productBranche->branch_id=$input['lstSucursal'];
            $productBranche->save();
            $products=Product::all();
            return view('products.index')->with('products',$products);
        }else{
            return view('errors.badgateway');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::where('product_id', $id)->first();
        return view('products.show')->with(compact('product',$product));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::where('product_id', $id)->first();
        return view('products.edit')->with(compact('product',$product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, $id)
    {
       $input = $request->validated();
       $product=Product::where('product_id', $id)->first();
       $productBranch=BranchProduct::where('product_id', $id)->first();
       if($product != null)
       {
            $product->product_name=$input['txtNombre'];
            $product->product_status=true;
            $product->product_code=$input['txtCodigo'];
            $product->description=$input['txtDescripcion'];
            $product->product_stock=$input['txtStock'];
            $product->product_price=$input['txtPrecio'];
            $product->category_id=$input['lstCategoria'];
            $product->save();
            $productBranch->product_id=$product->product_id;
            $productBranch->branch_id=$input['lstSucursal'];
            $productBranch->save();
       }
       $products=Product::all();
       return view('products.index')->with('products',$products);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product )
    {
        $product->delete();
    }

}
