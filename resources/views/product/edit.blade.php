@php
$items = [
['route'=> 'product.index', 'text' => 'Productos'],
['route'=> 'product.create', 'text' => 'Nuevo Producto'],
];
@endphp
<x-dashboard :items="$items">
    <h1 class='font-black text-4xl text-blue-900'>Actualizar Producto</h1>
    <p class="mt-3 text-lg">Llena los siguientes campos para Actualizar un Producto</p>

    <form class=' my-5 p-5 w-4/5 mx-auto  rounded-lg bg-white drop-shadow-2xl grid grid-cols-3 gap-5'
        action="{{route('product.update',$product)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p class="text-2xl text-center font-bold mb-5 col-span-3">Llena los campos para Actualizar un Producto</p>
        <div class="my-4 col-span-2">
            <label class='text-gray-800 text-xl mt-5' for="name">Nombre</label>
            <input class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" value="{{$product->name}}"
                type="text" name="name" id="name" placeholder="Nombre del Producto">
            @error('name') <div
                class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">
                {{$message}}</div> @enderror
        </div>

        <div class="my-4 col-span-1">
            <label class='text-gray-800 text-xl mt-5' for="price">Precio</label>
            <input class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" value="{{$product->price}}"
                type="number" name="price" id="price" placeholder="Precio del Producto">
            @error('price') <div
                class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">
                {{$message}}</div> @enderror
        </div>

        <div class="my-4">
            <label class='text-gray-800 text-xl mt-5' for="height">Alto</label>
            <input class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" value="{{$product->height}}"
                type="number" name="height" id="height" placeholder="Alto del Producto en centímetros">
            @error('height') <div
                class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">
                {{$message}}</div> @enderror
        </div>

        <div class="my-4">
            <label class='text-gray-800 text-xl mt-5' for="width">Ancho</label>
            <input class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" value="{{$product->width}}"
                type="number" name="width" id="width" placeholder="Ancho del Producto en centímetros">
            @error('width') <div
                class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">
                {{$message}}</div> @enderror
        </div>

        <div class="my-4">
            <label class='text-gray-800 text-xl mt-5' for="weight">Peso</label>
            <input class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" value="{{$product->weight}}"
                type="number" name="weight" id="weight" placeholder="Peso del Producto en gramos">
            @error('weight') <div
                class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">
                {{$message}}</div> @enderror
        </div>

        <div class="my-4 col-span-3">
            <label class='text-gray-800 text-xl mt-5' for="category_id">Categoría</label>
            <select class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" name="category_id">
                <option>Seleccione una categoría</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($product->category_id == $category->id) {{'selected'}}
                    @endif>{{$category->name}} </option>
                @endforeach
                {{-- --}}

            </select>
            @error('category_id') <div
                class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">
                {{$message}}</div> @enderror
        </div>

        <div class="my-4 col-span-3">
            <label class='text-gray-800 text-xl mt-5' for="description">Descripción</label>
            <textarea class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" name="description"
                id="description">{{$product->description}}</textarea>
            @error('description') <div
                class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">
                {{$message}}</div> @enderror
        </div>

        <div class="my-4 col-span-3">
            <label class='text-gray-800 text-xl mt-5' for="image">Imagen</label>
            <input class="mt-2 block w-full p-3 bg-gray-100 text-lg focus:outline-none" type="file" name="image"
                id="image">
            @error('image') <div
                class="mt-2 bg-red-100 border-solid border-2 border-red-700 text-red-700 py-1 text-center font-bold text-xl">
                {{$message}}</div> @enderror
        </div>


        <div class="col-span-3 flex flex-row-reverse">
            <input type="submit" value="Actualizar Producto"
                class="mt-10 w-1/2 bg-blue-800 hover:bg-blue-600 cursor-pointer p-3 text-white uppercase font-bold text-lg" />
        </div>


    </form>
</x-dashboard>