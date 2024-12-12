<?php

namespace App\Jobs;

use App\Models\Apparel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateApparelsReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        sleep(5);
        $file = fopen(storage_path('app/apparels-report.txt'), 'w');
        $now = now()->toDateTimeString();
        fwrite($file, "Apparels Report\n");
        fwrite($file, $now);
        fclose($file);
    }
}
