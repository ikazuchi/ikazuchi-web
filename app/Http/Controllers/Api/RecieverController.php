<?php


namespace Ikazuchi\Http\Controllers\Api;


use Carbon\Carbon;
use Ikazuchi\Device;
use Ikazuchi\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecieverController extends Controller {
    public function input(Request $request)
    {
        \Log::info($request->all(), ['REQUEST' => 'CHIKKA']);

        $message = $request->get('message');

        $data = explode('/', $message);

        $device = Device::where('uuid', $data[0])->first();

        if (!isset($device)) {
            \Log::warning('Failed to log info: ' . $request->get('messsage'), ['REQUEST' => 'DEVICE_NOT_FOUND']);
            return 0;
        }

        $device_timestamp = $data[1];

        $latitude         = explode(',', $data[2])[0];
        $longitude        = explode(',', $data[2])[1];
        $temperature      = $data[3];
        $humidity         = $data[4];
        $water_level      = $data[5];

        \DB::table('plots')->insert([
            'device_id'        => $device->id,
            'latitude'         => $latitude,
            'longitude'        => $longitude,
            'device_timestamp' => Carbon::createFromTimestamp($device_timestamp),
            'temperature'      => $temperature,
            'humidity'         => $humidity,
            'water_level'      => $water_level,
            'created_at'       => Carbon::now(),
            'updated_at'       => Carbon::now()
        ]);

        \Log::info('Succeeded logging: ' . $request->get('message'), ['REQUEST' => 'SUCCESS']);

        return 1;
    }
}
