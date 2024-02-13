<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use hisorange\BrowserDetect\Parser as Browser;
use App\Models\Visitor;


class TambahVisitor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $kampret;

    public function __construct($a)
    {
        $this->kampret = $a;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $geoipInfo = geoip()->getLocation($this->kampret);

        if (Browser::isDesktop() == 1) {
            $jenis = 'Desktop';
        }
        if (Browser::isTablet() == 1) {
            $jenis = 'Tablet';
        }
        if (Browser::isMobile() == 1) {
            $jenis = 'Mobile';
        }
        $data = [
            'ip' => $geoipInfo->ip,
            'iso_code' => $geoipInfo->iso_code,
            'country' => $geoipInfo->country,
            'city' => $geoipInfo->city,
            'state' => $geoipInfo->state,
            'state_name' => $geoipInfo->state_name,
            'postal_code' => $geoipInfo->postal_code,
            'lat' => $geoipInfo->lat,
            'lon' => $geoipInfo->lon,
            'timezone' => $geoipInfo->timezone,
            'continent' => $geoipInfo->continent,
            'currency' => $geoipInfo->currency,
            'browser_family' => Browser::browserFamily(),
            'browser_name' => Browser::browserName(),
            'platform_family' => Browser::platformFamily(),
            'platform_name' => Browser::platformName(),
            'jenis' => $jenis,
        ];
        Visitor::create($data);
    }
}
