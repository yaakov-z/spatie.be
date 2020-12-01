<?php

namespace App\Operators;

use Illuminate\Support\Collection;
use Spatie\Sheets\Sheet;
use Spatie\Sheets\Sheets;

class Operators
{
    private Collection $pages;

    public function __construct(Sheets $sheets)
    {
        $this->pages = $sheets->collection('operators')->all();
    }

    public function pages(): Collection
    {
        return $this->pages;
    }

    public function pagesByCategory(): Collection
    {
        return $this->pages->groupBy(fn(OperatorPage $page) => $page->getCategory());
    }

    public function page(string $slug): ?Sheet
    {
        return $this->pages->firstWhere('slug', $slug);
    }
}
