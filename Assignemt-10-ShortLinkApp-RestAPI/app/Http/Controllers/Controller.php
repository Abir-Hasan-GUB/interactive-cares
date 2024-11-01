<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index($short_url)
    {
        $full_url = Url::where('short_url', $short_url)->first();

        if (!$full_url) {
            return response()->json(["message" => "URL not found."], 404);
        }

        $full_url->visit_count += 1;
        $full_url->save();

        return redirect()->to($full_url->full_url);
    }

}
