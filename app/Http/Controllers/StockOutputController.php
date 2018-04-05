<?php

namespace App\Http\Controllers;

use App\Product;
use App\StockOutput;
use Illuminate\Http\Request;

class StockOutputController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $movements = StockOutput::all();
        return view('stock-output.index', compact('movements'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $products = Product::all()->pluck('name', 'id');
        return view('stock-output.create', compact('products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = array_except($request->all(), '_token');
        StockOutput::forceCreate($data);
        return redirect()->route('admin.stock-output.index');
    }
}
