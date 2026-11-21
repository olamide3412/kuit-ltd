<?php

namespace App\Services\Seo;

class JsonLdBuilder
{
    public static function organization(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            '@id' => url('/') . '#organization',
            'name' => 'KUIT LIMITED',
            'alternateName' => 'KUIT',
            'identifier' => 'RC 806865',
            'url' => url('/'),
            'logo' => url('/images/logo.svg'),
            'email' => 'info@kuitltd.com',
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '(+234) 803 280 2038',
                'contactType' => 'customer service',
                'areaServed' => 'NG',
                'availableLanguage' => 'English',
            ],
        ];
    }

    public static function localBusiness(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            '@id' => url('/') . '#localbusiness',
            'name' => 'KUIT LIMITED',
            'identifier' => 'RC 806865',
            'image' => url('/images/logo.svg'),
            'telephone' => '(+234) 803 280 2038',
            'email' => 'info@kuitltd.com',
            'priceRange' => '₦₦₦₦',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '132, Airport Road',
                'addressLocality' => 'Effurun-Warri',
                'addressRegion' => 'Delta State',
                'addressCountry' => 'NG',
            ],
            'areaServed' => 'Nigeria (Effurun-Warri, Delta State & Nationwide)',
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                    'opens' => '08:00',
                    'closes' => '17:00',
                ],
            ],
        ];
    }

    public static function service($service): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $service->name,
            'description' => $service->summary,
            'provider' => [
                '@type' => 'LocalBusiness',
                'name' => config('app.name', 'KUIT LIMITED'),
            ],
            'areaServed' => 'NG',
            'url' => url("/services/{$service->slug}"),
        ];
    }

    public static function product($product): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->name,
            'description' => $product->summary,
            'sku' => $product->sku,
            'image' => $product->image ?: url('/images/og-default.jpg'),
            'brand' => [
                '@type' => 'Brand',
                'name' => $product->brand ?: config('app.name', 'KUIT LIMITED'),
            ],
            'offers' => [
                '@type' => 'Offer',
                'priceCurrency' => 'NGN',
                'price' => number_format($product->price / 100, 2, '.', ''),
                'priceValidUntil' => date('Y-12-31'),
                'availability' => 'https://schema.org/InStock',
                'url' => url("/packages/{$product->category?->slug}/{$product->slug}"),
            ],
        ];
    }

    public static function breadcrumbs(array $items): array
    {
        $itemList = [];
        $position = 1;

        foreach ($items as $name => $url) {
            $itemList[] = [
                '@type' => 'ListItem',
                'position' => $position++,
                'name' => $name,
                'item' => $url,
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $itemList,
        ];
    }
}
