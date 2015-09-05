<?php


namespace Ikazuchi\Http\Controllers\Api;


use Carbon\Carbon;
use Coreproc\Chikka\ChikkaClient;
use Coreproc\Chikka\Models\Sms;
use Coreproc\Chikka\Transporters\SmsTransporter;
use Ikazuchi\Client;
use Ikazuchi\Device;
use Ikazuchi\Http\Controllers\Controller;
use Ikazuchi\Plot;
use Illuminate\Http\Request;

class RecieverController extends Controller {
    public function input(Request $request)
    {
        \Log::info($request->all(), ['REQUEST' => 'CHIKKA']);

        $message = $request->get('message');

        $data = explode('/', $message);

        switch ($data[0]) {
            case 'RX':
                $this->rx($request, $data);
                return \Response::json(['ok']);
            case 'TX':
                $this->tx($request, $data);
                return \Response::json(['ok']);
        }

        \Log::warning('BAD REQUEST: ' . $request->get('messsage'), ['REQUEST' => 'BAD_REQUEST']);

        $chikkaClient = new ChikkaClient(env('CHIKKA_CLIENT'), env('CHIKKA_SECRET'), env('CHIKKA_SHORTCODE'));

        $mes = new Sms('tx-err-' . str_random(), $request->get('mobile_number'), 'No such service!');

        $smstransporter = new SmsTransporter($chikkaClient, $mes);

        $response = $smstransporter->send();

        \Log::info(json_encode($response));

        return \Response::json(['error'], 400);

    }

    private function tx(Request $request, $data)
    {
        $device = Device::where('uuid', $data[1])->first();

        $chikkaClient = new ChikkaClient(env('CHIKKA_CLIENT'), env('CHIKKA_SECRET'), env('CHIKKA_SHORTCODE'));

        if (!isset($device)) {
            \Log::warning('Failed to log info: ' . $request->get('messsage'), ['REQUEST' => 'DEVICE_NOT_FOUND']);

            $mes = new Sms('tx-err-' . str_random(), Client::first()->mobile_number, 'Device was not found!');

            $smstransporter = new SmsTransporter($chikkaClient, $mes);

            $response = $smstransporter->send();

            \Log::info(json_encode($response));

            return false;
        }

        $plot = Plot::where('device_id', $device->id)->orderBy('device_timestamp', 'desc')->first();

        $message = $device->serial_no . '/' . $plot->device_timestamp->toDateTimeString . '/' .
                   $plot->latitude . ',' . $plot->longitude . '/' . $plot->temperature . '/' . $plot->humidity . '/' . $plot->water_level;

        $mes = new Sms('tx-' . str_random(), Client::first()->mobile_number, $message);

        $smstransporter = new SmsTransporter($chikkaClient, $mes);

        $response = $smstransporter->send();

        \Log::info(json_encode($response));


        return true;
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
