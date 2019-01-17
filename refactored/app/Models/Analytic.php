<?php

namespace App\Models;

class Analytic extends BaseModel
{
    /**
     * Allows to build IP-grouped report
     * @return \Illuminate\Support\Collection
     */
    public function ipReport()
    {
        return  Visit::query()->toBase()->select([
            'ip',
            'visits' => 'COUNT(*)',
        ])->get();
    }

    /**
     * Allows to build country-grouped report
     * @return \Illuminate\Support\Collection
     */
    public function countryReport()
    {
        return Visit::query()->toBase()->select([
            'country',
            'visits' => 'COUNT(*)',
        ])->get();
    }

    /**
     * Allows to build report for multiple metrics for a single website
     * @param int $websiteId
     * @return array
     */
    public function websiteMetricsReport(int $websiteId)
    {
        $metrics = [
            [
                'field' => 'browser',
                'label' => 'Browsers',
                'data' => [],
            ],
            [
                'field' => 'os',
                'label' => 'OS',
                'data' => [],
            ],
        ];

        foreach ($metrics as &$metric) {

            $metric['data'] = Visit::query()->toBase()->select([
                'browser',
                DB::raw('COUNT(browser) as visits'),
            ])
                ->groupBy('browser')
                ->where('website_id', $websiteId)
                ->where('visited_at', '>', Carbon::now()->subDays(7))
                ->get();
        }

        return $metrics;
    }
}