<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Hotels
 *
 * @author George-pc
 */
class Hotels extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('hotel_model');
        $this->load->model('language_model');
        $this->load->model('package_model');
        $this->load->model('facility_model');
        $this->load->model('location_model');
    }

    public function index() {
        $this->showHotels();
    }

    public function showHotels() {
        $hotels = $this->hotel_model->getHotels();
        $this->view_data['hotels'] = $hotels;
        $this->load->admintemplate('backend/hotels/hotels_view', $this->view_data);
    }

    public function addHotel() {
        $this->form_validation->set_rules('hotel_name', 'Hotel Name', 'required|trim');
        $this->form_validation->set_rules('stars', 'Stars', 'required|trim');
        $languages = $this->language_model->getLanguages();
        if (!$languages || empty($languages)) {
            $this->session->set_flashdata('error', 'You need to add at least one language in order to add a hotel');
            redirect($this->admin_url . 'languages');
        }

        $packages = $this->package_model->getPackages();
        if (!$packages || empty($packages)) {
            $this->session->set_flashdata('error', 'You need to add at least one package in order to add a hotel');
            redirect($this->admin_url . 'packages');
        }

        $facilities = $this->facility_model->getFacilities();
        if (!$facilities || empty($facilities)) {
            $this->session->set_flashdata('error', 'You need to add at least one facility in order to add a hotel');
            redirect($this->admin_url . 'facilities');
        }

        $locations = $this->location_model->getLocations();
        if (!$locations || empty($locations)) {
            $this->session->set_flashdata('error', 'You need to add at least one location in order to add a hotel');
            redirect($this->admin_url . 'locations');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->view_data['languages'] = $languages;
            $this->view_data['packages'] = $packages;
            $this->view_data['facilities'] = $facilities;
            $this->view_data['locations'] = $locations;
            $this->load->admintemplate('backend/hotels/add_hotel_view', $this->view_data);
        } else {
            $hotel_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['hotel_short_description'] = $this->input->post('hotel_short_description_' . $language['lang_id']);
                $temp['hotel_long_description'] = $this->input->post('hotel_long_description_' . $language['lang_id']);
                $temp['hotel_seo_title'] = $this->input->post('hotel_seo_title_' . $language['lang_id']);
                $temp['hotel_seo_meta_description'] = $this->input->post('hotel_seo_meta_description_' . $language['lang_id']);
                $temp['hotel_seo_keywords'] = $this->input->post('hotel_seo_keywords_' . $language['lang_id']);
                $temp['hotel_friendly_url'] = $this->input->post('hotel_friendly_url_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($hotel_locale, $temp);
            }
            $hotelData['hotel_name'] = $this->input->post('hotel_name');
            $hotelData['stars'] = $this->input->post('stars');
            $hotelData['distance_from_sea'] = $this->input->post('distance_from_sea');
            $hotelData['distance_from_center'] = $this->input->post('distance_from_center');
            $hotelData['minimum_stay'] = $this->input->post('minimum_stay');
            $hotelData['location_id'] = $this->input->post('location_id');
            $hotelData['longitude'] = $this->input->post('longitude');
            $hotelData['latitude'] = $this->input->post('latitude');
            $hotelData['package_id'] = $this->input->post('package_id');
            $hotelData['hotel_active'] = $this->input->post('hotel_active');
            $hotelData['hotel_featured'] = $this->input->post('hotel_featured');

            $hotelFacilities = $this->input->post('facilities');
            
            
            $hotel_id = $this->hotel_model->addHotel($hotelData);

            if ($hotel_id && is_numeric($hotel_id)) {
                $addHotelFacilities = array();
                $addHotelFacilities['hotel_id'] = $hotel_id;
                foreach ($hotelFacilities as $h_f) {
                    
                    $addHotelFacilities['facility_id'] = $h_f['facility_id'];
                    $addHotelFacilities['is_main'] = 0;

                    $this->hotel_model->addHotelFacilities($addHotelFacilities);
                }
                foreach ($hotel_locale as $h_l_key => $h_l) {
                    $hotel_locale[$h_l_key]['hotel_id'] = $hotel_id;
                    $this->hotel_model->addHotelLocale($hotel_locale[$h_l_key]);
                }
                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'hotels/editHotel/'. $hotel_id);
        }
    }

    public function editHotel() {
        $this->form_validation->set_rules('hotel_name', 'Hotel Name', 'required|trim');
        $this->form_validation->set_rules('stars', 'Stars', 'required|trim');
        $languages = $this->language_model->getLanguages();
        $packages = $this->package_model->getPackages();
        $facilities = $this->facility_model->getFacilities();

        if ($this->form_validation->run() == FALSE) {
            $hotelId = $this->uri->segment(4);
            $hotelData = $this->hotel_model->getHotel($hotelId);
            $packages = $this->package_model->getPackages();
            $facilities = $this->facility_model->getFacilities();
            $hotelFacilities = $this->hotel_model->getHotelFacilities($hotelId);
            $locations = $this->location_model->getLocations();

            $hfarr = array();
            $hfarrMain = array();
            if ($hotelFacilities && !empty($hotelFacilities)) {
                foreach ($hotelFacilities as $hf) {
                    array_push($hfarr, $hf['facility_id']);
                    if ($hf['is_main'] == 1) {
                        array_push($hfarrMain, $hf['facility_id']);
                    }
                }
            }

            $tempHotelLocales = $this->hotel_model->getHotelLocales($hotelId);
            $hotelLocales = array();
            foreach ($tempHotelLocales as $h_l_key => $h_l) {
                $hotelLocales[$h_l['lang_id']] = $h_l;
            }
            $this->view_data['hotel'] = $hotelData;
            $this->view_data['hotelLocale'] = $hotelLocales;
            $this->view_data['languages'] = $languages;
            $this->view_data['packages'] = $packages;
            $this->view_data['facilities'] = $facilities;
            $this->view_data['hotelFacilities'] = $hfarr;
            $this->view_data['hotelFacilitiesMain'] = $hfarrMain;
            $this->view_data['locations'] = $locations;

            $this->load->admintemplate('backend/hotels/edit_hotel_view', $this->view_data);
        } else {
            $hotel_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['hotel_short_description'] = $this->input->post('hotel_short_description_' . $language['lang_id']);
                $temp['hotel_long_description'] = $this->input->post('hotel_long_description_' . $language['lang_id']);
                $temp['hotel_seo_title'] = $this->input->post('hotel_seo_title_' . $language['lang_id']);
                $temp['hotel_seo_meta_description'] = $this->input->post('hotel_seo_meta_description_' . $language['lang_id']);
                $temp['hotel_seo_keywords'] = $this->input->post('hotel_seo_keywords_' . $language['lang_id']);
                $temp['hotel_friendly_url'] = $this->input->post('hotel_friendly_url_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($hotel_locale, $temp);
            }

            $hotelId = $this->input->post('hotel_id');
            $hotelData['hotel_id'] = $hotelId;
            $hotelData['hotel_name'] = $this->input->post('hotel_name');
            $hotelData['stars'] = $this->input->post('stars');
            $hotelData['distance_from_sea'] = $this->input->post('distance_from_sea');
            $hotelData['distance_from_center'] = $this->input->post('distance_from_center');
            $hotelData['minimum_stay'] = $this->input->post('minimum_stay');
            $hotelData['location_id'] = $this->input->post('location_id');
            $hotelData['longitude'] = $this->input->post('longitude');
            $hotelData['latitude'] = $this->input->post('latitude');
            $hotelData['package_id'] = $this->input->post('package_id');
            $hotelData['hotel_active'] = $this->input->post('hotel_active');
            $hotelData['hotel_featured'] = $this->input->post('hotel_featured');

            $hotelFacilities = $this->input->post('facilities');

            $this->hotel_model->editHotel($hotelData);

            if ($hotelData['hotel_id'] && is_numeric($hotelData['hotel_id'])) {
                $this->hotel_model->deleteHotelFacilities($hotelData['hotel_id']);
                $addHotelFacilities = array();
                $addHotelFacilities['hotel_id'] = $hotelData['hotel_id'];
                foreach ($hotelFacilities as $h_f) {
                    $addHotelFacilities['facility_id'] = $h_f;
                    $addHotelFacilities['is_main'] = 0;
                    $this->hotel_model->addHotelFacilities($addHotelFacilities);
                }

                foreach ($hotel_locale as $h_l_key => $h_l) {
                    $hotel_locale[$h_l_key]['hotel_id'] = $hotelData['hotel_id'];
                    $this->hotel_model->editHotelLocale($hotel_locale[$h_l_key]);
                }
                $this->session->set_flashdata('message', 'Row updated');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'hotels/editHotel/'.$hotelData['hotel_id']);
        }
    }

    public function images() {
        // $this->load->library('imageResize');
        $hotel_id = $this->uri->segment(4);

        $this->form_validation->set_rules('images', 'File', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $hotel = $this->hotel_model->getHotel($hotel_id);

            $images = $this->hotel_model->getImages($hotel_id);
            $this->view_data['images'] = $images;
            $this->view_data['hotel'] = $hotel;
            $this->load->admintemplate('backend/hotels/hotel_images_view', $this->view_data);
        } else {

            $images = $this->hotel_model->getImages($hotel_id);
            if (isset($images) && !empty($images)) {
                foreach ($images as $image) {
                    $delete_file = NULL;
                    $delete_file = $this->input->post('delete_file_' . $image['hotel_image_id']);
                    if ($delete_file && !empty($delete_file) && $delete_file == 1) {
                        unlink($this->config->item('upload_dir') . $image['image_name']);
                        $this->hotel_model->deleteImage($image['hotel_image_id']);
                    }
                }
            }

            $is_thumb = NULL;
            $is_thumb = $this->input->post('is_thumb');
            if ($is_thumb && !empty($is_thumb)) {
                $this->hotel_model->setThumbImage($hotel_id, $is_thumb);
            }

            $files = array();
            foreach ($_FILES['images']['name'] as $num_key => $dummy) {
                foreach ($_FILES['images'] as $txt_key => $dummy) {
                    $files[$num_key][$txt_key] = $_FILES['images'][$txt_key][$num_key];
                }
            }
            $i = 0;
            foreach ($files as $file) {
                if ($file['error'] == 0) {
                    $original_file_name = $file['name'];
                    $file_name = $hotel_id . "_". strtotime(date("Y")) . "_" . basename(str_replace(" ", "_", $file['name']));
                    $target_dir = $this->config->item('upload_dir');
                    $target_file = $target_dir . $file_name;

                    if (move_uploaded_file($file['tmp_name'], $target_file)) {
                        
                        // $config['image_library'] = 'gd2';
                        // $config['source_image'] = $target_file;
                        // $config['create_thumb'] = FALSE;
                        // $config['maintain_ratio'] = TRUE;
                        // $config['width']         = 870;
                        // $config['height']       = 520;
                        
                        // $this->load->library('image_lib', $config);
                        
                        // if ( ! $this->image_lib->resize())
                        // {
                        //         var_dump( $this->image_lib->display_errors());
                        //         die();
                        // }
                        $imageData['hotel_id'] = $hotel_id;
                        $imageData['image_name'] = $file_name;
                        $imageData['image_original_name'] = $original_file_name;
                        $this->hotel_model->addImage($imageData);
                    }
                    $i++;
                }
            }

            redirect($this->admin_url . 'hotels/images/' . $hotel_id);
        }
    }

    public function deleteHotel() {
        $hotelId = $this->uri->segment(4);

        if ($hotelId && is_numeric($hotelId)) {
            if ($this->hotel_model->deleteHotel($hotelId)) {
                $this->session->set_flashdata('message', 'Row Deleted');
            } else {
                $this->session->set_flashdata('error', 'Row Locale Problem');
            }
        } else {
            $this->session->set_flashdata('error', 'Row Problem');
        }
        redirect($this->admin_url . 'hotels');
    }

}
