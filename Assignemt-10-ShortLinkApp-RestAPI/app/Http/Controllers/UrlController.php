<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\CommonUrl;
use App\Models\Url;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    public function create_url(UrlRequest $request)
    {
        $full_url = $request->full_url;

        // Check if URL already exists
        $existingUrl = $this->getExistingUrl($full_url);

        if ($existingUrl) {
            return $this->handleExistingUrl($existingUrl);
        }

        // Create a new short URL and associate it with the user
        return $this->createNewUrl($full_url);
    }

    // Helper method to retrieve existing URL
    private function getExistingUrl($full_url)
    {
        return Url::where("full_url", $full_url)->first();
    }

    // Handle existing URL, checking for user association
    private function handleExistingUrl($existingUrl)
    {
        $userId = Auth::id();
        $isAlreadyAssociated = CommonUrl::where([
            "user_id" => $userId,
            "url_id" => $existingUrl->id
        ])->exists();

        if ($isAlreadyAssociated) {
            return $this->jsonResponse("This URL has already been shortened!", $existingUrl->short_url);
        }

        // Associate URL with new user
        CommonUrl::create([
            "user_id" => $userId,
            "url_id" => $existingUrl->id
        ]);

        return $this->jsonResponse("This URL has been shortened for you!", $existingUrl->short_url);
    }

    // Create a new short URL and associate it with the user
    private function createNewUrl($full_url)
    {
        $shortUrlCode = substr(md5($full_url), 0, 6);
        $newUrl = Url::create([
            "full_url" => $full_url,
            "short_url" => $shortUrlCode
        ]);

        CommonUrl::create([
            "user_id" => Auth::id(),
            "url_id" => $newUrl->id
        ]);

        return $this->jsonResponse("URL shortened successfully!", $newUrl->short_url);
    }

    // Helper method to create JSON response
    private function jsonResponse($message, $shortUrl)
    {
        return response()->json([
            "message" => $message,
            "short_url" => env('APP_URL') . '/' . $shortUrl
        ]);
    }


    public function all_urls(Request $request)
    {
        return $request->user()->urls->map(function ($url) {
            return [
                'id' => $url->id,
                'short_url' => env('APP_URL') . '/' . $url->short_url,
                'main_url' => $url->full_url
            ];
        });
    }

    public function all_urls_with_visit_count(Request $request)
        {
        return $request->user()->urls->map(function ($url) {
            return [
                'id' => $url->id,
                'short_url' => env('APP_URL') . '/' . $url->short_url,
                'main_url' => $url->full_url,
                'visit_count' => $url->visit_count
            ];
        });
    }
}
