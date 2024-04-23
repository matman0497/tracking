<?php

namespace App\Http\Controllers;

use App\Jobs\CreateTracking;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Wolfcast\BrowserDetection;

class TrackingController extends Controller
{
    public function __invoke(Request $request, BrowserDetection $browserDetection): RedirectResponse
    {

        if ($request->get('redirectUrl') === null) {
            abort(422);
        }

        CreateTracking::dispatch([
            'request_time' => Carbon::now()->format('Y-m-d H:i:s'),
            'ip_address' => $request->ip(),
            'os' => $browserDetection->getPlatformVersion(),
            'device' => $request->userAgent(),
            'referer' => $request->header('referer'),
            'url' => $request->fullUrl(),
            'language' => $request->getPreferredLanguage(),
        ]);

        return Redirect::away($request->get('redirectUrl'));

    }

}
