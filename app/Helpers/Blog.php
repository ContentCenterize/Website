<?php
if (!function_exists('get_color')) {
    function get_color($post = null): string
    {
        if(!is_null($post) && $post->level == 5){
            return 'bg-primary';
        }
        switch (rand(1,10)){
            case 3:
                return 'bg-dark';
            case 5:
                return 'bg-secondary';
            default:
                return '';
        }
    }
}
