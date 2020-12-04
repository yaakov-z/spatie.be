<?php

namespace App\Http\Controllers\Tools\Dns;

use App\Services\DnsTool\DnsCommandChain;
use Illuminate\Http\Client\Request;

class DnsController
{
    public function index()
    {
        return view('front.pages.tools.dns.index');
    }

    public function submit($command = null)
    {
        $command ??= request()->command;

        if (!$command) {
            return $this->index();
        }

        return (new DnsCommandChain())->perform($command);
    }
}
