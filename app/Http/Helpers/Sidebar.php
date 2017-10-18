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
 */
/**
 * Should be renamed to something more acuerate.
 */
if(!function_exists('routeNameIs')) {

    function routeNameIs($compare, $isResource = false, $params = null) {

        $current = Request::route()->getName();

        $resourceMap = ['index', 'create', 'show', 'edit'];
        $resourceMap = $params['only'] ?? $resourceMap;
        $resourceMap = isset($params['except']) ? array_diff($resourceMap, $params['except']) : $resourceMap;

        if(is_array($compare) && $isResource) {

            foreach($compare as $name) {
                foreach($resourceMap as $action) {
                    $map[] = $name . '.' . $action;
                }
            }
        } elseif($isResource) {

            foreach($resourceMap as $action) {
                $map[] = $compare . '.' . $action;
            }
        }

        if($isResource && in_array($current, $map)) {

            return true;
        } elseif(is_array($compare) && in_array($current, $compare)) {

            return true;
        } elseif($current == $compare) {

            return true;
        }

        return false;
    }
}

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
