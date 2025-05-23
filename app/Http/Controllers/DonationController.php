<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    //
    public function insertDonations(Request $req){
        $donate = new donation();
        $donate->jumlah = $req->amount;
        $donate->method = $req->payment_method;
        $donate->user_id = auth()->id();
        $donate->save();

        return view('customer.receiptdetail', compact('donate'));
    }
}
