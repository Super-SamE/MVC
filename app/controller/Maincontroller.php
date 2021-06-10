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
            if(!empty($_POST)) {
                $a = $model->login($_POST['auth'], $_POST['login'], $_POST['password']);
            }

            /*if ($a==1) {
                header('Location: ?class=Maincontroller&option=Tasklist');
            } elseif ($a==2) {
                header('Location: ?class=Maincontroller&option=Tasklist');
            } elseif ($a==3) {
                header('Location: ?class=Maincontroller&option=Tasklist');
            }*/
 
            require_once 'app/view/formauth.php';
        }

        public function tasklist() {



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

 