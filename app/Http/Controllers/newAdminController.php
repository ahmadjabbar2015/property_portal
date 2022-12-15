<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newAdminController  extends Controller
{
    public function index()
    {
        // abort(403);
        return redirect(route('dashboard'));
    }
}
