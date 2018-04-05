<?php

namespace App\Http\Controllers;

use App\Mail\StockGreatherMaximum;
use App\Product;
use App\StockInput;
use Illuminate\Http\Request;

class StockInputController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $movements = StockInput::all();
        return view('stock-input.index', compact('movements'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $products = Product::all()->pluck('name', 'id');
        return view('stock-input.create', compact('products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = array_except($request->all(), '_token');
        $input = StockInput::forceCreate($data);
        $product = $input->product;

        if ($product->stock >= $product->stock_maximum) {
            \Mail::to('stock@stock.com')->send(new StockGreatherMaximum($product));
        }
        return redirect()->route('admin.stock-input.index');
    }
}
