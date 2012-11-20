<?php
class Ajax_post extends CI_Controller {
    function Ajax_post(){
        parent::__construct();
        $this -> load -> helper (array('url'));
    }

    function index(){
        $this -> load -> view ('ajax_post');
    }

    function post_function(){
        $result = array();
        if (($_POST['username'] == "") || ($_POST['password'] == "")){
             $result['message']    = "Please fill up blank fields";
             $result['bg_color']   = "#FFEBE8";
        }
        elseif (($_POST['username'] != "myusername") || ($_POST['password'] != "mypassword")){
            $result['message']    = "username & password do not match";
            $result['bg_color']   = "#FFEBE8";
        }
        else{
            $result['message']    = "Password & password matched";
            $result['bg_color']   = "#FFA";
        }
        echo json_encode($result);
    }
}
?>