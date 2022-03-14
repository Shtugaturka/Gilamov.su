<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($pages as $page)
        <url>
            <loc>{{ $page->getUrl() }}</loc>
            <lastmod>{{ $page->updated_at->tz('GMT')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
        </url>
    @endforeach

    @foreach ($categories as $category)
        <url>
            <loc>{{ $category->getUrl() }}</loc>
            <lastmod>{{ $category->updated_at->tz('GMT')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    @foreach ($works as $work)
        <url>
            <loc>{{ $work->getUrl() }}</loc>
            <lastmod>{{ $work->updated_at->tz('GMT')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>1</priority>
        </url>
    @endforeach
</urlset>
