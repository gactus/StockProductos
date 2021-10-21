<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\CreateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('products.index')->with(compact('request'));
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
        echo "Se han registrado los siguientes datos: </br>";
        dd($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == 1){
            $codProducto = "PROD-1";
            $nombreProducto = "Tangananica";
            $categoriaProducto = "Cosméticos";
            $sucursalProducto = "STGO-2";
            $descripcionProducto = "Cosméticos si no le gusta en tanganana";
            $precioProducto = "$ 5.000";
            $stockProducto = 500;
        }else{
            if ($id == 2){
                $codProducto = "PROD-2";
                $nombreProducto = "Tangananicanica";
                $categoriaProducto = "Cosméticos";
                $sucursalProducto = "STGO-1";
                $descripcionProducto = "Cosméticos si no le gusta en tangananica";
                $precioProducto = "$ 5.500";
                $stockProducto = 450;
            }else{
                $codProducto = "PROD-3";
                $nombreProducto = "Tanganana";
                $categoriaProducto = "Cosméticos";
                $sucursalProducto = "STGO-3";
                $descripcionProducto = "Cosméticos si no le gusta en tangananicanica";
                $precioProducto = "$ 5.500";
                $stockProducto = 450;
            }
        }
        return view('products.show')->with(compact('codProducto','nombreProducto','categoriaProducto','sucursalProducto','descripcionProducto','precioProducto','stockProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == 1){
            $codProducto = "PROD-1";
            $nombreProducto = "Tangananica";
            $categoriaProducto = 1;
            $sucursalProducto = 2;
            $descripcionProducto = "Cosméticos si no le gusta en tanganana";
            $precioProducto = 5000;
            $stockProducto = 500;
        }else{
            if ($id == 2){
                $codProducto = "PROD-2";
                $nombreProducto = "Tangananicanica";
                $categoriaProducto = 1;
                $sucursalProducto = 1;
                $descripcionProducto = "Cosméticos si no le gusta en tangananica";
                $precioProducto = 5500;
                $stockProducto = 450;
            }else{
                $codProducto = "PROD-3";
                $nombreProducto = "Tanganana";
                $categoriaProducto = 1;
                $sucursalProducto = 3;
                $descripcionProducto = "Cosméticos si no le gusta en tangananicanica";
                $precioProducto = 5500;
                $stockProducto = 450;
            }
        }
        return view('products.edit')->with(compact('id','codProducto','nombreProducto','categoriaProducto','sucursalProducto','descripcionProducto','precioProducto','stockProducto'));
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
        dd("Se han editado los siguientes datos: " , $input , "para el id: " , $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("Se ha eliminado el registro asociado al id: " . $id);
    }
}
