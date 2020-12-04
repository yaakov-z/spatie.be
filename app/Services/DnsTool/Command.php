<?php

namespace App\Services\DnsTool;

use Symfony\Component\HttpFoundation\Response;

interface Command
{
    public function canPerform(string $command): bool;

    public function perform(string $command): Response;
}
