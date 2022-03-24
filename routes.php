<?php

class Routes {

    public function __construct() {

        $this->domain = _SITE_URL;

    }

// Assets

    public function image($src) {
            return $this->domain . '/images/'. $src;
    }

    public function assets_js($file) {
            return $this->domain . '/assets/js/'. $file;
    }

    public function assets_css($file) {
            return $this->domain . '/assets/css/'. $file;
    }

    public function assets_img($file) {
            return $this->domain . '/assets/img/'. $file;
    }

// Pages

    public function home() {
            return $this->domain;
    }

    public function error() {
            return $this->domain . '/error';
    }

    public function admin() {
            return $this->domain . '/admin';
    }

    public function search() {
            return $this->domain . '/search';
    }

    public function movies() {
            return $this->domain . '/movies';
    }

    public function movie($id, $slug) {
        return $this->domain . '/movie/' . $id . '/' . $slug;
    }

    public function genre($type, $id) {
            return $this->domain . '/' . $type . '?genre='. $id;
    }

}

?>