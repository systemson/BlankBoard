<?php

/**
 * Check if the provided route name(s) is(are) is the current route name.
 *
 * @todo    Accept multiple names with | as divider.
 *
 * @param   array|string $compare the route names to compare.
 * @param   boolean $isResource define the resource.
 * @param   array $params the names to add or remove from $actionMap.
 * @return  boolean
 */
if (!function_exists('routeNameIs')) {
    function routeNameIs($compare, $isResource = false, $params = null)
    {
        $current = Request::route()->getName();

        $actionMap = ['index', 'create', 'show', 'edit'];
        $actionMap = $params['only'] ?? $actionMap;
        $actionMap = isset($params['except']) ? array_diff($actionMap, $params['except']) : $actionMap;

        if (is_array($compare) && $isResource) {
            foreach ($compare as $name) {
                foreach ($actionMap as $action) {
                    $map[] = $name . '.' . $action;
                }
            }
        } elseif ($isResource) {
            foreach ($actionMap as $action) {
                $map[] = $compare . '.' . $action;
            }
        }

        if ($isResource && in_array($current, $map)) {
            return true;
        } elseif (is_array($compare) && in_array($current, $compare)) {
            return true;
        } elseif ($current == $compare) {
            return true;
        }

        return false;
    }
}

if (!function_exists('requestIs')) {
    function requestIs($url, $class = 'active')
    {
        $urls = is_string($url) ? explode('|', $url) : $url;

        foreach ($urls as $url) {
            if (\Request::is($url)) {
                return true;
            }
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
if (!function_exists('breadcrumb')) {
    function breadcrumb($resource, array $children = [], array $before = [])
    {
        /* Open breadcrumb */
        $breadcrumb = '<ul class="breadcrumb">';

        /* Set the main item vars */
        $main = [
            'name' => is_array($resource) ? $resource['name'] : $resource,
            'route' => is_array($resource) ? $resource['route'] : $resource . '.index',
        ];

        /* Add the parent(s) item(s) */
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

        /* Add the main item */
        $breadcrumb .= '<li><a href="' . route($main['route']) . '">' . $main['name'] . '</a></li>';

        /* Add the children items */
        if (!empty($children)) {
            foreach ($children as $child) {
                $breadcrumb .= '<li class="active">' .$child . '</li>';
            }
        } else {
            $breadcrumb .= '<li class="active">' . __('messages.here') . '</li>';
        }

        /* Close breadcrumb */
        $breadcrumb .= '</ul>';

        /* Returns the breadcrumb */
        return $breadcrumb;
    }
}

if (!function_exists('button')) {
    function button(string $type, $url = '#', array $param = [])
    {
        if (!Lang::has('messages.btn.' . $type)) {
            return;
        }

        $config = Lang::get('messages.btn.' . $type);

        $class = $config['class'];
        $name = $config['name'];
        $icon = $config['icon'] ?? null;

        $title = !is_null($icon) ? "<i class=\"{$icon}\"></i>" : null;
        $title .= " <span class=\"hidden-xs\">{$name}</span>";


        return "<a class=\"{$class}\" href=\"{$url}\">{$title}</a>";
    }
}

if (!function_exists('status_label')) {
    function status_label(int $status)
    {
        return '<span class="' . Lang::get('messages.status.' . $status . '.class') . '">' . Lang::get('messages.status.' . $status . '.name') . '</span>';
    }
}

if (!function_exists('delete_btn')) {
    function delete_btn(int $id, $name)
    {
        $open = Form::open(['method' => 'DELETE', 'route' => [$name . '.destroy', $id], 'style' => 'display: inline-block;']);
        $btn = Form::button(__('messages.action.trash'), [
            'type' => 'submit',
            'class'=> 'btn btn-danger btn-xs',
            'onclick'=> 'return confirm("' . __('messages.confirm-delete') . '")',
        ]);
        $close = Form::close();

        return "{$open} {$btn} {$close}";
    }
}

if (!function_exists('edit_btn')) {
    function edit_btn(int $id, $name)
    {
        $icon = __('messages.action.edit');

        $url = route($name . '.edit', $id);

        return "<a class=\"btn btn-primary btn-xs\" href=\"{$url}\">{$icon}</a>";
    }
}

if (!function_exists('show_btn')) {
    function show_btn(int $id, $name)
    {
        $icon = __('messages.action.show');

        $url = route($name . '.show', $id);

        return "<a class=\"btn btn-info btn-xs\" href=\"{$url}\">{$icon}</a>";
    }
}

if (!function_exists('menu')) {
    function menu($slug, $attr = ['item-active' => 'active'])
    {
        $menu = \App\Models\Menu::where('status', 1)
        ->where('slug', $slug)
        ->first();

        if (empty($menu) || empty($menu->items)) {
            return '';
        }

        $container_tag = $attr['parent-tag'] ?? 'div';;
        $container_class = $attr['parent-class'] ?? 'collapse navbar-collapse';;

        $parent_tag = $attr['parent-tag'] ?? 'ul';
        $parent_class = $attr['parent-class'] ?? 'navbar-nav';

        $item_tag = $attr['item-tag'] ?? 'li';
        $item_class = $attr['item-class'] ?? 'nav-item';
        $item_active = $attr['item-active'] ?? nul;

        $link_class = $attr['link-class'] ?? 'nav-link';
        $link_active = $attr['link-active'] ?? null;

        $open = "<{$container_tag} class=\"{$container_class}\"><{$parent_tag} class=\"{$parent_class}\" id=\"{$menu->slug}\">";

        $list = '';
        foreach ($menu->items as $item) {
            $url = url($item->url);

            $active['item'] = !is_null($item_active) && requestIs([$item->url, $item->url . '/*']) ? " {$item_active}" : '';
            $active['link'] = !is_null($link_active) && requestIs([$item->url, $item->url . '/*']) ? " {$link_active}" : '';

            $list .= "<{$item_tag} class=\"{$item_class}{$active['item']}\"><a class=\"{$link_class}{$active['link']}\" href=\"{$url}\">{$item->title}</a></{$item_tag}>";
        }

        $close = "</{$parent_tag}></{$container_tag}>";

        return $open.$list.$close;
    }
}

if (!function_exists('td')) {
    function td($resource, string $column)
    {
        $class = 'text-center';
        $content = $resource[$column];

        switch ($column) {
            case ends_with($column, '_id'):
            $relation = str_replace_last('_id', '', $column);
            $content = optional($resource->{$relation})->name ?? $content;
            break;
            case 'status':
            $content = status_label($resource[$column]);
            break;
            
            case 'name':
            case 'title':
            $class = 'text-left';
            break;
            case 'value':
            $content = var_export($content, true);
            break;

            default:
            break;
        }

        return "<td nowrap class=\"{$class}\">{$content}</td>";
    }
}

if (!function_exists('th')) {
    function th(string $column)
    {
        $class = null;

        $column = str_replace('_id', '', $column);

        $name = \Lang::has('messages.table.' . $column) ? \Lang::get('messages.table.' . $column) : ucwords(str_replace('_', ' ', $column));

        switch ($column) {
            case 'name':
            case 'title':
            $class = 'col-sm-6';
            break;

            default:
            break;
        }

        return "<th class=\"text-center {$class}\">{$name}</td>";
    }
}


if (!function_exists('settings')) {
    function settings()
    {
        return App\Helpers\Settings::getInstance();
    }
}

if (!function_exists('version')) {
    function version()
    {
        return 'v1.1-dev';
    }
}
