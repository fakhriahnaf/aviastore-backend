<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TansactionDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    
    public function index()
    {
        //untuk chart 
        $income = Transaction::where('transaction_status', 'SUCCESS') ->sum('transaction_total');
        $sales = Transaction::count();
        $items = Transaction::with('details')-> orderBy('id','DESC')-> take(5)->get();

        $pie = [
            'pending' => Transaction::where('transaction_status', 'PENDING') -> count(),
            'failed' => Transaction::where('transaction_status', 'FAILED') -> count(),
            'success' => Transaction::where('transaction_status', 'SUCCESS')-> count(),
        ];



        return view('pages.dashboard')->with([
            'income'=> $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie
        ]);

    }


}
