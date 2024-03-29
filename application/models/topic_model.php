<?php
    class Topic_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        public function gets(){
            return $this -> db->query('SELECT * FROM topic')->result();
        }

        public function get($topic_id){
            $this ->db->select('id'); // title 이있는 컬러만 가져옴
            $this ->db->select('title'); // title 이있는 컬러만 가져옴
            $this ->db->select('description'); // title 이있는 컬러만 가져옴
            $this ->db->select('UNIX_TIMESTAMP(created) AS created'); // title 이있는 컬러만 가져옴

            return $this ->db->get_where('topic', array('id'=>$topic_id))->row();
        }

        function add($title, $description){
            $this->db->set('created', 'NOW()', false);
            $this->db->insert('topic',array(
                'title'=>$title,
                'description'=>$description
            ));
            return $this->db->insert_id();
        }

    }
