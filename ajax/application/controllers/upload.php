<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Upload extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this -> load -> model ('files_model');
            $this -> load -> database();
            $this -> load -> helper('url');
        }

        public function index(){
            $this -> load -> view ('upload');
        }

        public function upload_file(){
            $result             = array();
            $status             = "";
            $file_element_name  = "userfile";

            if (empty($_POST['title'])){
                $result['status']   = "error";
                $status             = "error";
                $result['message'] = "Please enter the title";
            }

            if ($status != "error"){

                $config['upload_path']      = "./files/";
                $config['allowed_types']    = "gif|jpg|png";
                $config['max_size']         = 1024 * 8;
                $config['encrypt_name']     = TRUE;
                $this -> load -> library('upload', $config);

                if (!$this -> upload -> do_upload($file_element_name)){
                    $result['status']       = "error";
                    $result['message']      = $this -> upload -> display_errors("", "");
                }
                else{
                    $data       = $this -> upload -> data();
                    $file_id    = $this -> file_model -> insert_file($data['file_name'], $_POST['title']);
                    if ($file_id){
                        $result['status']   = "succsess";
                        $result['message']  = "File succsessfully uploaded";
                    }
                    else{
                        unlink($data['full_path']);
                        $result['status']   = "error";
                        $result['message']  = "Something went wrong when saving the file, please try again";
                    }
                }
                @unlink($_FILES[$file_element_name]);
            }
            echo json_encode($result);
        }

        public function delete_file($file_id)
        {
            if ($this->files_model->delete_file($file_id))
            {
                $status = 'success';
                $msg = 'File successfully deleted';
            }
            else
            {
                $status = 'error';
                $msg = 'Something went wrong when deleteing the file, please try again';
            }
            echo json_encode(array('status' => $status, 'msg' => $msg));
        }
    }
?>