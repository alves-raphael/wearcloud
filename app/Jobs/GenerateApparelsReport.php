<?php

namespace App\Jobs;

use App\Models\Apparel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Storage;

class GenerateApparelsReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $apparels = Apparel::all()->toArray();
        $file = fopen('php://temp', 'r+');
        fputcsv($file, ['ID', 'Name', 'Description', 'Company ID', 'Created At', 'Updated At']);
        foreach ($apparels as $apparel) {
            fputcsv($file, $apparel);
        }
        fputcsv($file, ['Total: ', count($apparels)]);
        fputcsv($file, ['Created at: ', now()->toDateTimeString()]);
        rewind($file);
        $filename = 'exports/apparels_' . now()->format('Y_m_d_H_i_s') . '.csv';
        try{
            Storage::disk('s3')->put($filename, $file);
        }catch (\Exception $e) {
            logger($e->getMessage());
        }
        fclose($file);
    }
}
