<?php


namespace Ikazuchi\Http\Controllers\Backend;


use Ikazuchi\Http\Controllers\Controller;

class DashboardController extends Controller {
    public function index() {
        return view('backend.pages.dashboard');
    }
}
