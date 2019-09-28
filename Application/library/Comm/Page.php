<?php

namespace Comm;

/**
 *              PAGE核心类
 *             @version 1.0
 *             @date 2015-07-20
 *             citybay@163.com
 * @copyright 软著持有者 Citybay 禁止转载
 */
class Page {

    public $firstRow;       // 起始行数
    public $listRows;       // 列表每页显示行数
    public $parameter;      // 分页跳转时要带的参数
    public $totalRows;      // 总行数
    public $totalPages;     // 分页总页面数
    public $rollPage = 8;   // 分页栏每页显示的页数
    private $p = 'p';       // 分页参数名
    private $url = '';      // 当前链接URL
    private $nowPage = 1;

    /**
     * 架构函数
     * @param array $totalRows  总的记录数
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     */
    public function __construct($totalRows, $listRows = 10, $parameter = array()) {
        $this->p = 'p'; //设置分页参数名称
        /* 基础设置 */
        $this->totalRows = $totalRows; //设置总记录数
        $this->listRows = $listRows;  //设置每页显示行数
        $this->parameter = empty($parameter) ? $_GET : $parameter;
        $this->totalPages = ceil($this->totalRows / $this->listRows); //总页数
        $this->nowPage = (empty($_GET[$this->p]) || $_GET[$this->p] > $this->totalPages) ? 1 : intval($_GET[$this->p]);
        $this->nowPage = $this->nowPage > 0 ? $this->nowPage : 1;
        $this->firstRow = $this->listRows * ($this->nowPage - 1);
    }

    /**
     * 生成链接URL
     * @param  integer $page 页码
     * @return string
     */
    private function url($page) {
        $nowurl = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '?'));
        if (isset($this->parameter[$this->p])) {
            unset($this->parameter[$this->p]);
        }
        $this->parameter[$this->p] = $page;
        $this->url = $nowurl . '?' . http_build_query($this->parameter);
        return $this->url;
    }

    /**
     * 组装分页链接
     * @return string
     */
    public function show() {
        if (0 == $this->totalRows) {
            return NULL;
        }
        $this->parameter[$this->p] = 1;

        //总页数
        $this->totalPages = ceil($this->totalRows / $this->listRows);

        //禁止翻页超出
        if (!empty($this->totalPages) && $this->nowPage > $this->totalPages) {
            $this->nowPage = $this->totalPages;
        }

        /* 分页导航半数差 */
        $roll_half_page = ceil($this->rollPage / 2);

        //第一页
        $the_first = '<li><a href="' . $this->url(1) . '">首页</a></li>';

        //最后一页
        $the_end = '<li><a href="' . $this->url($this->totalPages) . '">尾页</a></li>';

        $out = NULL;

        //当前页面大于半数显示量的时候
        //if ($this->nowPage > $roll_half_page)
        $out .= '<li><a href="' . (($this->nowPage - 1) > 0 ? $this->url($this->nowPage - 1) : $this->url(1)) . '"><<<</a></li>';

        for ($i = 1; $i < $this->rollPage; $i++) {
            //当前页前面的半数
            if (($this->nowPage - ($roll_half_page - $i) > 0 ) && ($roll_half_page > $i)) {
                $out .= '<li><a href="' . $this->url($this->nowPage - ($roll_half_page - $i)) . '">' . ($this->nowPage - ($roll_half_page - $i)) . '</a></li>';
            }
            //当前页
            elseif ($roll_half_page == $i) {
                $out .= '<li class="active"><a href="' . $this->url($this->nowPage) . '">' . $this->nowPage . '</a></li>';
            }
            //当前页面之后的半数
            elseif (($i > $roll_half_page) && ($this->nowPage + $i - $roll_half_page <= $this->totalPages)) {
                $out .= '<li><a href="' . $this->url($this->nowPage + $i - $roll_half_page) . '">' . ($this->nowPage + $i - $roll_half_page) . '</a></li>';
            }
        }

        // 当前页面比半数页面还多的那些
        // if($this->nowPage + $roll_half_page <= $this->totalPages)
        $out .= '<li><a href="' . ($this->nowPage < $this->totalPages ? $this->url($this->nowPage + 1) : $this->url($this->totalPages)) . '">>>></a></li>';

        // 组合输出
        $result = '<div class="col-sm-7">
                      <ul class="pagination">
                       ' . $the_first . '
                       ' . $out . '
                       ' . $the_end . '
                      </ul>
                   </div>

                    <div class="space col-sm-5"></div>
                    <div class="clearfix col-sm-5">
                       <DIV class="col-sm center"> <span class="blue"> 共 <b>&nbsp;' . $this->totalRows . '&nbsp;</b>条/共<b>&nbsp;' . $this->totalPages . '&nbsp;</b>页&nbsp;&nbsp;到第</span>
                         <input type="text" style="width:50px;text-align:center;" id="jp_page" value="' . $this->nowPage . '" />
                         <span class = "blue">页</span>
	                 <input type="button" class="btn btn-sm" value="确定" id="do_change" />
                       </DIV>
                    </div> <script src = /Back/js/jquery.min.js></script> <script src = /Back/js/pages.js></script>';

        return $result;
    }

}
