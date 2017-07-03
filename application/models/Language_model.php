<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of language_model
 *
 * @author George-pc
 */
class Language_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getLanguages() {
        $qry = $this->db->select('*')
                ->from('languages')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return false;
    }

    public function getLanguage($langId) {
        $qry = $this->db->select('*')
                ->from('languages')
                ->where('lang_id', $langId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return false;
    }

    public function getLanguagePerAbbr($abbr) {
        $qry = $this->db->select('*')
                ->from('languages')
                ->where('lang_abbreviation', $abbr)
                ->get();
        if ($qry->num_rows() == 1)
            return $qry->row_array();
        return false;
    }

    public function addLanguage($languageData) {
        $this->db->insert('languages', $languageData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return false;
    }

    public function deleteLanguage($langId) {
        $this->db->delete('languages', array('lang_id' => $langId));
        $this->db->delete('facility_locales', array('lang_id' => $langId));
        $this->db->delete('hotel_locales', array('lang_id' => $langId));
        $this->db->delete('package_locales', array('lang_id' => $langId));
        $this->db->delete('room_locales', array('lang_id' => $langId));
        if ($this->db->affected_rows() == 1)
            return true;
        return false;
    }

    public function editLanguage($languageData) {
        $this->db->where('lang_id', $languageData['lang_id'])->update('languages', $languageData);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function addToLocalesTables($lang_id) {
        //facilities locales
        $qry = $this->db->select('DISTINCT(facility_id)')
                ->from('facility_locales')
                ->get();
        if ($qry->num_rows() > 0) {
            $f_l = $qry->result_array();
            foreach ($f_l as $f) {
                $this->db->insert('facility_locales', array('lang_id' => $lang_id, 'facility_id' => $f['facility_id']));
            }
        }

        //hotel locales
        $qry = $this->db->select('DISTINCT(hotel_id)')
                ->from('hotel_locales')
                ->get();
        if ($qry->num_rows() > 0) {
            $f_l = $qry->result_array();
            foreach ($f_l as $f) {
                $this->db->insert('hotel_locales', array('lang_id' => $lang_id, 'hotel_id' => $f['hotel_id']));
            }
        }

        //location locales
        $qry = $this->db->select('DISTINCT(location_id)')
                ->from('location_locales')
                ->get();
        if ($qry->num_rows() > 0) {
            $f_l = $qry->result_array();
            foreach ($f_l as $f) {
                $this->db->insert('location_locales', array('lang_id' => $lang_id, 'location_id' => $f['location_id']));
            }
        }

        //package locales
        $qry = $this->db->select('DISTINCT(package_id)')
                ->from('package_locales')
                ->get();
        if ($qry->num_rows() > 0) {
            $f_l = $qry->result_array();
            foreach ($f_l as $f) {
                $this->db->insert('package_locales', array('lang_id' => $lang_id, 'package_id' => $f['package_id']));
            }
        }

        //room locales
        $qry = $this->db->select('DISTINCT(room_id)')
                ->from('room_locales')
                ->get();
        if ($qry->num_rows() > 0) {
            $f_l = $qry->result_array();
            foreach ($f_l as $f) {
                $this->db->insert('room_locales', array('lang_id' => $lang_id, 'room_id' => $f['room_id']));
            }
        }
    }

}
