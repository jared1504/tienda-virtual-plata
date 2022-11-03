@php
$items = [
['route'=> 'sale.index', 'text' => 'Ventas Pendientes'],
['route'=> 'sale.filter', 'text' => 'Historial de Ventas'],
];
@endphp
<x-dashboard :items="$items">
    <h1 class='font-black text-4xl text-blue-900'>Administrar Ventas</h1>
    <p class="mt-3 text-lg">Filtra y administra las ventas</p>
    <form class="mt-5 flex gap-5" method='POST' action="{{route('sale.filterpost')}}">
        @csrf
        <select class="w-2/3 bg-gray-100 text-lg focus:outline-none text-center" name="filter" id="filter">
            <option>Seleccione un filtro</option>
            <option value="0">Todas</option>
            <option value="1">Pendientes</option>
            <option value="2">En Preparación</option>
            <option value="3">Listas</option>
            <option value="4">Enviadas</option>
            <option value="5">Completadas</option>
        </select>

        <input type="submit" value="Filtrar Ventas"
            class="w-1/3 bg-blue-800 hover:bg-blue-600 cursor-pointer p-3 text-white uppercase font-bold text-lg"/>
    </form>
    @if(session("message"))
    <div
        class="mt-5 bg-green-100 py-5 w-full text-center font-bold uppercase text-2xl text-green-700 border-solid border-green-700 border-2">
        {{session('message')}}
    </div>
    @endif
     <table class="w-full mt-5 ">
        <tr class="bg-blue-700 text-white font-bold text-center  text-xl">
            <td class="py-3">Código</td>
            <td>Fecha</td>
            <td>Estado</td>
            <td>Acciones</td>
        </tr>

        @foreach ($sales as $sale)
        <tr class="hover:bg-blue-100 border-b border-slate-700 text-center py-3 text-xl">
            <td class=" py-3 ">{{$sale->id}}</td>
            <td>{{$sale->date}}</td>
            @php
            switch ($sale->status) {
            case 1:
            $sale->status = "Pendiente";
            break;
            case 2:
            $sale->status = "En preparación";
            break;
            case 3:
            $sale->status = "Listo";
            break;
            case 4:
            $sale->status = "Enviado";
            break;
            case 5:
            $sale->status = "Completada";
            break;
            }
            @endphp
            <td>{{$sale->status}}</td>
            <td class=" flex justify-center  gap-5">
                <a class="my-2 py-1 w-1/4 bg-blue-700 hover:bg-blue-900 text-white font-bold"
                    href="{{route('sale.show',$sale)}}">Ver</a>
                <a class="my-2 py-1 w-1/4 bg-orange-700 hover:bg-orange-900 text-white font-bold"
                    href="{{route('sale.edit',$sale)}}">Editar</a>
            </td>
        </tr>
        @endforeach
    </table> {{----}}
</x-dashboard>