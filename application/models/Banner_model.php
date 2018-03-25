<?php


class Banner_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getActiveBanners($limit = null, $lang = null) {
        $this->db->select('banners.*, banner_locales.title, banner_locales.description')
            ->from('banners')
            ->join('banner_locales', 'banners.id=banner_locales.banner_id', 'left');
        
        if(isset($lang) && trim($lang) != ""){
            $this->db->join('languages', 'banner_locales.lang_id=languages.lang_id', 'left');
            $this->db->where('languages.lang_abbreviation', $lang);
        }
        else{
            $this->db->join('languages', 'banner_locales.lang_id=languages.lang_id', 'left');
            $this->db->where('languages.lang_abbreviation', 'en');
        }
        
        $this->db->where('banners.active', true);
        
        if(isset($limit) && is_numeric($limit) && $limit > 0){
            $this->db->limit($limit);
        }
                
        $qry = $this->db->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }


    public function getBanners() {
        $qry = $this->db->select('*')
                ->from('banners')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getBanner($id) {
        $qry = $this->db->select('*')
                ->from('banners')
                ->where('banners.id', $id)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return FALSE;
    }
    public function getBannerLocales($banner_id) {
        $qry = $this->db->select('*')
                ->from('banner_locales')
                ->where('banner_locales.banner_id', $banner_id)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }
    public function getBannerLocaleByBannerAndLanguage($banner_id, $lang_id) {
        $qry = $this->db->select('*')
                ->from('banner_locales')
                ->where('banner_locales.banner_id', $banner_id)
                ->where('banner_locales.lang_id', $lang_id)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return FALSE;
    }

    public function addBanner($bannerData) {
        $this->db->insert('banners', $bannerData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }
    public function addBannerLocale($bannerLocaleData) {
        $this->db->insert('banner_locales', $bannerLocaleData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }

    public function editBanner($bannerData) {
        $this->db->where('id', $bannerData['id'])->update('banners', $bannerData);
        
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }
    public function editBannerLocale($bannerLocaleData) {
        $this->db->where('id', $bannerLocaleData['id'])->update('banner_locales', $bannerLocaleData);
        
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function deleteBanner($bannerId) {
        $this->db->delete('banners', array('id' => $bannerId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }
    public function deleteBannerLocalesForBanner($banner_id) {
        $this->db->delete('banner_locales', array('banner_id' => $banner_id));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

}
