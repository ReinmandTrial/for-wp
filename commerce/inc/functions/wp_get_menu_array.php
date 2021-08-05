<?php
    function wp_get_menu_array($location) {

        $menuLocations = get_nav_menu_locations();

        if( ! isset( $menuLocations[$location] ) ) return [];

        $menuID = $menuLocations[$location];

        $menu_array = wp_get_nav_menu_items($menuID);
    
        $menu = array();
    
        foreach ($menu_array as $m) {
            if (empty($m->menu_item_parent)) {
                $menu[$m->ID] = array();
                $menu[$m->ID]['ID'] = $m->ID;
                $menu[$m->ID]['title'] = $m->title;
                $menu[$m->ID]['url'] = $m->url;
                $menu[$m->ID]['mobile_text'] = get_field( 'mobile_text', $m );
                $menu[$m->ID]['children'] = populate_children($menu_array, $m);
            }
        }
    
        return $menu;
    
    }

    function populate_children($menu_array, $menu_item){
        $children = array();
        if (!empty($menu_array)){
            foreach ($menu_array as $k=>$m) {
                if ($m->menu_item_parent == $menu_item->ID) {
                    $children[$m->ID] = array();
                    $children[$m->ID]['ID'] = $m->ID;
                    $children[$m->ID]['title'] = $m->title;
                    $children[$m->ID]['url'] = $m->url;
                    unset($menu_array[$k]);
                    $children[$m->ID]['children'] = populate_children($menu_array, $m);
                }
            }
        };
        return $children;
    }