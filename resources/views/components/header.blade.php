<header class="py-10 bg-black text-white flex justify-between px-10">
    
        <a href="/" class=" flex"><img class="h-32" src="./img/logo_white.png" alt="Imagen Logo">
        <div class="ml-5 my-auto">
            <h1 class="font-bold uppercase text-5xl">Ángel de Plata</h1>
            <p class="italic text-2xl text-center">Las Joyas Que Mereces</p>
        </div>
    </a>



    <nav class="flex text-xl">
        @foreach ($items as $item)

        <a class="mx-5 my-auto text-2xl  hover:border-b-2" href="{{ $item['route'] }}">
            <p>{{ $item['text'] }}</p>
        </a>

        @endforeach

    </nav>
</header>