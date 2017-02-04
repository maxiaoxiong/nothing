<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class PortfolioController extends Controller
{
    public function index()
    {
        return view(
            'pages.portfolio'
        );
    }
}
