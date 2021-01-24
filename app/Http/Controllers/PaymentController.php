<?php

namespace App\Http\Controllers;
use DB;
use App\payment;
use App\Events\MyEvent;
use App\Jobs\DeletePayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $payment= payment::paginate(30);
        return view('payment',compact('payment'));
      
    }
    public function postPage()
    {
     
       
        return view('postPage');
      
    }
    public function get()
    {
        $payment= payment::paginate(100);
        return response()->json($payment);
    }

    public function post(Request $request)
    {    $validated = $request->validate([
        'payment_name' => 'required',
     
    ]);

        DB::beginTransaction();
		try{
        $payment= payment::updateOrCreate([
            'payment_name' => $request->input('payment_name')
        ]);
        DB::commit();
        return response()->json([$payment],200); 
		} catch (\Throwable $th) {
			DB::rollback();
			throw $th;
		}
       
    }
    public function delete(Request $request)
    {
             $ids =  explode(",",$request->ids);

      
DeletePayment::dispatch($ids);
            return response()->json(['success'=>"Products Deleted successfully."]);
        
    }


}
