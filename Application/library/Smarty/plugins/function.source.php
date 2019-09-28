<?php
/**
 * Smarty plugin
 * @package    Smarty
 * @subpackage PluginsFunction
 * @author  Citybay
 * @return string
 */
function smarty_function_source( $params )
{
    $source = NULL;

    if(isset($params['js']) && $params['js'] != '')
    {
        $source = '/js/'.$params['js'];
    }
    elseif(isset($params['css']) && $params['css'] != '')
    {
        $source = '/css/'.$params['css'];
    }
    elseif(isset($params['img']) && $params['img'] != '')
    {
        $source = '/images/'.$params['img'];
    }

    $source = '/Front'.$source;
    return $source;
}