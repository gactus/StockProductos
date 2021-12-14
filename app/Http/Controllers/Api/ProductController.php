<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\http\Requests\Api\CreateProductRequest;
use App\http\Requests\Api\IndexProductRequest;
use App\http\Requests\Api\UpdateProductRequest;
use App\http\Requests\Api\DeletedProductRequest;
use App\http\Requests\Api\UpdateProductByFiltersRequest;
use App\http\Requests\Api\DeleteProductByFiltersRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use phpDocumentor\Reflection\Types\True_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexProductRequest $request)
    {
        $input = $request->validated();
        $products=Product::search($input);
        return response()->json(['message' => 'Datos Obtenidos por Json', 'data' => $products],202);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleted(DeletedProductRequest $request )
    {
        $input = $request->validated();
        $rows=Product::search($input, true);
        return response()->json(['message' => 'Los siguientes registros han sido eliminados logicamente: ', 'data' => $rows],202);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->validated();
        if($input)
        {
            $product = new Product();
            $product->product_status=true;
            $product->product_name=$request->input('product_name');
            $product->product_code=$request->input('product_code');
            $product->description=$request->input('product_description');
            $product->product_stock=$request->input('product_stock');
            $product->product_price=$request->input('product_price');
            $product->category_id=$request->input('category_id');
            $product->branch_id=$request->input('branch_id');
            $product->save();
            return response()->json(['message' => 'Datos Obtenidos por Json', 'data' => $request->validated()],202);
        }else{
            return response()->json(['message' => 'Request no valida', 'data' => null],400);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param int $idSucursal
     * @param string $nombreProducto
     * @param string $codigoProducto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        if ($product){
            return response()->json(['message' => 'Datos Obtenidos por Json', 'data' => $product],202);
        }
        return response()->json(['message' => 'No existen registros asociados al id: ' .  $id],'404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $input = $request->validated();
        $product->update($input);
        $product->refresh();
        return response()->json(['message' => 'Datos actualizados correctamente', 'data' => $product],202);
    }

    /*  Update con filtros */
    public function updateByFilters(UpdateProductByFiltersRequest $request, Product $product){
        $input = $request->validated();
        $cod=$input['product_code'];
        $producto=Product::where('product_code', $cod)->first();
        if(isset($producto))
        {
            Product::modifyByFilters($input);
            return response()->json(['message' => 'Datos actualizados correctamente', 'data' => $product],202);
        }else{
            return response()->json(['message' => 'Producto no existe', 'data' => $product],404);
        }
    }
/*  Fin */
    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Producto eliminado correctamente (De forma lógica).'],202);

    }
    public function forceDestroy(Product $product)
    {
        $product->forceDelete();
        return response()->json(['message' => 'Producto eliminado correctamente (De forma física).'],202);
    }
    public function deleteByFilters(DeleteProductByFiltersRequest $request, $deleteType){
        //deleteType= 0: Borrado Lógico / 1: Borrado Físico
        if (in_array($deleteType,[0,1])){
            $input = $request->validated();
            Product::destroyByFilters($input, $deleteType);
            return response()->json(['message' => 'Productos eliminados correctamente.'],202);
        }
        return response()->json(['message' => 'El parámetro de entrada es incorrecto.'],422);
    }
}
