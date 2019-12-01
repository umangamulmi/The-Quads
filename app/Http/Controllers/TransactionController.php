<?php


namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getData($request);
        $data['transactions'] = Transaction::with('products')->with('actor')->get();
        return view('admin.showSale')->with($data);
    }

    private function getData(Request $request)
    {
        $Today = date('y:m:d', time());
        $new = date('l, F d, Y', strtotime($Today));

        $data["username"] = $request->session()->get('user_name');
        $data["today"] = $new;

        return $data;
    }

}

/**
     * The application's route middleware.
     */
