<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShortenedUrl;
use Illuminate\Http\Request;
use App\Services\ShortenService;
use App\Http\Requests\StoreShortenedUrl;


class UrlShortenerController extends Controller
{
    private $shortenService;

    public function __construct(ShortenService $shortenService)
    {
        $this->shortenService = $shortenService;
    }


    public function store(StoreShortenedUrl $request)
    {
        $shortenedUrl = $this->shortenService->shorten($request->url);

        return response()->json([
            'shortened_url' => $shortenedUrl,
            'status' => 'success'
        ]);

        
    }

    public function redirect($code)
    {
        $originalUrl = $this->shortenService->getUrlByCode($code);

        if ($originalUrl) {
            return redirect()->to($originalUrl);
        }

        return abort(404, 'Không tìm thấy URL gốc.');
    }



}