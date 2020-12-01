<?php

namespace App\Operators;

use App\Http\Controllers\OperatorsController;
use Illuminate\Support\HtmlString;
use Spatie\Sheets\Sheet;

class OperatorPage extends Sheet
{
    public function getContents(): HtmlString
    {
        return $this->getAttribute('contents');
    }

    public function getUrl(): string
    {
        return action([OperatorsController::class, 'show'], $this->getAttribute('slug'));
    }

    public function getCategory(): string
    {
        return $this->getAttribute('category');
    }
}
