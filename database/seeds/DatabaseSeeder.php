<?php

use Illuminate\Database\Seeder;
use App\payment;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PaymentSeeder::class);
         factory(payment::class, 100)->create();
    }
}
