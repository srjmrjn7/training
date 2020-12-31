<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Exam_model extends CI_model {
	
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
	
	function insertExam($data) {
        $this->db->insert('exam', $data);
    }

    function getExam() {
        $query = $this->db->get('exam');
        return $query->result();
    }


    function getExamById($id) {
        $this->db->where('exam_id', $id);
        $query = $this->db->get('exam');
        return $query->row();
    }

    function getExamByPageNumber($page_number) {
        $data_range_1 = 50 * $page_number;
        $this->db->order_by('exam_id', 'asc');
        $query = $this->db->get('exam', 50, $data_range_1);
        return $query->result();
    }

    function updateExam($id, $data) {
        $this->db->where('exam_id', $id);
        $this->db->update('exam', $data);
    }

    function delete($id) {
        $this->db->where('exam_id', $id);
        $this->db->delete('exam');
    }


    function getExamBySearch($search) {
        $this->db->order_by('exam_id', 'desc');
        $this->db->like('exam_id', $search);
        $this->db->or_like('course_id', $search);
        $this->db->or_like('topic', $search);
        $query = $this->db->get('exam');
        return $query->result();
    }

    function getStudentByLimit($limit, $start) {
        $this->db->order_by('exam_id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('exam');
        return $query->result();
    }

    function getExamByLimitBySearch($limit, $start, $search) {

        $this->db->like('exam_id', $search);

        $this->db->order_by('exam_id', 'desc');

        $this->db->or_like('course_id', $search);
        $this->db->or_like('topic', $search);

        $this->db->limit($limit, $start);
        $query = $this->db->get('exam');
        return $query->result();
    }

}
