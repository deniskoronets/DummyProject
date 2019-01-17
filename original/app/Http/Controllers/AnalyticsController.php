<?php

namespace App\Http\Controllers;

use App\Models\Eloquent\Visit;
use App\Models\Eloquent\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function ipReport(Request $request)
    {
        $data = Visit::query()->toBase()->select([
            'ip',
            'visits' => 'COUNT(*)',
        ])->get();

        return view('ip-report', [
            'data' => $data,
        ]);
    }

    public function countryReport(Request $request)
    {
        $data = Visit::query()->toBase()->select([
            'country',
            'visits' => 'COUNT(*)',
        ])->get();

        return view('ip-report', [
            'data' => $data,
        ]);
    }

    /**
     * Builds all websites summary report
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function websiteReport($id, Request $request)
    {
        $website = Website::query()->findOrFail($id);

        $data_1 = Visit::query()->toBase()->select([
            'browser',
            DB::raw('COUNT(browser) as visits'),
        ])
            ->groupBy('browser')
            ->where('website_id', $id)
            ->where('visited_at', '>', Carbon::now()->subDays(7))
            ->get();


        $data_2 = Visit::query()->toBase()->select([
            'os',
            DB::raw('COUNT(id) as visits'),
        ])
            ->groupBy('os')
            ->where('website_id', $id)
            ->where('visited_at', '>', date('Y-m-d', strtotime('-7 days')))
            ->get();



        return view('website-report', [
            'website' => $website,
            'data_1' => $data_1,
            'data_2' => $data_2,

        ]);
    }
}
