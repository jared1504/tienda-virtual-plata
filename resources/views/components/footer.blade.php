<footer class="py-10 bg-black text-white  ">
    <div class="flex justify-between mb-5 px-10">
        <a href=" /" class=" ">
            <img src="./img/logo_nombre_white.png" alt="Imagen Logo" class="w-24">
           
        </a>

        <nav class="flex text-xl">
            @foreach ($items as $item)
            <a class="mx-5 my-auto text-2xl  hover:border-b-2" href="{{ $item['route'] }}">
                <p>{{ $item['text'] }}</p>
            </a>
            @endforeach
        </nav>
    </div>
    <p class="text-center mb-5 text-2xl">Taxco de Alarcón, Guerrero, México</p>
    <p class="text-center text-2xl pt-5 border-t-2">Todos los Derechos Reservados - 2022</p>
</footer>