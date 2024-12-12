<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function apparels(Request $request): Response
    {
        return response()->json(['message' => 'CSV file uploaded to Minio successfully'], 200);
    }
}
