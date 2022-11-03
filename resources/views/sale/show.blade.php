@php
$items = [
['route'=> 'sale.index', 'text' => 'Ventas Pendientes'],
['route'=> 'sale.create', 'text' => 'Historial de Ventas'],
];
/* asort($sale->saledetails); */
/* $sale->saledetails=$sale->saledetails->orderBy('status'); */
@endphp

<x-dashboard :items="$items">
    <h1 class='font-black text-4xl text-blue-900'>Ver Venta</h1>
    <p class="mt-3 text-lg">Ve los datos de una Venta</p>
    <div class="w-full">
        <p class="text-3xl font-bold"><span class="text-blue-700">Código:</span> {{$sale->id}}</p>
        <p class="text-2xl font-bold"><span class="text-blue-700">Guía Paquetería:</span> {{$sale->guide}}</p>
        <p class="mt-5 text-3xl font-bold text-center"><span class="text-blue-700">Detalle de la compra</span></p>

        <table class="w-full mt-5 ">
            <tr class="bg-blue-700 text-white font-bold text-center  text-xl">
                <td class="py-3">Código Producto</td>
                <td>Nombre</td>
                <td>Cantidad</td>
                <td>Precio</td>
                <td>Subtotal</td>
                <td>Estado</td>
                <td>Acciones</td>
            </tr>

            @foreach ($sale->saledetails as $saledetail)
            <tr class="hover:bg-blue-100 border-b border-slate-700 text-center py-3 text-xl">
                <td class=" py-3 ">{{$saledetail->product->id}}</td>
                <td class=" py-3 ">{{$saledetail->product->name}}</td>
                <td class=" py-3 ">{{$saledetail->amount}}</td>
                <td class=" py-3 ">${{$saledetail->product->price}}</td>
                <td>${{$saledetail->amount * $saledetail->product->price}}</td>
                @php
                switch ($saledetail->status) {
                case 1:
                $saledetail->status='Pendiente';
                break;
                case 2:
                $saledetail->status='En preparación';
                break;
                case 3:
                $saledetail->status='Listo';
                break;
                }
                @endphp
                <td class=" py-3 ">{{$saledetail->status}}</td>
                <td class=" {{-- flex justify-center  gap-5 --}}">
                    <a class="my-2 py-1 px-2 bg-green-700 hover:bg-green-900 text-white "
                        href="{{route('sale.show',$sale)}}">Cambiar Estado</a>
                    {{-- <a class="my-2 py-1 w-1/4 bg-orange-700 hover:bg-orange-900 text-white font-bold"
                        href="{{route('sale.edit',$sale)}}">Editar</a> --}}
                </td>
            </tr>
            @endforeach
        </table>
        </p>
        {{-- <a href="{{route('sale.edit', $sale)}}">
            <p class=" mt-10 font-bold bg-blue-700 hover:bg-blue-900 text-white text-center text-2xl py-2 px-5">
                Actualizar</p>
        </a> --}}
</x-dashboard>