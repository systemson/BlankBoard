<?php

/**
 |
 | Helper for checking the route name
 |
 */

/**
 * Should be renamed to something more accurate.
 *
 * @param   array|string $compare the route names to compare
 * @param   boolean $isResource define the resource
 * @param   aray $params the names to add or remove from $resourceMap
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
