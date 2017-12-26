<?php

/**
 * Check if the provided route name(s) is(are) is the current route name.
 *
 * @param   array|string $compare the route names to compare.
 * @param   boolean $isResource define the resource.
 * @param   array $params the names to add or remove from $actionMap.
 * @return  boolean
 */
if(!function_exists('routeNameIs')) {

    function routeNameIs($compare, $isResource = false, $params = null)
    {
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

/**
 * Breadcrumb constructor.
 *
 * @param   array|string $resource the route names.
 * @param   array $parents the parent items
 * @param   array $children the child items
 * @return  string
 */
if(!function_exists('breadcrumb')) {

    function breadcrumb($resource, array $children = [], array $before = [])
    {
        /** Open breadcrumb */
        $breadcrumb = '<ul class="breadcrumb">';

        /** Set the main item vars */
        $main = [
            'name' => is_array($resource) ? $resource['name'] : $resource,
            'route' => is_array($resource) ? $resource['route'] : $resource . '.index',
        ];

        /** Add the parent(s) item(s) */
        if (!empty($before)) {
            foreach ($before as $parent) {
                $breadcrumb .= '<li>';
                if (isset($parent['route'])) {
                    $breadcrumb .= '<a href="' . route($parent['route']) . '">';
                } else {
                    $breadcrumb .= '<a href="' . route($main['route']) . '">';
                }

                $breadcrumb .= $parent['name'] ?? $parent . '</a></li>';
            }
        }

        /** Add the main item */
        $breadcrumb .= '<li><a href="' . route($main['route']) . '">' . $main['name'] . '</a></li>';

        if (!empty($children)) {
            foreach($children as $child) {
                $breadcrumb .= '<li class="active">' .$child . '</li>';
            }
        } else {
            $breadcrumb .= '<li class="active">' . __('messages.here') . '</li>';
        }

        /** Close breadcrumb */
        $breadcrumb .= '</ul>';

        /** Returns the breadcrumb */
        return $breadcrumb;
    }
}
