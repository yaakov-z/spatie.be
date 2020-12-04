<?php

namespace App\Operators;

use App\Http\Controllers\Operators\OperatorsController;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Spatie\Sheets\Sheet;

class OperatorPage extends Sheet
{
    private Collection $relatedPages;

    public function getContents(): HtmlString
    {
        return $this->getAttribute('contents');
    }

    public function getTitle(): string
    {
        return $this->getAttribute('title');
    }

    public function getTeaser(): string
    {
        return $this->getAttribute('teaser');
    }

    public function getUrl(): string
    {
        return action([OperatorsController::class, 'show'], $this->getAttribute('slug'));
    }

    public function getCategory(): string
    {
        return $this->getAttribute('category');
    }

    /**
     * @return \Illuminate\Support\Collection|string[]
     */
    public function getRelatedStrings(): Collection
    {
        return collect($this->getAttribute('related'));
    }

    /**
     * @return \Illuminate\Support\Collection|\App\Operators\OperatorPage[]
     */
    public function getRelatedPages(): Collection
    {
        return $this->relatedPages;
    }

    public function setRelatedPages(Collection $relatedPages): void
    {
        $this->relatedPages = $relatedPages;
    }

    public function getTags(): Collection
    {
        return collect($this->getAttribute('tags'));
    }

    public function getOperator(): string
    {
        return $this->getTags()->first();
    }
}
