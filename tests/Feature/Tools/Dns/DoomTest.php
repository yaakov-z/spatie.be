<?php

namespace Tests\Feature\Tools\Dns;

use App\Services\DnsTool\Commands\DoomDnsCommand;
use Tests\Feature\Tools\Dns\Concerns\InteractsWithDnsCommands;
use Tests\TestCase;

class DoomTest extends TestCase
{
    use InteractsWithDnsCommands;

    /** @test */
    public function it_redirects_to_doom()
    {
        $this
            ->sendDnsCommand('doom')
            ->assertRedirect(DoomDnsCommand::$url);
    }
}
