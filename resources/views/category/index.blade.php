@php
$items = [
['route'=> 'category.index', 'text' => 'Categorías'],
['route'=> 'category.create', 'text' => 'Nueva Categoría'],
];
@endphp
<x-dashboard :items="$items">
    <h1 class='font-black text-4xl text-blue-900'>Administrar Categorías</h1>
    <p class="mt-3 text-lg">Ve y administra las Categorías</p>
    @if(session("message"))
    <div class="mt-5 bg-green-100 py-5 w-full text-center font-bold uppercase text-2xl text-green-700 border-solid border-green-700 border-2">
        {{session('message')}}
    </div>
    @endif
    <table class="w-full mt-5 ">
        <tr class="bg-blue-700 text-white font-bold text-center  text-xl">
            <td class="py-3">Código</td>
            <td>Nombre</td>
            <td>Acciones</td>

        </tr>
        @foreach ($categories as $category)
        <tr class="hover:bg-blue-100 border-b border-slate-700 text-center py-3 text-xl">
            <td class=" py-3 ">{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td class=" flex justify-center  gap-5">
                <a class="my-2 py-1 w-1/4 bg-blue-700 hover:bg-blue-900 text-white font-bold" href="{{route('category.show',$category)}}">Ver</a>
                <a class="my-2 py-1 w-1/4 bg-orange-700 hover:bg-orange-900 text-white font-bold" href="{{route('category.edit',$category)}}">Editar</a>
            </td>
        </tr>
        @endforeach
    </table>
</x-dashboard>