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
