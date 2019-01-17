<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsitesController extends Controller
{
    public function index()
    {
        return view('websites.index', [
            'websites' => Website::all(),
        ]);
    }

    public function remove($id, Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }
}
