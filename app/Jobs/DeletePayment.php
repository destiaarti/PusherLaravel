<?php

namespace App\Jobs;
use App\payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\MyEvent;
class DeletePayment implements ShouldQueue
{ protected $ids;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ids)
    {
        $this->ids = $ids;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        
        foreach($this->ids as $key => $id){
       
            $key=$key+1;
        
        payment::where('id',$id)->delete();
       
      
       // $payment->notify(new DeletePayment($payment));
       event(new MyEvent('Telah berhasil menghapus '.$key.' data'));
        }
        //
    }
}
