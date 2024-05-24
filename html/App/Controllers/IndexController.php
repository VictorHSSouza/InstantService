<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {
    
    public function Index() {
        $this->render('home','layout1');
    }
}

?>
