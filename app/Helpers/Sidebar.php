<?php

/**
 | Helper file to build the sidebar.
 |
 | This file will build entirely the sidebar from an array containing
 | the elements name, params and the submenus.
 |
 | As this Helper evolution, should be changed to a class.
 |
 | Name
 |
 |
 | @ContentArray params would be
 |      @isResource
 |      @title
 |      @name
 |      @routeName => if null or not given, set "$name . '.index'". Ignored if isResource is set true
 |      //@only => the only controller actions to include
 |      //@except => Controller actions to exclude
 |      @icon = FA icon name
 |      General params optional
 |          @class
 |          @activeClass
 |          @parentClass
 |          @parentActiveClass
 |          @childClass
 |          @childActiveClass
 |          @neededPermission
 |          @neededRole
 |
 | @todo  add hasPermission check
 | @todo  route to resource controller index
 | @todo  route to resource controller index
 |

/**
 * When this helpers evolve to a class, change this function to Sidebar::open()
 */
if(!function_exists('sidebarOpen')) {

    function sidebarOpen($tag = 'ul', $params = null) {

        $tag = $tag ?? 'ul';

        $paramString = null;

        if($params != null && is_array($params)) {

            foreach($params as $param => $value) {
                $paramString .= $param . '="' . $value . '" ';
            }
        }

        return '<' . $tag . ' ' . $paramString . '>';
    }
}

if(!function_exists('sidebarClose')) {

    function sidebarClose($tag = 'ul') {

        return '</' . $tag . '>';
    }
}
