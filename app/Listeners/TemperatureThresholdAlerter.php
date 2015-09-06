<?php

namespace Ikazuchi\Listeners;

use Coreproc\Chikka\ChikkaClient;
use Coreproc\Chikka\Models\Sms;
use Coreproc\Chikka\Transporters\SmsTransporter;
use Ikazuchi\Alert;
use Ikazuchi\Events\ReceievedDataFromDevice;

class TemperatureThresholdAlerter {
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->chikkaClient = new ChikkaClient(env('CHIKKA_CLIENT'), env('CHIKKA_SECRET'), env('CHIKKA_SHORTCODE'));
        $this->parameter    = 'temperature';
        $this->short_param  = 'TEMP';
    }

    /**
     * Handle the event.
     *
     * @param  ReceievedDataFromDevice $event
     *
     * @return void
     */
    public function handle(ReceievedDataFromDevice $event)
    {
        if (isset($event->data[$this->parameter])) {
            $alerts = Alert::active()->where('parameter', $this->parameter)->where('threshold', '<', $event->data[$this->parameter])->get();

            foreach ($alerts as $alert) {
                $mes = new Sms(randomNumber(32), $alert->client->mobile_number,
                    'ALERT: ' . $event->data['serial_no'] . $this->short_param .' > ' . $alert->threshold .
                    ' W/ VAL, ' . $event->data[$this->parameter]);

                $smstransporter = new SmsTransporter($this->chikkaClient, $mes);

                $response = $smstransporter->send();

                \Log::info(json_encode($response), ['ALERT']);
            }
        }
    }
}
