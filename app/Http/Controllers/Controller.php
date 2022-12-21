<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnSuccess($string){
        return [
            'success'   => true,
            'message'   => $string ." Added Successfully",
        ];
    }

    public function returnFalse($error){
        return [
            'success'   => false,
            'message'   => $error
        ];
    }
}
