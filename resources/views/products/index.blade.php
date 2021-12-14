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
	<div class="bg-white shadow-md rounded my-6">
        {!! Form::open(['route' => 'products.index', 'method'=>'get']) !!}
            <div class="flex flex-wrap px-2 overflow-hidden lg:px-0 sm:px-0 xl:px-0">
                <div class="col-span-6 sm:col-span-3">
                    &nbsp;
                </div>
                <div class="col-span-6 sm:col-span-3">
                    {{Form::label('txtCodigo','Código Producto',['class'=>'block text-sm font-medium text-gray-700'])}}
                    {{Form::text('txtCodigo',isset($request) ? $request->input('txtCodigo'):null,['class'=>'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md'])}}
                </div>
                <div class="col-span-6 sm:col-span-3">
                    &nbsp;
                </div>
                <div class="col-span-6 sm:col-span-3">
                    {{Form::label('txtNombre','Nombre Producto',['class'=>'block text-sm font-medium text-gray-700'])}}
                    {{Form::text('txtNombre',isset($request) ? $request->input('txtNombre'):null,['class'=>'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md'])}}
                </div>
                <div class="col-span-6 sm:col-span-3">
                    &nbsp;
                </div>
                <div class="col-span-6 sm:col-span-3">
                    {{Form::label('lstSucursal','Sucursal',['class'=>'block text-sm font-medium text-gray-700'])}}
                    {{Form::select('lstSucursal', ['' =>'Seleccione','1' => 'STGO-1', '2' => 'STGO-2','3' => 'STGO-3'],isset($request) ? $request->input('lstSucursal'):null,['class'=>'mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md'])}}
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    &nbsp;
                </div>
                <div class="px-4 py-4 bg-white text-right sm:px-6">
                    {{Form::submit('Buscar',['class'=>'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'])}}
                </div>
            </div>
            <div class="overflow-x-auto">
                &nbsp;
            </div>
        {!! Form::close() !!}
	</div>
	<div class="overflow-x-auto">
		<div>
			<div class="w-full lg:w-5/6">
				<div class="bg-white shadow-md rounded my-6">
					<table class="min-w-max w-full table-auto">
						<thead>
						<tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
							<th class="py-3 px-6 text-left">Cod. Producto</th>
							<th class="py-3 px-6 text-left">Nombre Producto</th>
							<th class="py-3 px-6 text-left">Categoría</th>
							<th class="py-3 px-6 text-left">Sucursal</th>
							<th class="py-3 px-6 text-center">Descripción</th>
							<th class="py-3 px-6 text-center">Cantidad</th>
							<th class="py-3 px-6 text-right">Precio Venta</th>
							<th class="py-3 px-6 text-center">Edición</th>
						</tr>
						</thead>
						<tbody class="text-gray-600 text-sm font-light">
                        @foreach ($products as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$item['product_code']}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{$item['product_name']}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    @switch($item['category_id'])
                                        @case(1)
                                            <span>Cosméticos</span>
                                            @break
                                        @case(2)
                                            <span>Higiene</span>
                                            @break
                                        @case(3)
                                            <span>Salud</span>
                                            @break
                                        @default

                                    @endswitch

                                </td>
                                <td class="py-3 px-6 text-left">
                                 @switch($item->branches[0]['branch_id'])
                                    @case(1)
                                    <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">STGO-1</span>
                                        @break
                                    @case(2)
                                    <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">STGO-2</span>
                                        @break
                                    @case(3)
                                    <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">STGO-3</span>
                                        @break
                                    @default

                                 @endswitch

                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">{{$item['description']}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">{{$item['product_stock']}}</span>
                                </td>
                                <td class="py-3 px-6 text-right">
                                    <span class="font-medium">$ {{$item['product_price']}}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('products.show',[$item['product_id']])}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{route('products.edit',$item['product_id'])}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            {!! Form::open(['route' => ['products.destroy',$item['product_id']], 'method'=>'delete']) !!}
                                                {{Form::submit('X',['class'=>'text-sm font-medium bg-white-100'])}}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
						 </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
