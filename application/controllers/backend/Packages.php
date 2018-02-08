<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Packages
 *
 * @author George-pc
 */
class Packages extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('package_model');
        $this->load->model('language_model');
    }

    public function index() {
        $this->showPackages();
    }

    public function showPackages() {
        $packages = $this->package_model->getPackages();
        $this->view_data['packages'] = $packages;
        $this->load->admintemplate('backend/packages/packages_view', $this->view_data);
    }

    public function addPackage() {
        $this->form_validation->set_rules('package_type', 'Package Type', 'required|trim');
        $this->form_validation->set_rules('is_package_type', 'Is Allotment', 'required|trim');
        $languages = $this->language_model->getLanguages();

        if (!$languages || empty($languages)) {
            $this->session->set_flashdata('error', 'You need to add at least one language in order to add packages');
            redirect($this->admin_url . 'languages');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->view_data['languages'] = $languages;
            $this->load->admintemplate('backend/packages/add_package_view', $this->view_data);
        } else {
            $packageData['package_type'] = $this->input->post('package_type');
            $packageData['is_package_type'] = $this->input->post('is_package_type');

            $packageData['early_booking'] = $this->input->post('early_booking');
            $packageData['early_booking_until'] = $this->input->post('early_booking_until');
            $packageData['eb_is_active'] = $this->input->post('eb_is_active');
            
            $package_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['package_name'] = $this->input->post('package_name_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($package_locale, $temp);
            }

            $packageId = $this->package_model->addPackage($packageData);

            if ($packageId && is_numeric($packageId)) {
                foreach ($package_locale as $p_l_key => $p_l) {
                    $package_locale[$p_l_key]['package_id'] = $packageId;
                    $this->package_model->addPackageLocale($package_locale[$p_l_key]);
                }
                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'packages/editPackage/'.$packageId);
        }
    }

    public function editPackage() {
        $this->form_validation->set_rules('package_id', 'Package ID', 'required|trim');
        $this->form_validation->set_rules('package_type', 'Package Type', 'required|trim');
        $languages = $this->language_model->getLanguages();

        if ($this->form_validation->run() == FALSE) {
            $packageId = $this->uri->segment(4);
            $packageData = $this->package_model->getPackage($packageId);
            $tempPackageLocales = $this->package_model->getPackageLocales($packageId);
            $packageLocales = array();
            foreach ($tempPackageLocales as $p_l_key => $p_l) {
                $packageLocales[$p_l['lang_id']] = $p_l;
            }

            $this->view_data['package'] = $packageData;
            $this->view_data['packageLocales'] = $packageLocales;
            $this->view_data['languages'] = $languages;
            $this->load->admintemplate('backend/packages/edit_package_view', $this->view_data);
        } else {
            $packageData['package_id'] = $this->input->post('package_id');
            $packageData['package_type'] = $this->input->post('package_type');
            $packageData['is_package_type'] = $this->input->post('is_package_type');
            
            $packageData['early_booking'] = $this->input->post('early_booking');
            $packageData['early_booking_until'] = date('Y-m-d', strtotime($this->input->post('early_booking_until')));
            $packageData['eb_is_active'] = $this->input->post('eb_is_active');

            $package_locale = array();
            foreach ($languages as $language) {
                $temp = array();
                $temp['package_name'] = $this->input->post('package_name_' . $language['lang_id']);
                $temp['lang_id'] = $language['lang_id'];
                array_push($package_locale, $temp);
            }

            $this->package_model->editPackage($packageData);

            if ($packageData['package_id'] && is_numeric($packageData['package_id'])) {
                foreach ($package_locale as $p_l_key => $p_l) {
                    $package_locale[$p_l_key]['package_id'] = $packageData['package_id'];
                    $this->package_model->editPackageLocale($package_locale[$p_l_key]);
                }
                $this->session->set_flashdata('message', 'Row updated');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'packages/editPackage/'.$packageData['package_id']);
        }
    }

    public function deletePackage() {
        $packageId = $this->uri->segment(4);
        if ($packageId && is_numeric($packageId)) {
            if ($this->package_model->deletePackage($packageId)) {
                $this->session->set_flashdata('message', 'Row Deleted');
            } else {
                $this->session->set_flashdata('error', 'Row Locale Problem');
            }
        } else {
            $this->session->set_flashdata('error', 'Row Problem');
        }
        redirect($this->admin_url . 'packages/showPackages');
    }

    public function showPackagePeriods() {
        $packagePeriods = $this->package_model->getPackagePeriods();
        $this->view_data['packagePeriods'] = $packagePeriods;
        $this->load->admintemplate('backend/packages/package_periods_view', $this->view_data);
    }

    public function addPackagePeriod() {
        $this->form_validation->set_rules('period_from', 'Period From', 'required|trim');
        $this->form_validation->set_rules('period_to', 'Period To', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $packageId = $this->uri->segment(4);
            if ($packageId && is_numeric($packageId)) {
                $this->view_data['selected_package_id'] = $packageId;
                $this->view_data['packagePeriods'] = $this->package_model->getPeriodsPerPackage($packageId);
            }
            $packagesForPeriods = $this->package_model->getPackagesForPeriods();
            if (!$packagesForPeriods || empty($packagesForPeriods)) {
                $this->session->set_flashdata('error', 'You need to add at least one package with package days greater than 1 in order to add periods');
                redirect($this->admin_url . 'packages');
            }

            $this->view_data['packages'] = $packagesForPeriods;
            $this->load->admintemplate('backend/packages/add_package_period_view', $this->view_data);
        } else {
            $packagePeriod = array();
            $packagePeriod['package_id'] = $this->input->post('package_id');
            $packagePeriod['period_from'] = date('Y-m-d', strtotime($this->input->post('period_from')));
            $packagePeriod['period_to'] = date('Y-m-d', strtotime($this->input->post('period_to')));
            $packagePeriod['package_active'] = $this->input->post('package_active');

            if ($this->package_model->addPackagePeriod($packagePeriod)) {
                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'packages/addPackagePeriod/' . $packagePeriod['package_id']);
        }
    }

    public function editPackagePeriod() {
        $this->form_validation->set_rules('period_from', 'Period From', 'required|trim');
        $this->form_validation->set_rules('period_to', 'Period To', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $packagePeriodId = $this->uri->segment(4);

            if ($packagePeriodId && is_numeric($packagePeriodId)) {
                $packagePeriod = $this->package_model->getPackagePeriod($packagePeriodId);
                if ($packagePeriod && !empty($packagePeriod)) {
                    $this->view_data['packagePeriod'] = $packagePeriod;
                    $this->load->admintemplate('backend/packages/edit_package_period_view', $this->view_data);
                }
            } else {
                $this->session->set_flashdata('error', 'Row Problem');
                redirect($this->admin_url . 'packages/showPackagePeriods');
            }
        } else {
            // $packagePeriod['package_period_id'] = $this->input->post('package_period_id');
            $timeFrom = strtotime($this->input->post('period_from'));
            $dateFrom = date('Y-m-d', $timeFrom);
            $timeTo = strtotime($this->input->post('period_to'));
            $dateTo = date('Y-m-d', $timeTo);
            $packagePeriod['period_from'] = $dateFrom;
            $packagePeriod['period_to'] = $dateTo;
            $packagePeriod['package_active'] = $this->input->post('package_active');

            if ($this->package_model->editPackagePeriod($this->input->post('package_period_id'), $packagePeriod)) {
                $this->session->set_flashdata('message', 'Row Updated');
            } else {
                $this->session->set_flashdata('error', 'Row Problem');
            }

            redirect($this->admin_url . 'packages/showPackagePeriods');
        }
    }

    public function deletePackagePeriod() {
        $packagePeriodId = $this->uri->segment(4);

        if ($packagePeriodId && is_numeric($packagePeriodId)) {
            if ($this->package_model->deletePackagePeriod($packagePeriodId)) {
                $this->session->set_flashdata('message', 'Row Deleted');
            } else {
                $this->session->set_flashdata('error', 'Row Problem');
            }
        } else {
            $this->session->set_flashdata('error', 'Row Problem');
        }
        redirect($this->admin_url . 'packages/showPackagePeriods');
    }

    public function add1Year() {
        $this->package_model->plus1yearToPackages();
        $this->session->set_flashdata('message', 'Packages Updated');
        redirect($this->admin_url . 'packages/showPackagePeriods');
    }

    public function minus1year() {
        $this->package_model->minus1yearToPackages();
        $this->session->set_flashdata('message', 'Packages Updated');
        redirect($this->admin_url . 'packages/showPackagePeriods');
    }

    public function massSpecialOffer() {
        $this->form_validation->set_rules('special_offer', 'Special Offer %', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $nonAllotmentPackages = $this->package_model->getNonAllotmentPackages();

            if ($nonAllotmentPackages && !empty($nonAllotmentPackages)) {
                $allNonAllotmentPackages = array();
                foreach ($nonAllotmentPackages as $package) {
                    $nonAll = $this->package_model->getPeriodsPerPackage($package['package_id']);
                    if ($nonAll)
                        $allNonAllotmentPackages = array_merge($allNonAllotmentPackages, $nonAll);
                }

                if (empty($allNonAllotmentPackages)) {
                    $this->session->set_flashdata('error', 'No periods for non allotments packages');
                    redirect($this->admin_url . 'packages');
                }
                $this->view_data['non_allotment_packages'] = $allNonAllotmentPackages;
                $this->load->admintemplate('backend/packages/mass_special_offer_view', $this->view_data);
            } else {
                $this->session->set_flashdata('error', 'No non-allotment packages');
                redirect($this->admin_url . 'packages');
            }
        } else {
            $special_offer = $this->input->post('special_offer');

            $nonAllotmentPackages = $this->package_model->getNonAllotmentPackages();

            if ($nonAllotmentPackages && !empty($nonAllotmentPackages)) {
                $allNonAllotmentPackages = array();
                foreach ($nonAllotmentPackages as $package) {
                    $nonAll = $this->package_model->getPeriodsPerPackage($package['package_id']);
                    if ($nonAll)
                        $allNonAllotmentPackages = array_merge($allNonAllotmentPackages, $nonAll);
                }
            }

            foreach ($allNonAllotmentPackages as $period) {
                $checkPPId = $this->input->post('period_' . $period['package_period_id']);
                if ($checkPPId) {
                    $packagePeriodId = $period['package_period_id'];
                    $this->package_model->setMassSpecialOffer($packagePeriodId, $special_offer);
                }
            }

            $this->session->set_flashdata('message', 'Mass Special Offer edit done');
            redirect($this->admin_url . 'packages');
        }
    }

}
