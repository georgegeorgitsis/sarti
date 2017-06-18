<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Board_model
 *
 * @author George-pc
 */
class Board_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getBoards() {
        $qry = $this->db->select('*')
                ->from('boards')
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->result_array();
        return FALSE;
    }

    public function getBoard($boardId) {
        $qry = $this->db->select('*')
                ->from('boards')
                ->where('board_id', $boardId)
                ->get();
        if ($qry->num_rows() > 0)
            return $qry->row_array();
        return FALSE;
    }

    public function addBoard($boardData) {
        $this->db->insert('boards', $boardData);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        return FALSE;
    }

    public function editBoard($boardData) {
        $this->db->where('board_id', $boardData['board_id'])->update('boards', $boardData);
        
        if ($this->db->affected_rows() == 1)
            return TRUE;
        return FALSE;
    }

    public function deleteBoard($boardId) {
        $this->db->delete('boards', array('board_id' => $boardId));
        if ($this->db->affected_rows() > 0)
            return true;
        return false;
    }

}
