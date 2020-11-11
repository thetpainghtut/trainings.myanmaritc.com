<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Township;
use App\Inquire;
use App\Location;
use Auth;
use Carbon\Carbon;
use App\Installment;

class InstallmentController extends Controller
{
    //firstpayment
    public function firstpayment(Request $request){
        $request->validate([
            'installment_date' => 'required',
            'installment_amount' => 'required'

        ]);
        $id = request('id');
        $inquire = Inquire::find($id);

        $oldinstallment = Installment::where('inquire_id',$id)->latest('symbol')->first();

        if ($oldinstallment != null) {

        	$oldsymbol = (int)$oldinstallment->symbol;


        	$installment = new Installment();
        	$installment->amount = request('installment_amount');
	        $installment->type = request('payment');
	        $installment->symbol = ++$oldsymbol;
	        $installment->paiddate = request('installment_date');
	        $installment->inquire_id = $id;
	        $installment->user_id = Auth::id();

	        $installment->save();
        }
        else{
        	$installment = new Installment();
        	$installment->amount = request('installment_amount');
	        $installment->type = request('payment');
	        $installment->symbol = 1;
	        $installment->paiddate = request('installment_date');
	        $installment->inquire_id = $id;
	        $installment->user_id = Auth::id();

	        $installment->save();
        }
        
        
        return response()->json($inquire);

    }

    public function paymenthistory($inquireid){
        $oldinstallment = Installment::where('inquire_id',$inquireid)->get();

        return response()->json($oldinstallment);
    	
    }
}
