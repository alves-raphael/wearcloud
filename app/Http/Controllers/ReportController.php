<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateApparelsReport;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function apparels(Request $request): Response
    {
        GenerateApparelsReport::dispatch();
        return response()->json(['message' => 'CSV file uploaded to Minio successfully'], 200);
    }
}
