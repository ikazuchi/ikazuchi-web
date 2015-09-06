<?php


namespace Ikazuchi\Http\Controllers\Api;


use Ikazuchi\Alert;
use Ikazuchi\Client;
use Ikazuchi\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlertController extends Controller {
    public function index()
    {
        return Alert::all();
    }

    public function show(Alert $alert)
    {
        return $alert;
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'parameter' => 'required|in:temperature,humidity,water_level',
            'threshold' => 'required'
        ]);

        $alert = Alert::firstOrNew([
            'parameter' => $request->get('parameter'),
            'threshold' => $request->get('threshold')
        ]);

        $alert->client_id = Client::first()->id;
        $alert->is_active = $request->get('is_active', true);
        $alert->save();

        return \Response::json(['ok']);
    }

    public function edit(Alert $alert, Request $request)
    {
        $this->validate($request, [
            'threshold' => 'required'
        ]);

        $alert->threshold = $request->get('threshold');
        $alert->is_active = $request->get('is_active', true);
        $alert->save();

        return \Response::json(['ok']);
    }
}
