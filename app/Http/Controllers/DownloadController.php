<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    /**
     * Serve the clinic-inova-medika-fresh.zip file for download with proper headers.
     */
    public function downloadZip()
    {
        $filePath = base_path('clinic-inova-medika-fresh.zip');

        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->download($filePath, 'clinic-inova-medika-fresh.zip', [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'attachment; filename="clinic-inova-medika-fresh.zip"',
            'Content-Length' => filesize($filePath),
            'Accept-Ranges' => 'bytes',
        ]);
    }
}
