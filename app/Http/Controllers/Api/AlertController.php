<?php


namespace Ikazuchi\Http\Controllers\Api;


use Ikazuchi\Alert;
use Ikazuchi\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlertController extends Controller {
    public function index() {
        return Alert::all();
    }

    public function show(Alert $alert) {
        return $alert;
    }

    public function add(Request $request) {
        $alert = new Alert();
        $alert->fill($request->all());
        $alert->save();

        return \Response::json(['ok']);
    }

    public function edit(Alert $alert, Request $request) {
        $alert->fill($request->all());
        $alert->save();

        return \Response::json(['ok']);
    }
}
