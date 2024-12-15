<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateApparelsReport;
use Illuminate\Contracts\View\View;
use Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function apparels(Request $request): Response
    {
        GenerateApparelsReport::dispatch();
        return redirect()->back()->with('message', __('reports.request_feedback'));
    }

    public function list(Request $request): View
    {
        $reports = Storage::disk('s3')->files('exports');
        return view('reports')->with('reports', $reports);
    }
}
