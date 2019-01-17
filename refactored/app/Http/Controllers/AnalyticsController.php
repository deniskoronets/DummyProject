<?php

namespace App\Http\Controllers;

use App\Models\Analytic;
use App\Models\Eloquent\Website;

class AnalyticsController extends Controller
{
    /**
     * @var Analytic
     */
    private $analyticModel;

    public function __construct(Analytic $analytic)
    {
        $this->analyticModel = $analytic;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ipReport()
    {
        return view('ip-report', [
            'data' => $this->analyticModel->ipReport(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function countryReport()
    {
        return view('ip-report', [
            'data' => $this->analyticModel->countryReport(),
        ]);
    }

    /**
     * Builds all websites summary report
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function websiteReport($id)
    {
        $website = Website::query()->findOrFail($id);

        return view('website-report', [
            'website' => $website,
            'report' => $this->analyticModel->websiteMetricsReport($id),
        ]);
    }
}
