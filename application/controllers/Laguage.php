<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Language
 *
 * @author AthanD
 */
class Language extends MY_F_Controller {

    protected $lang_abbr;

    public function __construct() {
        parent::__construct();
        $this->load->model('language_model');
        $this->lang_abbr = $this->uri->segment(2);
    }

    // public function changeLang(){
    //     if(isset($this->lang_abbr)){

    //     }
    // }
}

