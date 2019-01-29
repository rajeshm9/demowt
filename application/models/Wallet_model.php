<?php

define('LIMIT', 30);
class Wallet_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        
        public function addUser ($data)
        {
               return $this->db->insert('studentInfo', $data);
        }
        public function deleteUser($data)
        {
                $this->db->where('id', $data['id']);
                $this->db->where('schoolId', $data['schoolId']);
                $this->db->delete('studentInfo');
        }
        public function updateUser($data)
        {
                $this->db->set($data);
                $this->db->where('id', $data['id']);
                $this->db->update('studentInfo');
        }
        public function getUser($id = 0, $schoolId = 0 )
        {
                $query = "select id,studentno, fname ,lname, grade, phone, email,jacket, IFNULL((select sum(amount) from paymentHistory where studentId = studentInfo.id and transType ='CR'),0) Loan, IFNULL((select sum(amount) from paymentHistory where studentId = studentInfo.id and transType ='DR'),0) Refund from studentInfo where schoolId = '".$schoolId."' AND STATUS='A'" ;
                if ($id > 0 )
                        $query .=" AND id = '".$id."'";
                        //$this->db->where('studentno', $id);

                $query = $this->db->query($query);
                return $query->result();
        }
        public function getUserInfo ($id, $schoolId)
        {
                $this->db->select('*');
                $this->db->where('id', $id);
                $this->db->where('schoolId',$schoolId);
                $query = $this->db->get('studentInfo');
                return $query->result();
        }
        public function addTransaction($data)
        {
                return $this->db->insert('paymentHistory', $data);  
        }
        public function getTxnHistory($id)
        {
                $limit = 1000;
                $offset = 0 ;
                $this->db->select('studentno, fname, paymentHistory.*');
                $this->db->join('studentInfo',  "studentInfo.id = paymentHistory.studentId");
                $this->db->where('studentId', $id);
                $query = $this->db->get('paymentHistory', $limit, $offset);
                return $query->result();

        }
        public function validateLogin($user, $password)
        {
                $this->db->select('id,userName,userType,schoolId,schoolName');
                $this->db->where('userName', $user);
                $this->db->where('password', $password);
                $this->db->where('status', 'A');
                $query = $this->db->get('adminUser');
                return $query->result();
        }
        // admin User
        public function listAdminUser()
        {
                $this->db->select('id,userName,schoolId,schoolName,createdOn');
                $this->db->where('userType', 'S');
                $query = $this->db->get('adminUser');
                return $query->result();
        }
        public function addAdminUser($data)
        {
                return $this->db->insert('adminUser', $data);
        }
        public function deleteAdminUser($data)
        {
                $this->db->where('id', $data['id']);
                $this->db->where("userName!='admin'");
                $this->db->delete('adminUser');
                redirect('/Admin/');
        }
        // school 
        public function listSchool()
        {
                $this->db->select('id,schoolName,createdOn');
                $this->db->where('status', 'A');
                $query = $this->db->get('schoolList');
                return $query->result();
        }
        public function addSchool($data)
        {
                return $this->db->insert('schoolList', $data);
        }
        // Student 

        public function validateStudentLogin($user, $password)
        {
                $this->db->select('id,fname,lname,studentno,schoolId,schoolName');
                $this->db->where('fname', $user);
                $this->db->where("lower(concat (studentno ,lname))='".$password."'");
                $this->db->where('status', 'A');
                $query = $this->db->get('studentInfo');
                return $query->result();
        }

        // Guest
        public function getEvent($id)
        {
                $this->db->select('*');
                $this->db->where('studentid', $id);
                $query = $this->db->get('event');
                return $query->result();

        }
        public function addEvent($data)
        {
                $this->db->insert('event', $data);
        }

}


/*
INSERT INTO `paymentHistory` (`id`, `studentId`, `transType`, `amount`, `txnDate`, `txnDoneBy`) VALUES ('2', '3', 'DR', '200', '2018-11-14 00:00:00', '');

INSERT INTO `paymentHistory` (`id`, `studentId`, `transType`, `amount`, `txnDate`, `txnDoneBy`) VALUES ('2', '4', 'CR', '1000', '2018-11-14 00:00:00', '');

studentno,fname,lname,grade

*/