<?php

    class Maincontroller {

        public function get_btn() {
            require_once 'app/view/btn.php';
        }
        
        protected $m;

        public function __construct() {
            $this->m = new model();
        }

        public function getformauth() {
            
            $model = new model();
            if(isset($_POST)) {
                $a = $model->login($_POST['auth'], $_POST['login'], $_POST['password']);
            }

            if ($a==1) {
                header('Location: ?class=Maincontroller&option=tasklist');
            } elseif ($a==2) {
                header('Location: ?class=Maincontroller&option=tasklist');
            } elseif ($a==3) {
                header('Location: ?class=Maincontroller&option=tasklist');
            }
            
            require_once 'app/view/formauth.php';
            
        }

        public function tasklist() {

            $list = new model();
            $list->addtasks($_SESSION['user']['id'], $_POST['nametask'], $_POST['addtask']);
            $list->ready($_GET['ready']);
            $list->remove($_GET['remove']);
            $list->delidtask($_GET['delidtask']);
            $list->readyall($_SESSION['user']['id'], $_POST['readyall']);
            $list->removeall($_SESSION['user']['id'], $_POST['removeall']);
            $out = $list->outtask($_SESSION['user']['id']);

            require_once 'app/view/tasklist.php';
        }

        public function logout() {
            $logout = $_POST['logout'];
            if (isset($_POST['logout'])) {
                session_unset();
                header('Location: ?class=Maincontroller');
            }
        }

    }

 