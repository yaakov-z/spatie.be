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

    public function findByOperator(string $operator)
    {
        return $this->pages->first(
            fn(OperatorPage $page) => $page->getOperator() === $operator
        );
    }

    public function page(string $slug): ?Sheet
    {
        /** @var \App\Operators\OperatorPage|null $page */
        $page = $this->pages->firstWhere('slug', $slug);

        if (! $page) {
            return null;
        }

        $relatedPages = $page->getRelatedStrings()
            ->map(fn(string $relatedOperator) => $this->findByOperator($relatedOperator));

        $page->setRelatedPages($relatedPages);

        return $page;
    }
}
