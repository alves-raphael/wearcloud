<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateApparelsReport;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function apparels(Request $request): Response
    {
        GenerateApparelsReport::dispatch();
        return redirect()->back()->with('message', __('reports.request_feedback'));
    }
}
