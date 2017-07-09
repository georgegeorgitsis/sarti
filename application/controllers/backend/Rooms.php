<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rooms
 *
 * @author George-pc
 */
class Rooms extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('room_model');
        $this->load->model('language_model');
        $this->load->model('hotel_model');
        $this->load->model('package_model');
        $this->load->model('facility_model');
        $this->load->model('board_model');
    }

    public function index() {
        $this->showRooms();
    }

    public function showRooms() {
        $rooms = $this->room_model->getRooms();
        $this->view_data['rooms'] = $rooms;
        $this->load->admintemplate('backend/rooms/rooms_view', $this->view_data);
    }

    public function addRoom() {
        $this->form_validation->set_rules('room_name', 'Room Name', 'required|trim');
        $this->form_validation->set_rules('package_id', 'Room Package', 'required|trim');
        $this->form_validation->set_rules('room_type_id', 'Room Type', 'required|trim');
        $this->form_validation->set_rules('min_adults', 'Min Adults', 'required|trim');
        $this->form_validation->set_rules('max_adults', 'Max Adults', 'required|trim');

        $languages = $this->language_model->getLanguages();
        if (!$languages || empty($languages)) {
            $this->session->set_flashdata('error', 'You need to add at least one language in order to add a room');
            redirect($this->admin_url . 'languages');
        }

        $packages = $this->package_model->getPackages();
        if (!$packages || empty($packages)) {
            $this->session->set_flashdata('error', 'You need to add at least one package in order to add a room');
            redirect($this->admin_url . 'packages');
        }

        $facilities = $this->facility_model->getFacilities();
        if (!$facilities || empty($facilities)) {
            $this->session->set_flashdata('error', 'You need to add at least one facility in order to add a room');
            redirect($this->admin_url . 'facilities');
        }

        $roomTypes = $this->room_model->getRoomTypes();
        if (!$roomTypes || empty($roomTypes)) {
            $this->session->set_flashdata('error', 'You need to add at least one room type in order to add a room');
            redirect($this->admin_url . 'rooms/addRoomType');
        }

        $boards = $this->board_model->getBoards();
        if (!$boards || empty($boards)) {
            $this->session->set_flashdata('error', 'You need to add at least one board in order to add a room');
            redirect($this->admin_url . 'boards/addBoard');
        }

        $groundPlans = $this->room_model->getGroundPlans();

        if ($this->form_validation->run() == FALSE) {
            $hotelId = $this->uri->segment(4);
            if (!$hotelId || !is_numeric($hotelId)) {
                $this->session->set_flashdata('error', 'No hotel selected');
                redirect($this->admin_url . 'hotels');
            }

            $hotel = $this->hotel_model->getHotel($hotelId);
            if (!$hotel || empty($hotel)) {
                $this->session->set_flashdata('error', 'You need to add at least one hotel in order to add a room');
                redirect($this->admin_url . 'hotels');
            }

            $this->view_data['languages'] = $languages;
            $this->view_data['packages'] = $packages;
            $this->view_data['facilities'] = $facilities;
            $this->view_data['boards'] = $boards;
            $this->view_data['roomTypes'] = $roomTypes;
            $this->view_data['hotel'] = $hotel;
            $this->view_data['hotel_id'] = $hotelId;
            $this->view_data['hotel_package_id'] = $hotel['package_id'];
            $this->view_data['ground_plans'] = $groundPlans;

            $hotelFacilities = $this->hotel_model->getHotelFacilities($hotelId);
            $hfarr = array();
            if ($hotelFacilities && !empty($hotelFacilities)) {
                foreach ($hotelFacilities as $hf) {
                    array_push($hfarr, $hf['facility_id']);
                }
            }

            $this->view_data['hotelFacilities'] = $hfarr;
            $this->load->admintemplate('backend/rooms/add_room_view', $this->view_data);
        } else {
            $room_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['room_short_description'] = $this->input->post('room_short_description_' . $language['lang_id']);
                $temp['room_description'] = $this->input->post('room_description_' . $language['lang_id']);
                $temp['room_seo_title'] = $this->input->post('room_seo_title_' . $language['lang_id']);
                $temp['room_seo_meta_description'] = $this->input->post('room_seo_meta_description_' . $language['lang_id']);
                $temp['room_seo_keywords'] = $this->input->post('room_seo_keywords_' . $language['lang_id']);
                $temp['room_friendly_url'] = $this->input->post('room_friendly_url_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($room_locale, $temp);
            }
            $roomData['hotel_id'] = $this->input->post('hotel_id');
            $roomData['room_name'] = $this->input->post('room_name');
            $roomData['room_type_id'] = $this->input->post('room_type_id');
            $roomData['board_id'] = $this->input->post('board_id');
            $roomData['floor'] = $this->input->post('floor');
            $roomData['room_package_id'] = $this->input->post('package_id');
            $roomData['min_adults'] = $this->input->post('min_adults');
            $roomData['max_adults'] = $this->input->post('max_adults');
            $roomData['sea_view'] = $this->input->post('sea_view');
            $roomData['room_active'] = $this->input->post('room_active');
            $roomData['room_featured'] = $this->input->post('room_featured');
            $groundPlan = $this->input->post('ground_plan');
            if ($groundPlan != NULL)
                $roomData['ground_plan_id'] = $groundPlan;
            $roomFacilities = $this->input->post('facilities');

            /*
              if ($_FILES['room_thumb']['error'] == 0) {
              $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["room_thumb"]["name"]);
              $target_file = $this->upload_dir . $image_name;
              $uploadOk = 1;
              $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

              if ($_FILES["room_thumb"]["size"] > 500000) {
              $uploadOk = 0;
              }
              if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
              $uploadOk = 0;
              }
              if ($uploadOk == 0) {

              } else {
              if (move_uploaded_file($_FILES["room_thumb"]["tmp_name"], $target_file)) {
              $roomData['room_thumb'] = $image_name;
              }
              }
              }
             * 
             */
            $room_id = $this->room_model->addRoom($roomData);

            if ($room_id && is_numeric($room_id)) {
                $addRoomFacilities = array();
                $addRoomFacilities['room_id'] = $room_id;
                foreach ($roomFacilities as $h_f_key => $h_f) {
                    $addRoomFacilities['facility_id'] = $h_f['facility_id'];
                    $this->room_model->addRoomFacilities($addRoomFacilities);
                }

                foreach ($room_locale as $r_l_key => $r_l) {
                    $room_locale[$r_l_key]['room_id'] = $room_id;
                    $this->room_model->addRoomLocale($room_locale[$r_l_key]);
                }
                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'rooms');
        }
    }

    public function editRoom() {
        $this->form_validation->set_rules('room_name', 'Room Name', 'required|trim');
        $this->form_validation->set_rules('package_id', 'Room Package', 'required|trim');
        $this->form_validation->set_rules('room_type_id', 'Room Type', 'required|trim');
        $this->form_validation->set_rules('min_adults', 'Min Adults', 'required|trim');
        $this->form_validation->set_rules('max_adults', 'Max Adults', 'required|trim');
        $languages = $this->language_model->getLanguages();

        $facilities = $this->facility_model->getFacilities();
        if (!$facilities || empty($facilities)) {
            $this->session->set_flashdata('error', 'You need to add at least one facility in order to add a room');
            redirect($this->admin_url . 'facilities');
        }

        $packages = $this->package_model->getPackages();
        if (!$packages || empty($packages)) {
            $this->session->set_flashdata('error', 'You need to add at least one package in order to add a room');
            redirect($this->admin_url . 'packages');
        }

        $roomTypes = $this->room_model->getRoomTypes();
        if (!$roomTypes || empty($roomTypes)) {
            $this->session->set_flashdata('error', 'You need to add at least one room type in order to add a room');
            redirect($this->admin_url . 'rooms/addRoomType');
        }

        $boards = $this->board_model->getBoards();
        if (!$boards || empty($boards)) {
            $this->session->set_flashdata('error', 'You need to add at least one board in order to add a room');
            redirect($this->admin_url . 'boards/addBoard');
        }

        $groundPlans = $this->room_model->getGroundPlans();

        if ($this->form_validation->run() == FALSE) {
            $roomId = $this->uri->segment(4);
            $roomData = $this->room_model->getRoom($roomId);
            $tempRoomLocales = $this->room_model->getRoomLocales($roomId);
            $roomLocales = array();
            foreach ($tempRoomLocales as $r_l_key => $r_l) {
                $roomLocales[$r_l['lang_id']] = $r_l;
            }

            $roomFacilities = $this->room_model->getRoomFacilities($roomId);
            $hfarr = array();
            if ($roomFacilities && !empty($roomFacilities)) {
                foreach ($roomFacilities as $hf) {
                    array_push($hfarr, $hf['facility_id']);
                }
            }

            $this->view_data['roomFacilities'] = $hfarr;
            $this->view_data['room_id'] = $roomId;
            $this->view_data['room'] = $roomData;
            $this->view_data['roomLocale'] = $roomLocales;
            $this->view_data['languages'] = $languages;
            $this->view_data['facilities'] = $facilities;
            $this->view_data['boards'] = $boards;
            $this->view_data['packages'] = $packages;
            $this->view_data['roomTypes'] = $roomTypes;
            $this->view_data['ground_plans'] = $groundPlans;

            $this->load->admintemplate('backend/rooms/edit_room_view', $this->view_data);
        } else {
            $room_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['room_short_description'] = $this->input->post('room_short_description_' . $language['lang_id']);
                $temp['room_description'] = $this->input->post('room_description_' . $language['lang_id']);
                $temp['room_seo_title'] = $this->input->post('room_seo_title_' . $language['lang_id']);
                $temp['room_seo_meta_description'] = $this->input->post('room_seo_meta_description_' . $language['lang_id']);
                $temp['room_seo_keywords'] = $this->input->post('room_seo_keywords_' . $language['lang_id']);
                $temp['room_friendly_url'] = $this->input->post('room_friendly_url_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($room_locale, $temp);
            }

            $roomData['room_id'] = $this->input->post('room_id');
            $roomData['room_name'] = $this->input->post('room_name');
            $roomData['room_type_id'] = $this->input->post('room_type_id');
            $roomData['board_id'] = $this->input->post('board_id');
            $roomData['floor'] = $this->input->post('floor');
            $roomData['room_package_id'] = $this->input->post('package_id');
            $roomData['min_adults'] = $this->input->post('min_adults');
            $roomData['max_adults'] = $this->input->post('max_adults');
            $roomData['sea_view'] = $this->input->post('sea_view');
            $roomData['room_active'] = $this->input->post('room_active');
            $roomData['room_featured'] = $this->input->post('room_featured');
            $groundPlan = $this->input->post('ground_plan');
            if ($groundPlan != NULL)
                $roomData['ground_plan_id'] = $groundPlan;

            $roomFacilities = $this->input->post('facilities');

            /*
              if ($_FILES['room_thumb']['error'] == 0) {
              $roomData = $this->room_model->getRoom($hotelId);
              unlink($this->upload_dir . $roomData['room_thumb']);
              $image_name = strtotime(date('Y-m-d H:i:s')) . "_" . basename($_FILES["room_thumb"]["name"]);
              $target_file = $this->upload_dir . $image_name;
              $uploadOk = 1;
              $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

              if ($_FILES["room_thumb"]["size"] > 500000) {
              $uploadOk = 0;
              }
              if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
              $uploadOk = 0;
              }
              if ($uploadOk == 0) {

              } else {
              if (move_uploaded_file($_FILES["room_thumb"]["tmp_name"], $target_file)) {
              $roomData['room_thumb'] = $image_name;
              }
              }
              }
             * 
             */

            $this->room_model->editRoom($roomData);

            if ($roomData['room_id'] && is_numeric($roomData['room_id'])) {
                $this->room_model->deleteRoomFacilities($roomData['room_id']);
                $addRoomFacilities = array();
                $addRoomFacilities['room_id'] = $roomData['room_id'];
                foreach ($roomFacilities as $h_f_key => $h_f) {
                    $addRoomFacilities['facility_id'] = $h_f['facility_id'];
                    $this->room_model->addRoomFacilities($addRoomFacilities);
                }

                foreach ($room_locale as $r_l_key => $r_l) {
                    $room_locale[$r_l_key]['room_id'] = $roomData['room_id'];
                    $this->room_model->editRoomLocale($room_locale[$r_l_key]);
                }
                $this->session->set_flashdata('message', 'Row updated');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'rooms');
        }
    }

    public function deleteRoom() {
        $roomId = $this->uri->segment(4);

        if ($roomId && is_numeric($roomId)) {
            if ($this->room_model->deleteRoom($roomId)) {
                $this->session->set_flashdata('message', 'Row Deleted');
            } else {
                $this->session->set_flashdata('error', 'Row Problem');
            }
        } else {
            $this->session->set_flashdata('error', 'Row Problem');
        }
        redirect($this->admin_url . 'rooms');
    }

    public function addRoomPrices() {
        $this->form_validation->set_rules('room_id', 'Room ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $roomId = $this->uri->segment(4);
            $room = $this->room_model->getRoom($roomId);
            $packagePeriods = $this->package_model->getPeriodsPerPackage($room['package_id']);
            $packageInfo = $this->package_model->getPackage($room['package_id']);
            if ($packageInfo['package_days'] > 1) {
                $this->view_data['room'] = $room;
                $this->view_data['room_id'] = $roomId;
                $this->view_data['package_periods'] = $packagePeriods;
                $this->load->admintemplate('backend/rooms/add_period_prices_view', $this->view_data);
            }
        } else {
            $addPeriodPrice = array();
            $addPeriodPrice['room_id'] = $this->input->post('room_id');
            $room = $this->room_model->getRoom($addPeriodPrice['room_id']);
            $packagePeriods = $this->package_model->getPeriodsPerPackage($room['package_id']);
            $packageInfo = $this->package_model->getPackage($room['package_id']);

            if ($packageInfo['package_days'] > 1) {
                foreach ($packagePeriods as $packagePeriod) {
                    $packagePeriodId = $packagePeriod['package_period_id'];
                    $price = trim($this->input->post('price_' . $packagePeriodId));
                    if ($price && $price != "" && $price != 0) {
                        $addPeriodPrice['price'] = $price;
                        $addPeriodPrice['package_period_id'] = $packagePeriodId;
                        $this->room_model->addRoomPriceForPeriod($addPeriodPrice);
                    }
                }
            }
            $this->session->set_flashdata('message', 'Row Insert');
            redirect($this->admin_url . 'rooms');
        }
    }

    public function editRoomPrices() {
        $this->form_validation->set_rules('room_id', 'Room ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $roomId = $this->uri->segment(4);
            $room = $this->room_model->getRoom($roomId);

            $packagePeriods = $this->package_model->getPeriodsPerPackage($room['room_package_id']);
            $packageInfo = $this->package_model->getPackage($room['room_package_id']);

            if ($packagePeriods && !empty($packagePeriods)) {
                foreach ($packagePeriods as $pp_key => $pp) {
                    $packagePeriodId = $pp['package_period_id'];
                    $packagePeriodNew[$packagePeriodId] = $pp;
                    for ($i = $room['min_adults']; $i <= $room['max_adults']; $i++) {
                        $savedPeriods = $this->room_model->getRoomPeriodPrices($roomId, $packagePeriodId, $i);

                        if ($savedPeriods && !empty($savedPeriods)) {
                            $packagePeriodNew[$packagePeriodId]['prices'][$i]['adults'] = $i;
                            $packagePeriodNew[$packagePeriodId]['prices'][$i]['price'] = $savedPeriods['price'];

                            $packagePeriodNew[$packagePeriodId]['extras']['special_offer'] = $savedPeriods['special_offer'];
                            $packagePeriodNew[$packagePeriodId]['extras']['early_booking'] = $savedPeriods['early_booking'];
                            $packagePeriodNew[$packagePeriodId]['extras']['early_booking_until'] = $savedPeriods['early_booking_until'];
                            $packagePeriodNew[$packagePeriodId]['extras']['is_active'] = $savedPeriods['is_active'];
                        } else {
                            $packagePeriodNew[$packagePeriodId]['prices'][$i]['adults'] = $i;
                            $packagePeriodNew[$packagePeriodId]['prices'][$i]['price'] = 0;
                            $packagePeriodNew[$packagePeriodId]['extras']['special_offer'] = 0;
                            $packagePeriodNew[$packagePeriodId]['extras']['early_booking'] = 0;
                            $packagePeriodNew[$packagePeriodId]['extras']['early_booking_until'] = 0;
                            $packagePeriodNew[$packagePeriodId]['extras']['is_active'] = 0;
                        }
                    }
                }
            } else {
                $this->session->set_flashdata('error', "There are no periods for selected package. Please add periods");
                redirect($this->admin_url . 'packages/showPackagePeriods');
            }

            $this->view_data['room'] = $room;
            $this->view_data['room_id'] = $roomId;
            $this->view_data['package_periods'] = $packagePeriods;
            $this->view_data['package_periods_new'] = $packagePeriodNew;
            $this->load->admintemplate('backend/rooms/edit_period_prices_view', $this->view_data);
        } else {

            $room_id = $this->input->post('room_id');
            $room = $this->room_model->getRoom($room_id);
            $packagePeriods = $this->package_model->getPeriodsPerPackage($room['room_package_id']);

            $insertData = array();
            if ($packagePeriods && !empty($packagePeriods)) {
                foreach ($packagePeriods as $key => $val) {
                    $this->room_model->deleteRoomPrices($room_id, $val['package_period_id']);
                    for ($i = $room['min_adults']; $i <= $room['max_adults']; $i++) {
                        $insertData = array();
                        $insertData['room_id'] = $room_id;
                        $insertData['package_period_id'] = $val['package_period_id'];
                        $insertData['adults'] = $i;
                        $insertData['price'] = $this->input->post('price_' . $val['package_period_id'] . '_' . $i);
                        $insertData['special_offer'] = $this->input->post('special_offer_' . $val['package_period_id']);
                        $insertData['early_booking'] = $this->input->post('early_booking_' . $val['package_period_id']);
                        $insertData['early_booking_until'] = $this->input->post('early_booking_until_' . $val['package_period_id']);
                        $insertData['is_active'] = $this->input->post('is_active_' . $val['package_period_id']);

                        $this->room_model->addRoomPriceForPeriod($insertData);
                    }
                }
            }

            $this->session->set_flashdata('message', "Rows Updated");
            redirect($this->admin_url . 'rooms/editRoomPrices/' . $room_id);
        }
    }

    public function showRoomTypes() {
        $roomTypes = $this->room_model->getRoomTypes();
        $this->view_data['roomTypes'] = $roomTypes;
        $this->load->admintemplate('backend/rooms/room_types_view', $this->view_data);
    }

    public function addRoomType() {
        $this->form_validation->set_rules('room_type_name', 'Room Type name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->admintemplate('backend/rooms/add_room_type_view', $this->view_data);
        } else {
            $roomTypeData['room_type_name'] = $this->input->post('room_type_name');

            if ($this->room_model->addRoomType($roomTypeData)) {
                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'rooms/showRoomTypes');
        }
    }

    public function editRoomType() {
        $this->form_validation->set_rules('room_type_name', 'Room Type name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $roomTypeId = $this->uri->segment(4);
            $roomTypeData = $this->room_model->getRoomType($roomTypeId);
            $this->view_data['roomType'] = $roomTypeData;
            $this->load->admintemplate('backend/rooms/edit_room_type_view', $this->view_data);
        } else {
            $roomTypeData['room_type_id'] = $this->input->post('room_type_id');
            $roomTypeData['room_type_name'] = $this->input->post('room_type_name');

            if ($this->room_model->editRoomType($roomTypeData)) {
                $this->session->set_flashdata('message', 'Row updated');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'rooms/showRoomTypes');
        }
    }

    public function deleteRoomType() {
        $roomTypeId = $this->uri->segment(4);

        if ($this->room_model->deleteRoomType($roomTypeId)) {
            $this->session->set_flashdata('message', 'Room Type deleted');
        } else {
            $this->session->set_flashdata('error', 'There was an error and we couldn\'t delete the language');
        }

        redirect($this->admin_url . 'rooms/showRoomTypes');
    }

    public function groundPlans() {
        $this->form_validation->set_rules('images', 'File', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $groundPlans = $this->room_model->getGroundPlans();
            $this->view_data['images'] = $groundPlans;
            $this->load->admintemplate('backend/rooms/ground_plans_view', $this->view_data);
        } else {
            $images = $this->room_model->getGroundPlans();
            if (isset($images) && !empty($images)) {
                foreach ($images as $image) {
                    $delete_file = NULL;
                    $delete_file = $this->input->post('delete_file_' . $image['ground_plan_id']);
                    if ($delete_file && !empty($delete_file) && $delete_file == 1) {
                        unlink($this->config->item('upload_dir') . $image['ground_plan_image']);
                        $this->room_model->deleteGroundPlan($image['ground_plan_id']);
                    }
                }
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
                    $file_name = $i . "_" . strtotime(date("d-m-Y")) . "_" . basename(str_replace(" ", "_", $file['name']));
                    $target_dir = $this->config->item('upload_dir');
                    $target_file = $target_dir . $file_name;

                    if (move_uploaded_file($file['tmp_name'], $target_file)) {
                        $imageData['ground_plan_image'] = $file_name;
                        $imageData['ground_plan_original_image'] = $original_file_name;
                        $this->room_model->addGroundPlan($imageData);
                    }
                    $i++;
                }
            }

            redirect($this->admin_url . 'rooms/groundPlans/');
        }
    }

    public function images() {
        $room_id = $this->uri->segment(4);

        $this->form_validation->set_rules('images', 'File', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $room = $this->room_model->getRoom($room_id);

            $images = $this->room_model->getImages($room_id);
            $this->view_data['images'] = $images;
            $this->view_data['room'] = $room;
            $this->load->admintemplate('backend/rooms/room_images_view', $this->view_data);
        } else {

            $images = $this->room_model->getImages($room_id);
            if (isset($images) && !empty($images)) {
                foreach ($images as $image) {
                    $delete_file = NULL;
                    $delete_file = $this->input->post('delete_file_' . $image['room_image_id']);
                    if ($delete_file && !empty($delete_file) && $delete_file == 1) {
                        unlink($this->config->item('upload_dir') . $image['image_name']);
                        $this->room_model->deleteImage($image['room_image_id']);
                    }
                }
            }

            $is_thumb = NULL;
            $is_thumb = $this->input->post('is_thumb');
            if ($is_thumb && !empty($is_thumb)) {
                $this->room_model->setThumbImage($is_thumb);
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
                    $file_name = $room_id . "_" . $i . "_" . strtotime(date("d-m-Y")) . "_" . basename(str_replace(" ", "_", $file['name']));
                    $target_dir = $this->config->item('upload_dir');
                    $target_file = $target_dir . $file_name;

                    if (move_uploaded_file($file['tmp_name'], $target_file)) {
                        $imageData['room_id'] = $room_id;
                        $imageData['image_name'] = $file_name;
                        $imageData['image_original_name'] = $original_file_name;
                        $this->room_model->addImage($imageData);
                    }
                    $i++;
                }
            }

            redirect($this->admin_url . 'rooms/images/' . $room_id);
        }
    }

}
