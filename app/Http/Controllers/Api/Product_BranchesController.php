<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\http\Requests\Api\UpdateProductBranchRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class Product_BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductBranchRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductBranchRequest $request, Product $products)
    {
        $input = $request->validated();
        $products->update($input);
        $products->refresh();
        return response()->json(['mesage' => 'Datos actualizados correctamente', 'data' => $products]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
