<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Proyecto Stock Productos
        </h2>
        <div class="flex flex-wrap px-8 -mx-2 overflow-hidden lg:px-0 sm:px-0 xl:px-0">
            <div class="flex px-2 my-2 overflow-hidden">
                <a href="{{route('products.index')}}">Listar Productos</a>
            </div>
            <div class="flex px-2 my-2 overflow-hidden">
                <a href="{{route('products.create')}}">Crear Producto</a>
            </div>
            <div class="flex px-2 my-2 overflow-hidden">
                <a href="{{route('offices.create')}}">Asociar Producto</a>
            </div>
        </div>
    </x-slot>
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Ver producto</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            <em>Ver información de un producto</em>
                        </p>
                    </div>
                </div>
                {!! Form::open(['route' => 'products.store', 'method'=>'post']) !!}
                <div class="shadow overflow-hidden sm:rounded-md bg-white">
                    <x-jet-validation-errors class="mb-4"></x-jet-validation-errors>
                </div>
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white xl:p-12">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                @php

                                @endphp
                                {{Form::label('txtCodigo','Código Producto',['class'=>'block text-sm font-medium text-gray-700'])}}
                                <span class="text-indigo-700"> {{$product['product_code']}}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{Form::label('txtNombre','Nombre del Producto',['class'=>'block text-sm font-medium text-gray-700'])}}
                                <span class="text-indigo-700">{{$product['product_name']}}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{Form::label('lstCategoria','Categoría',['class'=>'block text-sm font-medium text-gray-700'])}}
                                <span class="text-indigo-700">{{$product->categories->category_name}}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{Form::label('lstSucursal','Sucursal',['class'=>'block text-sm font-medium text-gray-700'])}}
                                <span class="text-indigo-700">{{$product->branches[0]['branch_name'] }}</span>
                            </div>

                            <div class="col-span-6">
                                {{Form::label('txtDescripcion','Descripción',['class'=>'block text-sm font-medium text-gray-700'])}}
                                <span class="text-indigo-700"> {{$product['description']}}</span>
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                {{Form::label('txtPrecio','Precio',['class'=>'block text-sm font-medium text-gray-700'])}}
                                <span class="text-indigo-700">${{$product['product_price']}}</span>
                            </div>
                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                {{Form::label('txtStock','Stock',['class'=>'block text-sm font-medium text-gray-700'])}}
                                <span class="text-indigo-700">{{$product['product_stock']}}</span>
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                       <button type="button" id="btnVolver" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"><a href="{{route('products.index')}}"> Volver</a></button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>
