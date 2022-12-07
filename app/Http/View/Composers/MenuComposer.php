<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Main\TopMenu;
use App\Main\Yetki;
use App\Main\Yetki1;
use App\Main\Yetki2;
use App\Main\Yetki3;
use App\Main\Yetki4;
use App\Main\Yetki5;
use App\Main\Simple;
use App\Main\Simple1;
use App\Main\Simple2;
use App\Main\Simple3;
use App\Main\Simple4;
use App\Main\Simple5;
use Auth;
class MenuComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (!is_null(request()->route())) {
            $pageName = request()->route()->getName();
            $layout = $this->layout($view);
            $activeMenu = $this->activeMenu($pageName, $layout);
            $view->with('side_menu', Yetki::menu());
            $view->with('simple_menu', Simple::menu());
            
            $view->with('top_menu', TopMenu::menu());

            if(Auth::check())
            {
                $yetkiid=Auth::user()->yetki;
            }
            else{$yetkiid=0;
                $view->with('side_menu', Yetki::menu());
                $view->with('simple_menu', Simple::menu());
                
            }
            
            if($yetkiid==1) {
                $view->with('side_menu', Yetki1::menu());
                $view->with('simple_menu', Simple1::menu());
            }
            elseif ($yetkiid==2) {
                $view->with('side_menu', Yetki2::menu());
                $view->with('simple_menu', Simple2::menu());
            }
            elseif ($yetkiid==3) {
                $view->with('side_menu', Yetki3::menu());
                $view->with('simple_menu', Simple3::menu());
            }
            elseif ($yetkiid==4) {
                $view->with('side_menu', Yetki4::menu());
                $view->with('simple_menu', Simple4::menu());
            }
            elseif ($yetkiid==5) {
                $view->with('side_menu', Yetki5::menu());
                $view->with('simple_menu', Simple5::menu());
            }
            $view->with('first_level_active_index', $activeMenu['first_level_active_index']);
            $view->with('second_level_active_index', $activeMenu['second_level_active_index']);
            $view->with('third_level_active_index', $activeMenu['third_level_active_index']);
            $view->with('page_name', $pageName);
            $view->with('layout', $layout);
        }
    }

    /**
     * Specify used layout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function layout($view)
    {
        if (isset($view->layout)) {
            return $view->layout;
        } else if (request()->has('layout')) {
            return request()->query('layout');
        }

        return 'side-menu';
    }

    /**
     * Determine active menu & submenu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activeMenu($pageName, $layout)
    {
        $firstLevelActiveIndex = '';
        $secondLevelActiveIndex = '';
        $thirdLevelActiveIndex = '';


        if ($layout == 'top-menu') {
            foreach (TopMenu::menu() as $menuKey => $menu) {
                if (isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        } else if ($layout == 'simple-menu') {
            foreach (SimpleMenu::menu() as $menuKey => $menu) {
                if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        } else {
            foreach (Yetki::menu() as $menuKey => $menu) {
                if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        }
if (Auth::check()) {
    $yetkiid=Auth::user()->yetki;
}
     elseif { $yetkiid=0;
        foreach (Yetki::menu() as $menuKey => $menu) {
            if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                $firstLevelActiveIndex = $menuKey;
            }

            if (isset($menu['sub_menu'])) {
                foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                    if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                        $firstLevelActiveIndex = $menuKey;
                        $secondLevelActiveIndex = $subMenuKey;
                    }

                    if (isset($subMenu['sub_menu'])) {
                        foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                            if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                $firstLevelActiveIndex = $menuKey;
                                $secondLevelActiveIndex = $subMenuKey;
                                $thirdLevelActiveIndex = $lastSubMenuKey;
                            }
                        }
                    }
                }
            }
        }
     }

    elseif ($yetkiid=1) { 
        foreach (Yetki1::menu() as $menuKey => $menu) {
            if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                $firstLevelActiveIndex = $menuKey;
            }

            if (isset($menu['sub_menu'])) {
                foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                    if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                        $firstLevelActiveIndex = $menuKey;
                        $secondLevelActiveIndex = $subMenuKey;
                    }

                    if (isset($subMenu['sub_menu'])) {
                        foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                            if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                $firstLevelActiveIndex = $menuKey;
                                $secondLevelActiveIndex = $subMenuKey;
                                $thirdLevelActiveIndex = $lastSubMenuKey;
                            }
                        }
                    }
                }
            }
        }
     }
     
         elseif ($yetkiid=2) { 
          foreach (Yetki2::menu() as $menuKey => $menu) {
            if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                $firstLevelActiveIndex = $menuKey;
            }

            if (isset($menu['sub_menu'])) {
                foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                    if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                        $firstLevelActiveIndex = $menuKey;
                        $secondLevelActiveIndex = $subMenuKey;
                    }

                    if (isset($subMenu['sub_menu'])) {
                        foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                            if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                $firstLevelActiveIndex = $menuKey;
                                $secondLevelActiveIndex = $subMenuKey;
                                $thirdLevelActiveIndex = $lastSubMenuKey;
                            }
                        }
                    }
                }
            }
        }
     }
     
     elseif ($yetkiid=3) { 
        foreach (Yetki3::menu() as $menuKey => $menu) {
          if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
              $firstLevelActiveIndex = $menuKey;
          }

          if (isset($menu['sub_menu'])) {
              foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                  if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                      $firstLevelActiveIndex = $menuKey;
                      $secondLevelActiveIndex = $subMenuKey;
                  }

                  if (isset($subMenu['sub_menu'])) {
                      foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                          if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                              $firstLevelActiveIndex = $menuKey;
                              $secondLevelActiveIndex = $subMenuKey;
                              $thirdLevelActiveIndex = $lastSubMenuKey;
                          }
                      }
                  }
              }
          }
      }
   }
   
   elseif ($yetkiid=4) { 
    foreach (Yetki4::menu() as $menuKey => $menu) {
      if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
          $firstLevelActiveIndex = $menuKey;
      }

      if (isset($menu['sub_menu'])) {
          foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
              if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                  $firstLevelActiveIndex = $menuKey;
                  $secondLevelActiveIndex = $subMenuKey;
              }

              if (isset($subMenu['sub_menu'])) {
                  foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                      if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                          $firstLevelActiveIndex = $menuKey;
                          $secondLevelActiveIndex = $subMenuKey;
                          $thirdLevelActiveIndex = $lastSubMenuKey;
                      }
                  }
              }
          }
      }
  }
}
elseif ($yetkiid=5) { 
    foreach (Yetki5::menu() as $menuKey => $menu) {
      if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
          $firstLevelActiveIndex = $menuKey;
      }

      if (isset($menu['sub_menu'])) {
          foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
              if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                  $firstLevelActiveIndex = $menuKey;
                  $secondLevelActiveIndex = $subMenuKey;
              }

              if (isset($subMenu['sub_menu'])) {
                  foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                      if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                          $firstLevelActiveIndex = $menuKey;
                          $secondLevelActiveIndex = $subMenuKey;
                          $thirdLevelActiveIndex = $lastSubMenuKey;
                      }
                  }
              }
          }
      }
  }
}
        return [
            'first_level_active_index' => $firstLevelActiveIndex,
            'second_level_active_index' => $secondLevelActiveIndex,
            'third_level_active_index' => $thirdLevelActiveIndex
        ];
    }
}
