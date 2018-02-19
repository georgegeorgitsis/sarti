<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Facilities_model
 *
 * @author George-pc
 */
class Facility_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getFFacilities($lang_id) {
        $qry = $this->db->select('*')
                ->from('facilities')
                ->join('facility_locales', 'facility_locales.facility_id=facilities.facility_id')
                ->where('facility_locales.lang_id', $lang_id)
                ->order_by("facilities.main_order", "asc")
                ->order_by("facilities.facility_type", "asc")
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getCategories(){
        $qry = $this->db->select('*')
                ->from('facility_categories')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function addCategory($category) {
        $this->db->insert('facility_categories', $category);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }
    public function getCategory($id) {
        $qry = $this->db->select('*')
                ->from('facility_categories')
                ->where('id', $id)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return FALSE;
    }
    public function editCategory($category) {
        $this->db->where('id', $category['id'])->update('facility_categories', $category);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }
    public function deleteCategory($id) {
        $this->db->delete('facility_categories', array('id' => $id));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    public function getFacilities() {
        $this->db->select('facility_categories.*')
                ->from('facility_categories')
                ->join('facilities', 'facilities.category_id = facility_categories.id', 'inner');
            
        $this->db->group_by('facility_categories.id');
        

        $qry = $this->db->get();

        if ($qry->num_rows() > 0){
            $results = $qry->result_array();
            foreach($results as &$res){
                $qry2 = '';
                $this->db->select('*')
                    ->from('facilities')
                    ->join('facility_categories', 'facilities.category_id = facility_categories.id', 'inner')
                    ->where('facility_categories.id', $res['id']);
                $this->db->order_by("facilities.order", "asc");
                $qry2 = $this->db->get();
                if($qry2->num_rows()>0){
                    $res['facilities'] = $qry2->result_array();
                }
            }
            return $results;
        }
            
        return false;
    }

    public function getFacilitiesOnly() {
        $this->db->select('facilities.*')
                ->from('facilities');
            
        

        $qry = $this->db->get();

        if ($qry->num_rows() > 0){
            $results = $qry->result_array();
            return $results;
        }
            
        return false;
    }

    public function getFacility($facilityId) {
        $qry = $this->db->select('*')
                ->from('facilities')
                ->where('facility_id', $facilityId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return FALSE;
    }

    public function getFacilityLocales($facilityId) {
        $qry = $this->db->select('*')
                ->from('facility_locales')
                ->where('facility_id', $facilityId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function addFacility($facilityData) {
        $this->db->insert('facilities', $facilityData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }

    public function addFacilityLocale($facilityLocale) {
        $this->db->insert('facility_locales', $facilityLocale);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editFacility($facilityData) {
        $this->db->where('facility_id', $facilityData['facility_id'])->update('facilities', $facilityData);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editFacilityLocale($facilityLocale) {
        $this->db->where('facility_id', $facilityLocale['facility_id'])->where('lang_id', $facilityLocale['lang_id'])->update('facility_locales', $facilityLocale);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function deleteFacility($facilityId) {
        $this->db->delete('facility_locales', array('facility_id' => $facilityId));
        $this->db->delete('facilities', array('facility_id' => $facilityId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

}
