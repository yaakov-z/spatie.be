<?php

namespace Tests\Feature\Tools\Dns;

use Tests\Feature\Tools\Dns\Concerns\InteractsWithDnsCommands;
use Tests\TestCase;

class IpTest extends TestCase
{
    use InteractsWithDnsCommands;

    /** @test */
    public function it_shows_your_ip_address()
    {
        $content = $this->sendDnsCommand('ip')->content();

        $this->assertNotEmpty($content);
    }
}
