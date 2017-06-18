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

    public function getFacilities() {
        $qry = $this->db->select('*')
                ->from('facilities')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
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
