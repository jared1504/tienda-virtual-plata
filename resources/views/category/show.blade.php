@php
$items = [
['route'=> 'category.index', 'text' => 'Categorías'],
['route'=> 'category.create', 'text' => 'Nueva Categoría'],
];
@endphp
<x-dashboard :items="$items">
    <h1 class='font-black text-4xl text-blue-900'>Ver Categoría</h1>
    <p class="mt-3 text-lg">Ve los datos de una Categoría</p>
    <div class="mt-5 flex gap-5">
        <img class="w-1/3" src="../../img/categories/{{$category->image}}" alt="Imagen Categoría {{$category->name}}">
        <div class="w-full">
            <p class="text-3xl font-bold"><span class="text-blue-700">Nombre:</span> {{$category->name}}</p>
            <p class="mt-5 text-2xl "><span class="font-bold text-blue-700">Descripción:</span></p>
            <p class="text-2xl ">{{$category->description}}</p>
            <a  href="{{route('category.edit', $category)}}"><p class=" mt-10 font-bold bg-blue-700 hover:bg-blue-900 text-white text-center text-2xl py-2 px-5">Actualizar</p></a>
        </div>
    </div>
</x-dashboard>