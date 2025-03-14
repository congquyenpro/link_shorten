<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShortenedUrl;
use Illuminate\Http\Request;
use App\Services\ShortenService;


class DisplayController extends Controller
{

    public function displayHome()
    {
        return view('customer.home');
    }
}