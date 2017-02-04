<?php

if (!function_exists('create_level_tree')) {

    /**
     * 生成一维数组 HTML 层级树
     *
     * @param        $data
     * @param int $parent_id
     * @param int $level
     * @param string $html
     *
     * @return array
     */
    function create_level_tree($data, $parent_id = 0, $level = 0, $html = '-')
    {
        $tree = [ ];
        foreach ($data as $item) {
            if ($item[ 'parent_id' ] == $parent_id) {

                $item[ 'html' ] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level);
                $item[ 'html' ] .= $level === 0 ? "" : '|';
                $item[ 'html' ] .= str_repeat($html, $level);

                $tree[] = $item;
                $tree = array_merge($tree, create_level_tree($data, $item[ 'id' ], $level + 1));
            }
        }

        return $tree;
    }

    function create_node_tree($data, $parent_id = 0)
    {
        $tree = [ ];
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['child'] = create_node_tree($data, $item['id']);
                $tree[] = $item;
            }
        }

        return $tree;
    }
}