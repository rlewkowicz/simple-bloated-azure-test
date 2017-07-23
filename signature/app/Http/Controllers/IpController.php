<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IpController extends Controller
{
    public function ip()
    {
      $clientIpAddress = shell_exec('curl -H Metadata:true "http://169.254.169.254/metadata/instance?api-version=2017-04-02" | grep -o "privateIpAddress...[0-9]*\.[0-9]*\.[0-9]*\.[0-9]*" | awk -F\':"\' \'{print $2}\'');

      return view('welcome', ['IP' => $clientIpAddress]);
    }
}
