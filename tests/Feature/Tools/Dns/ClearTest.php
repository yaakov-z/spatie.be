<?php

namespace Tests\Feature\Tools\Dns;

use Tests\Feature\Tools\Dns\Concerns\InteractsWithDnsCommands;
use Tests\TestCase;

class ClearTest extends TestCase
{
    use InteractsWithDnsCommands;

    /** @test */
    public function it_clears_the_output()
    {
        $this
            ->sendDnsCommand('clear')
            ->assertRedirect(route('tools.dns'));
    }
}
