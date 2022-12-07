<?php

namespace App\Main;

class Yetki
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Yetkili-1',
                'sub_menu' => [
                    'dashboard-overview-1' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Kaydol'
                    ],
                    'dashboard-overview-2' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-2',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Üretici Listesi'
                    ],
                    'transactions' => [
                        'icon' => '',
                        'title' => 'Profil Ayarları',
                        'sub_menu' => [
                            'transaction-list' => [
                                'icon' => '',
                                'route_name' => 'transaction-list',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Kullanıcılar'
                            ],
                            
                        ]
                    ], 
                ]
            ],
            'menu-layout' => [
                'icon' => 'box',
                'title' => 'Üretici Rehberi',
                'sub_menu' => [
                    'side-menu' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Arazilerim'
                    ],
                    'simple-menu' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'simple-menu'
                        ],
                        'title' => 'Arazi İşlemleri'
                    ],
                    'top-menu' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Verim Haritası'
                    ],
                    'weather-forecast' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'simple-menu'
                        ],
                        'title' => 'Hava Durumu'
                    ],
                    'customer-support' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'simple-menu'
                        ],
                        'title' => 'Uzman Desteği'
                    ],
                    'mobile-notification' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'simple-menu'
                        ],
                        'title' => 'Mobil Bildirim'
                    ],
                ]
            ],
            'e-commerce' => [
                'icon' => 'shopping-bag',
                'title' => 'Tarımsal İçerikler',
                'sub_menu' => [
                    'categories' => [
                        'icon' => '',
                        'route_name' => 'categories',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Güncel Haber'
                    ],
                    'informating' => [
                        'icon' => '',
                        'route_name' => 'add-product',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Bilgilendirme',
                    ],
                    'newbies' => [
                        'icon' => '',
                        'route_name' => 'reviews',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Yeni Teknolojiler'
                    ],
                    'attention' => [
                        'icon' => '',
                        'route_name' => 'reviews',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Önlemler'
                    ],
                    'directions' => [
                        'icon' => '',
                        'route_name' => 'reviews',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Yönlendirmeler'
                    ],
                ]
            ],
            'random' => [
                'icon' => 'shopping-bag',
                'title' => 'Tarım Takvimi',
                'sub_menu' => [
                    'random-1' => [
                        'icon' => '',
                        'route_name' => 'categories',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Faaliyet Rehberi'
                    ],
                    'well' => [
                        'icon' => '',
                        'route_name' => 'add-product',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Takvim',
                    ],

                ]
            ],
        ];
    }
}
