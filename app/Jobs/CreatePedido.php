<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use App\Pedidos;

class CreatePedido implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
    
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        sleep(2);
        echo "Jobs Dispatched <br>";
        Log::info("Jobs Dispatched");

    }
}
