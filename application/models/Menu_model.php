<?php


class Menu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getMenus() {
        $qry = $this->db->select('*')
                ->from('Menus')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getMenu($id) {
        $qry = $this->db->select('*')
                ->from('menus')
                ->join('menu_items', 'menu_items.menu_id=menus.id')
                ->where('menus.id', $id)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return FALSE;
    }

    public function addMenu($menu) {
        $this->db->insert('menus', $menu);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }
    public function addMenuItem($menuItem) {
        $this->db->insert('menu_items', $menuItem);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }
    public function addMenuItemLocale($menuItemLocale) {
        $this->db->insert('menu_item_locale', $menuItemLocale);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }

    public function editMenu($menu) {
        $this->db->where('id', $menu['id'])->update('menus', $menu);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }
    public function editMenuItem($menuItem) {
        $this->db->where('id', $menuItem['id'])->update('menu_items', $menuItem);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }
    public function editMenuItemLocale($menuItemLocale) {
        $this->db->where('id', $menuItemLocale['id'])->update('menu_item_locales', $menuItemLocale);
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function deleteMenu($id) {
        $this->db->delete('menus', array('id' => $id));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }
    public function deleteMenuItem($id) {
        $this->db->delete('menu_items', array('id' => $id));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }
    public function deleteMenuItemLocale($id) {
        $this->db->delete('menu_item_locales', array('id' => $id));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }
}
