<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Location_model
 *
 * @author george
 */
class Location_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getFLocations($lang_id) {
        $qry = $this->db->select('*')
                ->from('locations')
                ->join('location_locales', 'locations.location_id=location_locales.location_id')
                ->where('location_locales.lang_id', $lang_id)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getLocations() {
        $qry = $this->db->select('*')
                ->from('locations')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getLocationLocalesForLang($locationId, $lang_id) {
        $qry = $this->db->select('*')
                ->from('location_locales')
                ->where('lang_id', $lang_id)
                ->where('location_id', $locationId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function getLocation($locationId) {
        $qry = $this->db->select('*')
                ->from('locations')
                ->where('location_id', $locationId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function getLocationLocales($locationId) {
        $qry = $this->db->select('*')
                ->from('location_locales')
                ->where('location_id', $locationId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function addLocation($locationData) {
        $this->db->insert('locations', $locationData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return false;
    }

    public function addLocationLocale($locationLocale) {
        $this->db->insert('location_locales', $locationLocale);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editLocation($locationData) {
        $this->db->where('location_id', $locationData['location_id'])->update('locations', $locationData);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function editLocationLocale($locationLocale) {
        $this->db->where('location_id', $locationLocale['location_id'])->where('lang_id', $locationLocale['lang_id'])->update('location_locales', $locationLocale);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        return FALSE;
    }

    public function deleteLocation($locationId) {
        $this->db->delete('location_locales', array('location_id' => $locationId));
        $this->db->delete('locations', array('location_id' => $locationId));
        if ($this->db->affected_rows() == 1)
            return true;
        return false;
    }

}
