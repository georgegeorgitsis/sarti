<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Facilities
 *
 * @author George-pc
 */
class Facilities extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('facility_model');
        $this->load->model('language_model');
    }

    public function index() {
        $this->showFacilities();
    }

    public function categories(){
        $categories = $this->facility_model->getCategories();
        $this->view_data['categories'] = $categories;
        $this->load->admintemplate('backend/facilities/categories_view', $this->view_data);
    }
    public function addCategory() {
        $this->form_validation->set_rules('category', 'Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->admintemplate('backend/facilities/add_category', $this->view_data);
        } 
        else {
            $category['description'] = $this->input->post('category');

            $id = $this->facility_model->addCategory($category);
            if ($id && is_numeric($id)) {
                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'facilities/editCategory/'. $id);
        }
    }
    public function editCategory() {
        $this->form_validation->set_rules('category', 'Facility Type', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->uri->segment(4);
            $category = $this->facility_model->getCategory($id);

            $this->view_data['category'] = $category;
            $this->load->admintemplate('backend/facilities/edit_category', $this->view_data);
        } else {
            $id = $this->input->post('id');
            $category['id'] = $id;
            $category['description'] = $this->input->post('category');


            $this->facility_model->editCategory($category);

            if ($category['id'] && is_numeric($category['id'])) {
                $this->session->set_flashdata('message', 'Row updated');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'facilities/editCategory/'. $category['id']);
        }
    }
    public function deleteCategory() {
        $id = $this->uri->segment(4);

        if ($id && is_numeric($id)) {
            if ($this->facility_model->deleteCategory($id)) {
                $this->session->set_flashdata('message', 'Row Deleted');
            } else {
                $this->session->set_flashdata('error', 'Row Locale Problem');
            }
        } else {
            $this->session->set_flashdata('error', 'Row Problem');
        }
        redirect($this->admin_url . 'facilities/categories');
    }


    public function showFacilities() {
        $facilities = $this->facility_model->getFacilitiesOnly();
        $this->view_data['facilities'] = $facilities;
        // var_dump($facilities);
        // die();
        $this->load->admintemplate('backend/facilities/facilities_view', $this->view_data);
    }

    public function addFacility() {
        $this->form_validation->set_rules('facility_type', 'Facility Type', 'required|trim');
        $languages = $this->language_model->getLanguages();

        if (!$languages || empty($languages)) {
            $this->session->set_flashdata('error', 'You need to add at least one language in order to add facilities');
            redirect($this->admin_url . 'languages');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->view_data['languages'] = $languages;
            $this->view_data['categories'] = $this->facility_model->getCategories();
            $this->load->admintemplate('backend/facilities/add_facility_view', $this->view_data);
        } else {
            $facility_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['facility_name'] = $this->input->post('facility_name_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($facility_locale, $temp);
            }
            $facilityData['facility_type'] = $this->input->post('facility_type');

            if ($_FILES['facility_icon']['error'] == 0) {
                $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["facility_icon"]["name"]);
                $target_file = $this->upload_dir ."facilities/". $image_name;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["facility_icon"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    
                } else {
                    if (move_uploaded_file($_FILES["facility_icon"]["tmp_name"], $target_file)) {
                        $facilityData['facility_icon'] = $image_name;
                    }
                }
            }

            $fac_order = $this->input->post('order');
            if(isset($fac_order) && $fac_order >= 0){
                $facilityData['order'] = $fac_order;
            }

            $category_id = $this->input->post('category_id');
            if(isset($category_id) && $category_id != 0){
                $facilityData['category_id'] = $category_id;
            }
            $is_main = $this->input->post('is_main');
            if(isset($is_main) && $is_main == "on"){
                $facilityData['is_main'] = 1;
            }
            $fac_main_order = $this->input->post('main_order');
            if(isset($fac_main_order) && $fac_main_order >= 0){
                $facilityData['main_order'] = $fac_main_order;
            }
            
            
            $facility_id = $this->facility_model->addFacility($facilityData);

            if ($facility_id && is_numeric($facility_id)) {
                foreach ($facility_locale as $f_l_key => $f_l) {
                    $facility_locale[$f_l_key]['facility_id'] = $facility_id;
                    $this->facility_model->addFacilityLocale($facility_locale[$f_l_key]);
                }
                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'facilities/editFacility/'. $facility_id);
        }
    }

    public function editFacility() {
        $this->form_validation->set_rules('facility_type', 'Facility Type', 'required|trim');
        $languages = $this->language_model->getLanguages();

        if ($this->form_validation->run() == FALSE) {
            $facilityId = $this->uri->segment(4);
            $facilityData = $this->facility_model->getFacility($facilityId);
            $tempFacilityLocales = $this->facility_model->getFacilityLocales($facilityId);
            $facilityLocales = array();
            foreach ($tempFacilityLocales as $f_l_key => $f_l) {
                $facilityLocales[$f_l['lang_id']] = $f_l;
            }
            $this->view_data['facility'] = $facilityData;
            $this->view_data['facilityLocale'] = $facilityLocales;
            $this->view_data['categories'] = $this->facility_model->getCategories();
            $this->view_data['languages'] = $languages;
            $this->load->admintemplate('backend/facilities/edit_facility_view', $this->view_data);
        } else {
            $facility_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['facility_name'] = $this->input->post('facility_name_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($facility_locale, $temp);
            }

            $facilityId = $this->input->post('facility_id');
            $facilityData['facility_id'] = $facilityId;
            $facilityData['facility_type'] = $this->input->post('facility_type');

            if ($_FILES['facility_icon']['error'] == 0) {
                $facilityData = $this->facility_model->getFacility($facilityId);
                unlink($this->upload_dir . $facilityData['facility_icon']);
                $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["facility_icon"]["name"]);
                $target_file = $this->upload_dir . "facilities/" . $image_name;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                if ($_FILES["facility_icon"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    
                } else {
                    if (move_uploaded_file($_FILES["facility_icon"]["tmp_name"], $target_file)) {
                        $facilityData['facility_icon'] = $image_name;
                    }
                }
            }

            $fac_order = $this->input->post('order');
            if(isset($fac_order) && $fac_order >= 0){
                $facilityData['order'] = $fac_order;
            }

            $category_id = $this->input->post('category_id');
            if(isset($category_id) && $category_id != 0){
                $facilityData['category_id'] = $category_id;
            }
            $is_main = $this->input->post('is_main');
            if(isset($is_main) && $is_main == "on"){
                $facilityData['is_main'] = 1;
            }
            else{
                $facilityData['is_main'] = 0;
            }
            $fac_main_order = $this->input->post('main_order');
            if(isset($fac_main_order) && $fac_main_order >= 0){
                $facilityData['main_order'] = $fac_main_order;
            }

            $this->facility_model->editFacility($facilityData);

            if ($facilityData['facility_id'] && is_numeric($facilityData['facility_id'])) {
                foreach ($facility_locale as $f_l_key => $f_l) {
                    $facility_locale[$f_l_key]['facility_id'] = $facilityData['facility_id'];
                    $this->facility_model->editFacilityLocale($facility_locale[$f_l_key]);
                }
                $this->session->set_flashdata('message', 'Row updated');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'facilities/editFacility/'. $facilityData['facility_id']);
        }
    }

    public function deleteFacility() {
        $facilityId = $this->uri->segment(4);

        if ($facilityId && is_numeric($facilityId)) {
            if ($this->facility_model->deleteFacility($facilityId)) {
                $this->session->set_flashdata('message', 'Row Deleted');
            } else {
                $this->session->set_flashdata('error', 'Row Locale Problem');
            }
        } else {
            $this->session->set_flashdata('error', 'Row Problem');
        }
        redirect($this->admin_url . 'facilities');
    }

}
