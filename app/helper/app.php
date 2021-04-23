<?php

    function controller($controllerName){
        $controllerName = strtolower($controllerName);
        return PATH . '/app/controller/' . $controllerName . '.php';
    }

    function view($viewName){
        return PATH . '/app/view/' . $viewName . '.php';
    }

    function route($index){
        global $route;
        return isset($route[$index]) ? $route[$index] : false;
    }

    function settings($name){
        global $settings;
        return isset($settings[$name]) ? $settings[$name] : false;
    }

    function error(){
        global $error;
        return isset($error) ? $error : null;
    }
    function success(){
        global $success;
        return isset($success) ? $success : null;
    }

    function SEFlink($str){
        $str = mb_strtolower($str,'UTF-8');
        $str = str_replace(
            ['ı','ü','ğ','ö','ç','ş','ə'],
            ['i','u','g','o','c','s','e'],
            $str
        );
        $str = preg_replace('/[^a-z0-9]/','-',$str);
        $str = preg_replace('/-+/','-',$str);
        $str = trim($str,'-');
        return $str;
    }

    function timeConvert ($zaman){
        $zaman =  strtotime($zaman);
        $zaman_farki = time() - $zaman;
        $saniye = $zaman_farki;
        $dakika = round($zaman_farki/60);
        $saat = round($zaman_farki/3600);
        $gun = round($zaman_farki/86400);
        $hafta = round($zaman_farki/604800);
        $ay = round($zaman_farki/2419200);
        $yil = round($zaman_farki/29030400);
        if( $saniye < 60 ){
            if ($saniye == 0){
                return 'indicə';
            } else {
                return $saniye .' saniyə əvvəl';
            }
        } else if ( $dakika < 60 ){
            return $dakika .' dəqiqə əvvəl';
        } else if ( $saat < 24 ){
            return $saat.' saat əvvəl';
        } else if ( $gun < 7 ){
            return $gun .' gün əvvəl';
        } else if ( $hafta < 4 ){
            return $hafta.' həftə əvvəl';
        } else if ( $ay < 12 ){
            return $ay .' ay əvvəl';
        } else {
            return $yil.' il əvvəl';
        }
    }


    function session($name){
        return isset($_SESSION[$name]) ? $_SESSION[$name] : false;
    }