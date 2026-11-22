<?php

namespace App\Services\Seo;

class SeoData
{
    public string $title;
    public string $description;
    public string $canonical;
    public string $robots;
    public ?string $ogImage;
    public string $ogType;
    public array $jsonLd;
    public array $breadcrumbs;
    public ?string $keywords;

    public function __construct(
        string $title = '',
        string $description = '',
        string $canonical = '',
        string $robots = 'index,follow',
        ?string $ogImage = null,
        string $ogType = 'website',
        array $jsonLd = [],
        array $breadcrumbs = [],
        ?string $keywords = null
    ) {
        $company = config('app.name', 'KUIT LIMITED');
        $this->title = $title ? "{$title} | {$company}" : "{$company} | Marine Logistics, Equipment Leasing & Engineering Nigeria";
        $this->description = $description ?: "KUIT LIMITED (RC 806865) is a Nigerian multi-disciplinary engineering, marine logistics, and heavy construction equipment leasing contractor based in Effurun-Warri, Delta State.";
        $this->canonical = $canonical ?: url()->current();
        $this->robots = $robots;
        $this->ogImage = $ogImage ?: url('/images/og-default.jpg');
        $this->ogType = $ogType;
        $this->jsonLd = $jsonLd;
        $this->breadcrumbs = $breadcrumbs;
        $this->keywords = $keywords;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'canonical' => $this->canonical,
            'robots' => $this->robots,
            'ogImage' => $this->ogImage,
            'ogType' => $this->ogType,
            'jsonLd' => $this->jsonLd,
            'breadcrumbs' => $this->breadcrumbs,
            'keywords' => $this->keywords,
        ];
    }
}
