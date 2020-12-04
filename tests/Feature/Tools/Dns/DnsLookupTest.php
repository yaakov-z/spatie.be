<?php

namespace Tests\Feature\Tools\Dns;

use Tests\Feature\Tools\Dns\Concerns\InteractsWithDnsCommands;
use Tests\TestCase;

class DnsLookupTest extends TestCase
{
    use InteractsWithDnsCommands;

    /** @test */
    public function it_can_lookup_a_normal_domain()
    {
        $this
            ->sendDnsCommand('spatie.be')
            ->assertSee('ns1.openprovider.nl');
    }

    /** @test */
    public function it_doesnt_fail_with_a_dot_as_search_query()
    {
        $this
            ->sendDnsCommand('.')
            ->assertSuccessful();

        $this
            ->post('/', ['command' => '.'])
            ->assertSee('root-servers.net');
    }

    /** @test */
    public function it_redirects_to_home_when_the_domain_lookup_is_invalid()
    {
        $this->withoutExceptionHandling();

        $this
            ->sendDnsCommand('..')
            ->assertRedirect(route('tools.dns'));

        $this
            ->sendDnsCommand('?')
            ->assertRedirect(route('tools.dns'));
    }

    /** @test */
    public function it_filters_out_html()
    {
        $this
            ->sendDnsCommand('<iframe>')
            ->assertRedirect(route('tools.dns'));
    }
}
