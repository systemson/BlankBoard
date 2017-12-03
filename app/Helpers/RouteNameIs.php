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
 * @param   array $params the names to add or remove from $actionMap
 */
if(!function_exists('routeNameIs')) {

    function routeNameIs($compare, $isResource = false, $params = null) {

        $current = Request::route()->getName();

        $actionMap = ['index', 'create', 'show', 'edit'];
        $actionMap = $params['only'] ?? $actionMap;
        $actionMap = isset($params['except']) ? array_diff($actionMap, $params['except']) : $actionMap;

        if(is_array($compare) && $isResource) {

            foreach($compare as $name) {
                foreach($actionMap as $action) {
                    $map[] = $name . '.' . $action;
                }
            }
        } elseif($isResource) {

            foreach($actionMap as $action) {
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
