<?php

namespace Tests\Feature;
use App\payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Jobs\DeletePayment;
use Illuminate\Support\Facades\Queue;
use App\Events\MyEvent;
use Illuminate\Support\Facades\Event;
class PaymentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    public function testGet()
    {
        $response = $this->get(route('payment.get'));

        $response->assertStatus(200);
    }
    public function testPost()
    {
        $data = [
            'payment_name' => $this->faker->unique()->text(5),
        ];
        $this->withoutMiddleware();
       
            $this->post(route('payment.post'), $data)
                ->assertStatus(200);
          
           }
           public function testPostFail()
    {
        $data = [
            'payment_name' => null,
        ];
        $this->withoutMiddleware();
       
            $this->post(route('payment.post'), $data)
                ->assertStatus(302);
          
           }
           public function testDelete()
           {   $payment_id = payment::inRandomOrder()->first()->id;
               $data = [
                   'ids' => $payment_id,
               ];
               $this->withoutMiddleware();
              
                   $this->post(route('payment.delete'), $data)
                       ->assertStatus(200);
                 
                  }
                  public function testNotification()
                  {      Event::fake();
                      
                  
                   
                     $message="telah berhasil menghapus";
                      Event::assertNotDispatched(MyEvent::class, $message);
                 
                        
                         }
                        
                  public function testQueue()
           {   Queue::fake();
               
               $this->withoutMiddleware();
               $ids = payment::inRandomOrder()->first()->id;
               DeletePayment::dispatch($ids);
               Queue::assertPushed(DeletePayment::class);
          
                 
                  }
                 
}
