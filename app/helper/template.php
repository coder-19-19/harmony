<?php

    function site_url($url = false){
        return URL . '/' . $url;
    }

    function public_url($url = false){
        return URL . '/public/' . $url;
    }
