<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleStoreRequest;
use App\Http\Requests\SaleUpdateRequest;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //1->hecho 2-> en preparacion 3-> listo 4->enviado 5->recibido
        $sales = Sale::where('status', '!=', 5)->orderBy('status')->get();

        
        return view('sale.index', compact('sales'));
    }

    public function filter(Request $request)
    {
        $sales = Sale::where('status', '!=', 0)->orderBy('status')->get();
        return view('sale.filter', compact('sales'));
    }
    public function filterpost(Request $request)
    {
        if ($request->filter == 0) {
            $sales = Sale::where('status', '!=', 0)->orderBy('status')->get();
        }else{
            $sales = Sale::where('status', $request->filter)->orderBy('status')->get();
        }
        
        return view('sale.filter', compact('sales'));
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('sale.create');
    }

    /**
     * @param \App\Http\Requests\SaleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleStoreRequest $request)
    {
        $sale = Sale::create($request->validated());

        $request->session()->flash('sale.id', $sale->id);

        return redirect()->route('sale.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sale $sale)
    {
        $sale->saledetails = SaleDetail::where('sale_id', $sale->id)->orderBy('status')->get();
        return view('sale.show', compact('sale'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sale $sale)
    {
        return view('sale.edit', compact('sale'));
    }

    /**
     * @param \App\Http\Requests\SaleUpdateRequest $request
     * @param \App\Models\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function update(SaleUpdateRequest $request, Sale $sale)
    {
        $sale->update($request->validated());

        $request->session()->flash('sale.id', $sale->id);

        return redirect()->route('sale.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sale.index');
    }
}
