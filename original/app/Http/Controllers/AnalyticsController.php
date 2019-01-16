<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function ipReport(Request $request)
    {
        $data = Visit::query()->select([
            'ip',
            'visits' => 'COUNT(*)',
        ]);

        return view('ip-report', [
            'data' => $data,
        ]);
    }

    public function countryReport(Request $request)
    {
        $data = Visit::query()->select([
            'country',
            'visits' => 'COUNT(*)',
        ]);

        return view('ip-report', [
            'data' => $data,
        ]);
    }

    public function websiteReport(Request $request)
    {
        $data = Visit::query()->select([
            'website_id',
            'visits' => 'COUNT(*)',
        ]);

        return view('website-report', [
            'data' => $data,
        ]);
    }

    public function someDummyReport(Request $request)
    {
        $data = Visit::query()->select([
            ''
        ])
    }
}
