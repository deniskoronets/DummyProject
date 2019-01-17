<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            return view('ip-report', ['data' => $data,
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
        $website = Website::query( ) -> findOrFail ( $id );

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

        $data_3 = Visit::query()
            -> toBase( )
            -> select( [
                'browser',
                DB::raw('COUNT(id) as visits'),
            ] )
        -> groupBy('browser')
        -> where('website_id', $id)
        -> get();

        if ($request->ajax() && 0) {
            return response()->json([
                'website' => $website,
                'data_1' => $data_1,
            ]);
        }

        return view('website-report', [
            'website'=>$website,
            'data_1' => $data_1,
            'data_2' => $data_2,
            'data_3'=>$data_3,
            'data_4' => $data_4 ?? null,
        ]);
    }

    /**
     * Super and very important report.
     * Vasily: maybe remove this?
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function someDummyReport(Request $request)
    {
        $data = Visit::query()->select([
            ''
        ])->where('website_id', 1);

        $data->each((function($row) {
            if ($row->os == 'Windows XP') {
                someRemovedService()->writeOsLog('Windows XP');
            } else {
                // Do nothing
            }
        }));

        return view('some-dummy-report', [
           'data' => $data,
        ]);
    }
}
