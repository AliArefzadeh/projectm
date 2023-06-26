<?php

namespace App\Jobs;

use App\Models\Humidity;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessHumidity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $humidity;
    public function __construct(array $humidity)
    {
        $this->humidity = $humidity;
        /*dd($this->humidity['humidity']);*/
    }

    /**
     * Execute the job.
     */
    public function handle(Request $request): void
    {
        /*dd($this->humidity);*/
        Humidity::create([
            'humidity' => $this->humidity['humidity'],
        ]);
    }
}
