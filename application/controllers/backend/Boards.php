<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Boards
 *
 * @author George-pc
 */
class Boards extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('board_model');
    }

    public function index() {
        $this->showBoards();
    }

    public function showBoards() {
        $boards = $this->board_model->getBoards();
        $this->view_data['boards'] = $boards;
        $this->load->admintemplate('backend/boards/boards_view', $this->view_data);
    }

    public function addBoard() {
        $this->form_validation->set_rules('board_name', 'Board Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->admintemplate('backend/boards/add_board_view', $this->view_data);
        } else {
            $board['board_name'] = $this->input->post('board_name');
            $boardId = $this->board_model->addBoard($board);

            if ($boardId && is_numeric($boardId)) {
                $this->session->set_flashdata('message', 'Row inserted');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'boards/editBoard/'.$boardId);
        }
    }

    public function editBoard() {
        $this->form_validation->set_rules('board_name', 'Board Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $boardId = $this->uri->segment(4);
            $boardData = $this->board_model->getBoard($boardId);
            $this->view_data['board'] = $boardData;
            $this->load->admintemplate('backend/boards/edit_board_view', $this->view_data);
        } else {
            $boardId = $this->input->post('board_id');
            $boardData['board_id'] = $boardId;
            $boardData['board_name'] = $this->input->post('board_name');

            if ($this->board_model->editBoard($boardData)) {
                $this->session->set_flashdata('message', 'Row updated');
            } else {
                $this->session->set_flashdata('error', 'Row problem');
            }
            redirect($this->admin_url . 'boards/editBoard/'.$boardId);
        }
    }

    public function deleteBoard() {
        $boardId = $this->uri->segment(4);

        if ($boardId && is_numeric($boardId)) {
            if ($this->board_model->deleteBoard($boardId)) {
                $this->session->set_flashdata('message', 'Row Deleted');
            } else {
                $this->session->set_flashdata('error', 'Row Locale Problem');
            }
        } else {
            $this->session->set_flashdata('error', 'Row Problem');
        }
        redirect($this->admin_url . 'boards');
    }

}
