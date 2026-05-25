<?php

namespace App\Services;

use App\Models\Business;

class SiteGeneratorService
{
    public function generate(Business $business)
    {
        // Example: Build static HTML files
        $path = public_path('sites/'.$business->id);

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $html = view('site.template', ['business' => $business])->render();

        file_put_contents($path.'/index.html', $html);
    }
}
