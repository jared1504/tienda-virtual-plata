@php
$items = [
['route'=> 'category.index', 'text' => 'Categorías'],
['route'=> 'category.create', 'text' => 'Nueva Categoría'],
];
@endphp
<x-dashboard :items="$items">
    <h1 class='font-black text-4xl text-blue-900'>Agregar Categoría</h1>
    <p class="mt-3 text-lg">Llena los siguientes campos para agregar una Categoría</p>

    <form class=' my-5 p-5 w-3/4 mx-auto  rounded-lg bg-white drop-shadow-2xl' 
    action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="text-2xl text-center font-bold mb-5">Llena los campos para agregar una Categoría</p>
        <div class="my-4">
            <label class='text-gray-800 text-xl mt-5' for="name">Nombre</label>
            <input class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" value="{{old('name')}}" type="text" name="name"
                id="name" placeholder="Nombre de la Categoría">
            @error('name') <div class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">{{$message}}</div> @enderror
        </div>
        <div class="my-4">
            <label class='text-gray-800 text-xl mt-5' for="description">Descripcion</label>
            <textarea class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" 
                name="description" id="description">{{old('description')}}</textarea>
            @error('description') <div class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">{{$message}}</div> @enderror
        </div>

        <div class="my-3">
            <label class='text-gray-800 text-xl mt-5' for="image">Imagen</label>
            <input class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" value="{{old('image')}}" type="file" name="image"
                id="image">
            @error('image') <div class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">{{$message}}</div> @enderror
        </div>


        <div class="flex flex-row-reverse">
            <input type="submit" value="Agregar Categoría"
                class="mt-10 w-1/2 bg-blue-800 hover:bg-blue-600 cursor-pointer p-3 text-white uppercase font-bold text-lg" />
        </div>


    </form>
</x-dashboard>