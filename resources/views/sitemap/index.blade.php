<?php echo '<?xml version="1.0" encoding="UTF-8"?>
'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{url('/sitemap/posts')}}</loc>
        <lastmod>{{ ($post->updated_at ?? \Carbon\Carbon::now())->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
</sitemapindex>
