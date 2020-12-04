<?php


namespace Tests\Feature\Tools\Dns\Concerns;

use Illuminate\Testing\TestResponse;

trait InteractsWithDnsCommands
{
    protected string $baseUrl = 'http://spatie.be.test/dns';

    protected function sendDnsCommand(string $command, string $url = null): TestResponse
    {
        $url = $url
            ? $this->baseUrl . $url
            : "{$this->baseUrl}/{$command}";

        return $this->post($url, compact('command'));
    }
}
