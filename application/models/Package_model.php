<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Packages_model
 *
 * @author George-pc
 */
class Package_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getFPackagesByDate($date){
        $qry = $this->db->select('package_periods.*, packages.package_type, rooms.*, hotels.hotel_name, hotels.hotel_id')
            ->from('package_periods')
            ->join('packages', 'packages.package_id=package_periods.package_id')
            ->join('rooms', 'packages.package_id=rooms.room_package_id')
            ->join('hotels', 'rooms.hotel_id=hotels.hotel_id')
            ->where('package_periods.period_from <=', date('Y-m-d ', strtotime($date)))
            ->where('package_periods.period_to >=', date('Y-m-d', strtotime($date)))
            ->order_by('package_periods.period_from')
            ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getF7dayspackages($fromDate = NULL, $toDate = NULL) {
        $this->db->select('*')
                ->from('package_periods')
                ->join('packages', 'packages.package_id=package_periods.package_id')
                ->where('packages.is_package_type', 2);

        if($fromDate){        
            $this->db->where('package_periods.period_from >=', $fromDate);
        }
        else{
            $this->db->where('package_periods.period_from >= CURDATE()');
        }
        if($toDate){
            $this->db->where('package_periods.period_from <=', $toDate);
        }        
        $this->db->order_by('package_periods.period_from');
        $qry = $this->db->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getF10dayspackages($fromDate = NULL, $toDate = NULL) {
        $this->db->select('*')
                ->from('package_periods')
                ->join('packages', 'packages.package_id=package_periods.package_id')
                ->where('packages.is_package_type', 3);

        if($fromDate){
            $this->db->where('package_periods.period_from >=', $fromDate);
        }
        else{
            $this->db->where('package_periods.period_from >= CURDATE()');
        }
        if($toDate){
            $this->db->where('package_periods.period_from <=', $toDate);
        }  
        $this->db->order_by('package_periods.period_from');
        $qry = $this->db->get();
        
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        
        return false;
    }

    public function getMinMaxAdultsAllotment() {
        $min_res = 0;
        $max_res = 0;

        $qry = $this->db->select('MIN(min_adults) as min_adults')
                ->from('rooms')
                ->where('room_package_id', 1)
                ->get();

        if ($qry->num_rows() == 1)
            $min_res = $qry->row_array();

        $qry = $this->db->select('MAX(max_adults) as max_adults')
                ->from('rooms')
                ->where('room_package_id', 1)
                ->get();


        if ($qry->num_rows() == 1)
            $max_res = $qry->row_array();

        return array('min_adults' => $min_res['min_adults'], 'max_adults' => $max_res['max_adults']);
    }

    public function getFMinMaxAdults7Days() {
        $min_res = 0;
        $max_res = 0;
        
        $qry = $this->db->select('MIN(min_adults) as min_adults')
                ->from('rooms')
                ->where('room_package_id', 2)
                ->get();

        if ($qry->num_rows() == 1)
            $min_res = $qry->row_array();

        $qry = $this->db->select('MAX(max_adults) as max_adults')
                ->from('rooms')
                ->where('room_package_id', 2)
                ->get();

        if ($qry->num_rows() == 1)
            $max_res = $qry->row_array();

        return array('min_adults' => $min_res['min_adults'], 'max_adults' => $max_res['max_adults']);
    }

    public function getFMinMaxAdults10Days() {
        $min_res = 0;
        $max_res = 0;
        
        $qry = $this->db->select('MIN(min_adults) as min_adults')
                ->from('rooms')
                ->where('room_package_id', 3)
                ->get();

        if ($qry->num_rows() == 1)
            $min_res = $qry->row_array();

        $qry = $this->db->select('MAX(max_adults) as max_adults')
                ->from('rooms')
                ->where('room_package_id', 3)
                ->get();

        if ($qry->num_rows() == 1)
            $max_res = $qry->row_array();

        return array('min_adults' => $min_res['min_adults'], 'max_adults' => $max_res['max_adults']);
    }

    public function getPackages() {
        $qry = $this->db->select('*')
                ->from('packages')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getPackage($packageId) {
        $qry = $this->db->select('*')
                ->from('packages')
                ->where('packages.package_id', $packageId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function getPackageLocales($packageId) {
        $qry = $this->db->select('*')
                ->from('package_locales')
                ->where('package_id', $packageId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getPackagePeriods() {
        $qry = $this->db->select('*')
                ->from('package_periods')
                ->join('packages', 'packages.package_id=package_periods.package_id')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getPackagePeriod($packagePeriodId) {
        $qry = $this->db->select('*')
                ->from('package_periods')
                ->where('package_period_id', $packagePeriodId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function getPackagesForPeriods() {
        $qry = $this->db->select('*')
                ->from('packages')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getPeriodsPerPackage($packageId) {
        $qry = $this->db->select('*')
                ->from('package_periods')
                ->join('packages', 'packages.package_id=package_periods.package_id')
                ->where('package_periods.package_id', $packageId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getNonAllotmentPackages() {
        $qry = $this->db->select('*')
                ->from('packages')
                ->where('is_package_type!=1')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function setMassSpecialOffer($packagePeriodId, $specialOffer) {
        $this->db->where('package_period_id', $packagePeriodId)
                ->update('room_package_prices', array('special_offer' => $specialOffer));
        if ($this->db->affected_rows() > 0)
            return TRUE;
        return FALSE;
    }

    public function addPackage($packageData) {
        $this->db->insert('packages', $packageData);
        if ($this->db->affected_rows() > 0)
            return $this->db->insert_id();
        return false;
    }

    public function addPackageLocale($packageLocale) {
        $this->db->insert('package_locales', $packageLocale);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function addPackagePeriod($packagePeriod) {
        $this->db->insert('package_periods', $packagePeriod);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editPackage($packageData) {
        $this->db->where('package_id', $packageData['package_id'])->update('packages', $packageData);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editPackageLocale($packageLocale) {
        $this->db->where('package_id', $packageLocale['package_id'])->where('lang_id', $packageLocale['lang_id'])->update('package_locales', $packageLocale);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editPackagePeriod($packagePeriod) {
        $this->db->where('package_id', $packagePeriod['package_period_id'])
        ->update('package_periods', $packagePeriod);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function deletePackage($packageId) {
        $this->db->delete('package_locales', array('package_id' => $packageId));
        $this->db->delete('packages', array('package_id' => $packageId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    public function deletePackagePeriod($packagePeriodId) {
        $this->db->delete('package_periods', array('package_period_id' => $packagePeriodId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    public function plus1yearToPackages() {
        $sql = "UPDATE `package_periods` SET `period_from` = DATE_ADD(`period_from`, INTERVAL 1 YEAR)";
        $this->db->query($sql);
        $sql = "UPDATE `package_periods` SET `period_to` = DATE_ADD(`period_to`, INTERVAL 1 YEAR)";
        $this->db->query($sql);
        return TRUE;
    }

    public function minus1yearToPackages() {
        $sql = "UPDATE `package_periods` SET `period_from` = DATE_SUB(`period_from`, INTERVAL 1 YEAR)";
        $this->db->query($sql);
        $sql = "UPDATE `package_periods` SET `period_to` = DATE_SUB(`period_to`, INTERVAL 1 YEAR)";
        $this->db->query($sql);
        return TRUE;
    }

}
