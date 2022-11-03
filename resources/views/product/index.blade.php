@php
$items = [
['route'=> 'product.index', 'text' => 'Productos'],
['route'=> 'product.create', 'text' => 'Nuevo Producto'],
];
@endphp
<x-dashboard :items="$items">
    <h1 class='font-black text-4xl text-blue-900'>Administrar Productos</h1>
    <p class="mt-3 text-lg">Ve y administra los Productos</p>
    @if(session("message"))
    <div class="mt-5 bg-green-100 py-5 w-full text-center font-bold uppercase text-2xl text-green-700 border-solid border-green-700 border-2">
        {{session('message')}}
    </div>
    @endif
     <table class="w-full mt-5 ">
        <tr class="bg-blue-700 text-white font-bold text-center  text-xl">
            <td class="py-3">Código</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Acciones</td>

        </tr>
        @foreach ($products as $product)
        <tr class="hover:bg-blue-100 border-b border-slate-700 text-center py-3 text-xl">
            <td class=" py-3 ">{{$product->id}}</td>
            <td>{{$product->name}}</td>
             <td>$ {{$product->price}}</td>
            <td class=" flex justify-center  gap-5">
                <a class="my-2 py-1 w-1/4 bg-blue-700 hover:bg-blue-900 text-white font-bold" href="{{route('product.show',$product)}}">Ver</a>
                <a class="my-2 py-1 w-1/4 bg-orange-700 hover:bg-orange-900 text-white font-bold" href="{{route('product.edit',$product)}}">Editar</a>
            </td>
        </tr>
        @endforeach
    </table> 
</x-dashboard>