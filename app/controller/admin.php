<?php
        if(!route(1)){
            $route[1] = 'index';
        }

        if(!file_exists(admin_controller(route(1)))){
            $route[1] = 'index';
        }
        if(!session('admin_id')){
            $route[1] = 'login';
        }
        $menus = [
            'index' => [
                'title' => 'Ev',
                'icon' => 'home',
            ],
            'students' => [
                'title' => 'Tələbələr',
                'icon' => 'graduation-cap',
            ],
            'teachers' => [
              'title' => 'Müəllimlər',
              'icon' => 'users',
            ],
            'languages' => [
                'title' => 'Dillər',
                'icon' => 'language',
            ],
            'books' => [
              'title' => 'Kitablar',
              'icon' => 'book'
            ],
            'book-category' => [
                'title' => 'Kitab Kateqoriyaları',
                'icon' => 'bars'
              ],
            'vacancies' => [
                'title' => 'Vakansiya',
                'icon' => 'list'
            ],
            'messages' => [
                'title' => 'Mesajlar',
                'icon' => 'envelope',
            ],
            'subscribers' => [
                'title' => 'Abonələr',
                'icon' => 'user',
            ],
            'services' => [
                'title' => 'Xidmətlər',
                'icon' => 'amazon'
            ],
            'settings' => [
                'title' => 'Tənzimləmələr',
                'icon' => 'cog',
            ],

        ];

       

        require admin_controller(route(1));



