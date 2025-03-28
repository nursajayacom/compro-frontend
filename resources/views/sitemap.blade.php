<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @php
        $urls = [
            route('general.home'),
            route('general.product'),
            route('general.about-us'),
            route('general.contact-us'),
            route('general.news'),
            route('general.our-service'),
        ];
    @endphp
    @foreach ($urls as $url)
        <url>
            <loc>{{ $url }}</loc>
            <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>{{ $url == route('general.home') ? '1.0' : '0.8' }}</priority>
        </url>
    @endforeach
</urlset>
