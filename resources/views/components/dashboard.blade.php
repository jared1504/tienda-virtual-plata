<x-layout>
    <div class="flex min-h-screen">
        <div class="w-96 p-5 bg-blue-800 ">
            <div class="flex gap-3 ">
                <img src="../../img/logo_white.png" alt="Imagen Logo" class="w-14">
                <div>
                    <h1 class="text-white font-bold text-2xl my-auto">Ángel De Plata</h1>
                    <p class="italic text-white">Las Joyas que mereces</p>
                </div>
            </div>
            <div class="mt-5 ">
                <a href="{{route('sale.index')}}"
                    class="hover:bg-white hover:text-blue-800 text-white text-xl font-bold py-2 block rounded-lg text-center mb-2">
                    Ventas
                </a>
                <a href="{{route('product.index')}}"
                    class="hover:bg-white hover:text-blue-800 text-white text-xl font-bold py-2 block rounded-lg text-center mb-2">
                    Productos
                </a>
                <a href="{{route('category.index')}}"
                    class="hover:bg-white hover:text-blue-800 text-white text-xl font-bold py-2 block rounded-lg text-center mb-2">
                    Categorias
                </a>
                <a href="{{route('user.index')}}"
                    class="hover:bg-white hover:text-blue-800 text-white text-xl font-bold py-2 block rounded-lg text-center mb-2">
                    Usuarios
                </a>
                <a href="/profile"
                    class="hover:bg-white hover:text-blue-800 text-white text-xl font-bold py-2 block rounded-lg text-center mb-2">
                    Mi Perfil
                </a>
                <a href="/logout"
                    class="hover:bg-red-500  text-white text-xl font-bold py-2 block rounded-lg text-center mt-10">
                    Cerrar Sesión
                </a>

            </div>
        </div>
        <div class="w-full">
            <div class="bg-blue-800 py-5 flex justify-center gap-x-10">
                @foreach ($items as $item)


                <a  href='{{route($item['route'])}}'
                    class="hover:bg-white hover:text-blue-800 text-white text-xl font-bold py-2 px-5 w-72 rounded-lg text-center ">
                    {{ $item['text'] }}
                </a>
                @endforeach

                {{-- < <a href="#"
                    class="hover:bg-white hover:text-blue-800 text-white text-xl font-bold py-2 px-5 w-72 rounded-lg text-center ">
                    Pedidos Completados
                    </a>
                    <a href="#"
                        class="hover:bg-white hover:text-blue-800 text-white text-xl font-bold py-2 px-5 w-72 rounded-lg text-center ">
                        Filtrar Pedidos
                    </a> --}}
            </div>
            <div class="m-10 ">{{$slot}}</div>
        </div>
    </div>
</x-layout>
