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

        switch($data[0]) {
            case 'RX':
                break;
            case 'TX':
                break;
        }

        return $this->rx($request, $data);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $data
     *
     * @return bool
     */
    private function rx(Request $request, $data)
    {
        $device = Device::where('uuid', $data[1])->first();

        if (!isset($device)) {
            \Log::warning('Failed to log info: ' . $request->get('messsage'), ['REQUEST' => 'DEVICE_NOT_FOUND']);

            return false;
        }

        $device_timestamp = $data[2];

        $latitude    = explode(',', $data[3])[0];
        $longitude   = explode(',', $data[3])[1];
        $temperature = $data[4];
        $humidity    = $data[5];
        $water_level = $data[6];

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

        return true;
    }
}
