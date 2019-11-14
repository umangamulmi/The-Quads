<?php


namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Transaction;
use Session ;
use Illuminate\Http\Request;
use App\Models\Product;

class CashRegisterController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getData($request);
        $data["products"] = Product::all();
        return view('cashRegister.dashboard')->with($data);;
    }

    public function store(Request $request){
        $data = $request->all();
        $data['actor_id'] = $request->session()->get('user_id');
        $result = Transaction::create($data);
        $product_ids = explode(',', $request->input('product_ids'));

        $sale_data['transaction_id'] = $result->id;
        foreach ($product_ids as $product_id){
            $sale_data['product_id'] = $product_id;
            Sale::create($sale_data);
        }

        return response()->json(['success'=>'ok', 'test'=> $sale_data['product_id']]);
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