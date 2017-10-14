<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Languages
 *
 * @author George-pc
 */
class Languages extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('language_model');
    }

    public function index() {
        $this->showLanguages();
    }

    public function addLanguage() {
        $this->form_validation->set_rules('lang_name', 'Languane name', 'required|trim');
        $this->form_validation->set_rules('lang_abbreviation', 'Language abbreviation', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->admintemplate('backend/languages/add_language_view', $this->view_data);
        } else {
            $languageData['lang_name'] = $this->input->post('lang_name');
            $languageData['lang_abbreviation'] = $this->input->post('lang_abbreviation');

            if ($_FILES['lang_icon']['error'] == 0) {
                $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["lang_icon"]["name"]);
                $target_file = $this->upload_dir ."/langs". $image_name;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["lang_icon"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $uploadOk = 0;
                }
                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["lang_icon"]["tmp_name"], $target_file)) {
                        $languageData['lang_icon'] = $image_name;
                    }
                }
            }
            
            $lang_id = $this->language_model->addLanguage($languageData);
            if ($lang_id) {
                //Vale se olous tous locale pinakes times
                $this->language_model->addToLocalesTables($lang_id);
                
                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'languages/showLanguages');
        }
    }

    public function showLanguages() {
        $languages = $this->language_model->getLanguages();
        $this->view_data['languages'] = $languages;
        $this->load->admintemplate('backend/languages/languages_view', $this->view_data);
    }

    public function deleteLanguage() {
        $langId = $this->uri->segment(4);
        $languageData = $this->language_model->getLanguage($langId);

        if ($languageData && !empty($languageData)) {
            unlink($this->upload_dir . $languageData['lang_icon']);
            if ($this->language_model->deleteLanguage($langId)) {
                $this->session->set_flashdata('message', 'Language deleted');
            } else {
                $this->session->set_flashdata('error', 'There was an error and we couldn\'t delete the language');
            }
            redirect($this->admin_url . 'languages');
        } else {
            $this->session->set_flashdata('error', 'There was an error and the system couldn\'t proccess your request');
            redirect($this->admin_url . 'languages');
        }
    }

    public function editLanguage() {
        $this->form_validation->set_rules('lang_id', 'Languane ID', 'required|trim');
        $this->form_validation->set_rules('lang_name', 'Languane name', 'required|trim');
        $this->form_validation->set_rules('lang_abbreviation', 'Language abbreviation', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $langId = $this->uri->segment(4);
            $languageData = $this->language_model->getLanguage($langId);
            $this->view_data['language'] = $languageData;
            $this->load->admintemplate('backend/languages/edit_language_view', $this->view_data);
        } else {
            $languageData['lang_id'] = $this->input->post('lang_id');
            $languageData['lang_name'] = $this->input->post('lang_name');
            $languageData['lang_abbreviation'] = $this->input->post('lang_abbreviation');

            if ($_FILES['lang_icon']['error'] == 0) {
                $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["lang_icon"]["name"]);
                $target_file = $this->upload_dir ."/langs". $image_name;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["lang_icon"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $uploadOk = 0;
                }
                if ($uploadOk == 1) {
                    $prevLang = $this->language_model->getLanguage($languageData['lang_id']);
                    unlink($this->upload_dir . $prevLang['lang_icon']);

                    if (move_uploaded_file($_FILES["lang_icon"]["tmp_name"], $target_file)) {
                        $languageData['lang_icon'] = $image_name;
                    }
                }
            }

            if ($this->language_model->editLanguage($languageData)) {
                $this->session->set_flashdata('message', 'Row updated');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'languages/showLanguages');
        }
    }

}
