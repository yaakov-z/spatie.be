<?php

namespace App\Services\DnsTool\Commands;

use App\Services\DnsTool\DnsCommand;
use Exception;
use Spatie\Dns\Dns;
use Symfony\Component\HttpFoundation\Response;

class DnsLookupDnsCommand implements DnsCommand
{
    public function canPerform(string $command): bool
    {
        return true;
    }

    public function perform(string $command): Response
    {
        $dns = new Dns($command);

        try {
            $dnsRecords = $dns->getRecords();

            $domain = $dns->getDomain();
        } catch (Exception $e) {
            $dnsRecords = '';
        }

        if ($dnsRecords === '') {
            $errorText = __('errors.noDnsRecordsFound', ['domain' => $domain ?? null]);

            flash()->error($errorText);

            return redirect()->route('tools.dns');
        }

        return response()->view('front.pages.tools.dns.index', ['output' => $dnsRecords, 'domain' => $domain ]);
    }
}
