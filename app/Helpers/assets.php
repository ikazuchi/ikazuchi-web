<?php

if (!function_exists('cdn')) {

    /**
     * @param $path
     *
     * @return string
     */
    function cdn($path)
    {
        if (!Config::get('kitchen.admin.offlineMode')) {
            return 'https://dbby4mrxdal7l.cloudfront.net/' . $path;
        } else {
            return URL::to('assets/' . $path);
        }
    }

}

if (!function_exists('metronic_menu')) {

    /**
     * @param        $route
     * @param        $text
     * @param string $icon
     * @param array  $subMenu
     *
     * @return string
     */
    function metronic_menu($route, $text, $icon = 'icon-home', $subMenu = [])
    {
        $active   = '';
        $selected = '';
        $arrow    = '';
        $mainUrl  = 'javascript:;';
        if ($route != null) {

            $mainUrl = route($route);

            $path = str_replace( url('/') . '/', '', $mainUrl);

            if (Request::path() == $path) {
                $active   = 'active';
                $selected = '<span class="selected"></span>';
            }
        }

        $subMenuArray = [];
        if (count($subMenu) > 0) {
            $arrow = '<span class="arrow"></span>';
            foreach ($subMenu as $sub) {
                $subActive = '';
                $subPath = str_replace( url('/') . '/', '', $sub['route']);
                $currentPath = Request::path() . ( ! empty(Request::all()) ? '?' . http_build_query(Request::all()) : '');

                if ($currentPath == $subPath) {
                    $subActive = 'active';
                    $active .= ' active open';
                    $arrow = '<span class="arrow"></span>';
                }
                $subMenuArray[] = '<li data-b="' . $currentPath . '" data-c="' . $subPath . '" class="' . $subActive . '"><a href="' . url($sub['route']) . '"><i class="' . $sub['icon'] . '"></i> ' . $sub['text'] . '</a>';
            }
        }

        $menu = '<li  data-a="' . str_replace( url('/') . '/', '', $mainUrl) . '" data-c="' . Request::path() . '"  class="' . $active . '"><a href="' . $mainUrl . '"><i class="' . $icon . '"></i><span class="title">' . $text . '</span>' . $selected .
                $arrow . '</a>';

        if (count($subMenuArray) > 0) {
            $menu .= '<ul class="sub-menu">';
            foreach ($subMenuArray as $s) {
                $menu .= $s;
            }
            $menu .= '</ul>';
        }

        $menu .= '</li>';

        return $menu;
    }

}

if(!function_exists('randomNumber')) {
    function randomNumber($length) {
        $result = '';

        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }
}
