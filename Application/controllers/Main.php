<?php
use Logic\BaseController;

class MainController extends BaseController {

    private $req;
    private $view;

    public function init() {
        $this->req = $this->getRequest()->getRequest();
        $this->view = $this->getView();
        return 1;
    }

    public function IndexAction() {
        $this->redirect('/User');
        return 1;
    }

    public function testAction() {
        $mod = DbModel::Init();
        $ret = $mod->table('t_users')
                ->page(1, 5);
        print_r($ret);
    }

}
