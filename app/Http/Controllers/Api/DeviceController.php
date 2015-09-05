<?php


namespace Ikazuchi\Http\Controllers\Api;


use Ikazuchi\Device;
use Ikazuchi\Http\Controllers\Controller;

class DeviceController extends Controller {
    public function index() {
        return Device::all();
    }

    public function show(Device $device) {
        return $device;
    }
}
