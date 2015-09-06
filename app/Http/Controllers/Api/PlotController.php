<?php


namespace Ikazuchi\Http\Controllers\Api;


use Carbon\Carbon;
use Ikazuchi\Device;
use Ikazuchi\Http\Controllers\Controller;
use Ikazuchi\Plot;
use Illuminate\Http\Request;

class PlotController extends Controller {
    public function query(Device $device, Request $request)
    {
        $to   = Carbon::now();
        $from = Carbon::now()->addHours(-6);

        $period = $request->get('period');

        switch ($period) {
            case '30m':
                $from = Carbon::now()->addMinutes(-30);
                break;
            case '60m':
                $from = Carbon::now()->addHours(-1);
                break;
            case '3h':
                $from = Carbon::now()->addHours(-3);
                break;
            case '6h':
                $from = Carbon::now()->addHours(-6);
                break;
            case '12h':
                $from = Carbon::now()->addHours(-12);
                break;
            case '24h':
                $from = Carbon::now()->addDays(-1);
                break;
            case '7d':
                $from = Carbon::now()->addDays(-7);
                break;
        }

        return Plot::where('device_timestamp', '>=', $from)->where('device_timestamp', '<=', $to)->where('device_id', $device->id)->orderBy('device_timestamp', 'desc')->get();
    }

    public function now(Device $device)
    {
        return Plot::where('device_id', $device->id)->orderBy('device_timestamp', 'desc')->first();
    }

    public function top(Device $device, Request $request)
    {
        $to   = Carbon::now();
        $from = Carbon::now()->addHours(-7);

        $period = $request->get('period');

        switch ($period) {
            case '30m':
                $from = Carbon::now()->addMinutes(-30);
                break;
            case '60m':
                $from = Carbon::now()->addHours(-1);
                break;
            case '3h':
                $from = Carbon::now()->addHours(-3);
                break;
            case '6h':
                $from = Carbon::now()->addHours(-6);
                break;
            case '12h':
                $from = Carbon::now()->addHours(-12);
                break;
            case '24h':
                $from = Carbon::now()->addDays(-1);
                break;
            case '7d':
                $from = Carbon::now()->addDays(-7);
                break;
        }

        $temperature = Plot::where('device_timestamp', '>=', $from)
                           ->where('device_timestamp', '<=', $to)->where('device_id', $device->id)->orderBy('temperature', 'desc')->first();


        $humidity = Plot::where('device_timestamp', '>=', $from)
                        ->where('device_timestamp', '<=', $to)->where('device_id', $device->id)->orderBy('humidity', 'desc')->first();


        $water_level = Plot::where('device_timestamp', '>=', $from)
                           ->where('device_timestamp', '<=', $to)->where('device_id', $device->id)->orderBy('water_level', 'desc')->first();

        return \Response::json([
            'temperature' => $temperature,
            'humidity'    => $humidity,
            'water_level' => $water_level
        ]);

    }
}
