<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Exam extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Exam_model');

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        if (!$this->ion_auth->in_group(array('admin', 'Student', 'Instructor'))) {
            redirect('home/permission');
        }
    }


    public function index()
    {
        $data['exam'] = $this->Exam_model->getExam();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('exam', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function viewAllQuestions()
    {
        $data['exam'] = $this->Exam_model->getExamQuestions();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('exam', $data);
        $this->load->view('home/footer'); // just the header file		
    }

    public function addNew()
    {

        $exam_id = $this->input->post('exam_id');
        $question = $this->input->post('question');
        $option1 = $this->input->post('option1');
        $option2 = $this->input->post('option2');
        $option3 = $this->input->post('option3');
        $option4 = $this->input->post('option4');
        $answer = $this->input->post('answer');
        $add_date = time();
        $data = array();
        $data = array(
            'exam_id' => $exam_id,
            'question' => $question,
            'option1' => $option1,
            'option2' => $option2,
            'option3' => $option3,
            'option4' => $option4,
            'answer' => $answer
        );

        if (empty($id)) {     // Adding New Exam
            $this->Exam_model->insertqa($data);
            $this->session->set_flashdata('feedback', 'Added');
        } else { // Updating Student
            $this->Exam_model->updateqa($id, $data);
            $this->session->set_flashdata('feedback', 'Updated');
        }
        // Loading View
        redirect('exam');
    }

    function getExamList()
    {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $data['cases'] = $this->Exam_model->getExam();
        /*if ($limit == -1) {
            if (!empty($search)) {
                $data['cases'] = $this->Exam_model->getExamBySearch($search);
            } else {
                $data['cases'] = $this->Exam_model->getExam();
            }
        } else {
            if (!empty($search)) {
                $data['cases'] = $this->Exam_model->getExamByLimitBySearch($limit, $start, $search);
            } else {
                $data['cases'] = $this->Exam_model->getExamByLimit($limit, $start);
            }
        }*/
        //  $data['patients'] = $this->patient_model->getPatient();
        $i = 0;
        foreach ($data['cases'] as $case) {
            $i = $i + 1;

            $option1 = '<a class="btn btn-info btn-xs btn_width" href="exam/viewQuestionsById?id=' . $case->exam_id . '"><i class="fa fa-eye"> </i>' . 'View Questions' . '</a>';
            $option2 = '<button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="' . $case->exam_id . '"><i class="fa fa-edit"></i>' . lang('edit') . '</button>';
            $option3 = '<a class="btn btn-info btn-xs btn_width delete_button" href="exam/delete?id=' . $case->exam_id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i>' . lang('delete') . '</a>';
            $imgoption = '<img style="width:95%;"src="' . $case->img_url . '">';

            $info[] = array(
                $case->exam_id,
                $case->course_id,
                $case->topic,
                $case->grand_total,
                $case->pass_marks,
                $case->comment,
                $option1 . ' ' . $option2 . ' ' . $option3
            );
        }

        if (!empty($data['cases'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('exam')->num_rows(),
                "recordsFiltered" => $this->db->get('exam')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }


    function getQuestionList()
    {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $data['cases'] = $this->Exam_model->getQuestion();
        /*if ($limit == -1) {
            if (!empty($search)) {
                $data['cases'] = $this->Exam_model->getExamBySearch($search);
            } else {
                $data['cases'] = $this->Exam_model->getExam();
            }
        } else {
            if (!empty($search)) {
                $data['cases'] = $this->Exam_model->getExamByLimitBySearch($limit, $start, $search);
            } else {
                $data['cases'] = $this->Exam_model->getExamByLimit($limit, $start);
            }
        }*/
        //  $data['patients'] = $this->patient_model->getPatient();
        $i = 0;
        foreach ($data['cases'] as $case) {
            $i = $i + 1;
            $option1 = '<button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="' . $case->exam_id . '"><i class="fa fa-edit"></i>' . lang('edit') . '</button>';
            $option2 = '<a class="btn btn-info btn-xs btn_width delete_button" href="exam/deleteqa?id=' . $case->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i>' . lang('delete') . '</a>';
            $imgoption = '<img style="width:95%;"src="' . $case->img_url . '">';

            $info[] = array(
                $case->id,
                $case->exam_id,
                $case->question,
                $case->option1,
                $case->option2,
                $case->option3,
                $case->option4,
                $case->answer,
                $option1 . ' ' . $option2
            );
        }

        if (!empty($data['cases'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('exam')->num_rows(),
                "recordsFiltered" => $this->db->get('exam')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }


    function getQuestionByid()
    {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];
        $id = $this->input->get('id');
        $data['cases'] = $this->Exam_model->getQuestionById($id);
        $i = 0;
        foreach ($data['cases'] as $case) {
            $i = $i + 1;
            $option1 = '<button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="' . $case->exam_id . '"><i class="fa fa-edit"></i>' . lang('edit') . '</button>';
            $option2 = '<a class="btn btn-info btn-xs btn_width delete_button" href="exam/deleteqa?id=' . $case->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i>' . lang('delete') . '</a>';
            $imgoption = '<img style="width:95%;"src="' . $case->img_url . '">';

            $info[] = array(
                $case->id,
                $case->exam_id,
                $case->question,
                $case->option1,
                $case->option2,
                $case->option3,
                $case->option4,
                $case->answer,
                $option1 . ' ' . $option2
            );
        }

        if (!empty($data['cases'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('exam')->num_rows(),
                "recordsFiltered" => $this->db->get('exam')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }


    function delete()
    {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('exam', array('exam_id' => $id))->row();
        $this->Exam_model->delete($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('exam');
    }

    function deleteqa()
    {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('qa', array('id' => $id))->row();
        $this->Exam_model->deleteqa($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('exam/viewQuestions');
    }

    function viewQuestionsById()
    {
        $data = array();
        $data['settings'] = $this->settings_model->getSettings();

        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('qabyid');
        $this->load->view('home/footer'); // just the header file
    }

    function viewQuestions()
    {
        $data = array();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('qa');
        $this->load->view('home/footer'); // just the header file
    }

}