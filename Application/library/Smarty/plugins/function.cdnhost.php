<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {cdnhost} function plugin
 * Type:     function<br>
 * Name:     cdnhost<br>
 *
 *
 * @param array                    $params   host
 *
 * @return string|NULL
 */
function smarty_function_cdnhost( $params )
{
    $host = '';
    if(isset($params['js']) && $params['js'] != ''){
        $host = 'js/'.$params['js'];
    } elseif(isset($params['css']) && $params['css'] != ''){
        $host = 'css/'.$params['css'];
    } elseif(isset($params['img']) && $params['img'] != ''){
        $host = 'images/'.$params['img'];
    } elseif(isset($params['host']) && $params['host'] != ''){
        $host = $params['host'];
    }
    $md5 = substr(md5($host.'cdn'), 0, 8);
    $subseed = 31;
    $hash = 0;
    for($i = 0; $i < 8; $i++){
        $hash = $hash * $subseed + ord($md5{$i});
        $i++;
    }
    $hash = $hash & 0x7FFFFFFF;
    $c = $hash % 6;
    $host = 'http://o3w-cdn'.$c.'.gbicdn.com/'.$host;
    return $host;
}


