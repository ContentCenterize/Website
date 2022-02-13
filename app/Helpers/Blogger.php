<?php
if (!function_exists('get_id_from_blogger_id')) {
    function get_id_from_blogger_id($id)
    {
        $data = explode(':', $id);

        $blog = explode('-', explode('.', $data[2])[0])[1];
        $post = explode('-', explode('.', $data[2])[1])[1];

        return [
            'blog' => $blog,
            'post' => $post
        ];
    }
}

if (!function_exists('replace_code_to_block')) {
    function replace_code_to_block($str)
    {
        $str = Str::replace('\<code','<'.'div class=\"mockup-code\">\<code', $str);
        $str = Str::replace('\</code\>','\</div\>\</code\>', $str);
        return $str;
    }
}
