<?php

/**
 *
 * @property CI_DB_active_record $db
 * @property CI_Form_validation $input
 * @property CI_Pagination $pagination
 * @author Mohamed Mahdy <eng.mohamed.php@gmail.com>
 * @copyright Copyright (c) 2011, Web Developer <Mohamed Mahdy>
 */
class Article_views_counter_model extends CI_Model
{
    protected $table = "article_views_counter";
    protected $parentTable = false;


    function save($data)
    {
        $this->db->set("user_id", $data['user_id']);
        $this->db->set("article_id", $data['article_id']);
        $this->db->insert($this->table);
    }
}
