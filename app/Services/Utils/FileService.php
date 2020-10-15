<?php

namespace App\Services\Utils;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function convertPdfToText(UploadedFile $file): String
    {
        $file = file_get_contents($file);
        return base64_encode($file);
    }

    public function convertTextToPdf(String $base64,String $name)
    {
        $pdf_decoded = \base64_decode($base64);
        $time = new Carbon();
        $name = $name .'_'. $time->locale(\config('app.locale'))->isoFormat('YMDhmm') . '.pdf';
        $isUpload = Storage::disk('public')->put($name, $pdf_decoded);
        return $isUpload ? Storage::url($name) : false;
    }
}
