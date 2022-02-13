<?php
if (!function_exists("post_string_excerpt")){
    /**
     * @param $str
     * @return string
     */
    function post_string_excerpt($str): string
    {
        return mb_substr(strip_tags($str), 0, 150).'...';
    }
}

if (!function_exists("get_first_img")){
    /**
     * @param $str
     * @return string
     */
    function get_first_img($html): string
    {
        $doc = new DOMDocument();
        @$doc->loadHTML($html);

        $tags = $doc->getElementsByTagName('img');

        foreach ($tags as $tag) {
            $img = $tag->getAttribute('src');

            /* Blogger Hacks */
            if(!Str::contains($img, 'indicator-light')){
                return $img;
            }
        }

        return '';
    }
}
