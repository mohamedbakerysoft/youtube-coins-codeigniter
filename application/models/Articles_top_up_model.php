<?php

/**
 *
 * @property CI_DB_active_record $db
 * @property CI_Form_validation $input
 * @property CI_Pagination $pagination
 * @author Mohamed Mahdy <eng.mohamed.php@gmail.com>
 * @copyright Copyright (c) 2011, Web Developer <Mohamed Mahdy>
 */
class Articles_top_up_model extends CI_Model
{
    protected $table = "articles_top_up";
    protected $parentTable = false;


    function save($data)
    {
        $this->db->set("ar_id", $data['ar_id']);
        $this->db->set("current_balance", $data['amount']);
        $this->db->set("first_balance", $data['amount']);
        $this->db->insert($this->table);
    }

    function update_current_balance($points, $ar_id)
    {
        $this->db->where('ar_id', $ar_id);
        $query = $this->db->get($this->table);
        $article_top_up = $query->row();

        if ($article_top_up) {
            $new_balance = $article_top_up->current_balance - $points;
            $this->db->where('ar_id', $ar_id);
            $this->db->set('current_balance', $new_balance);
            $this->db->update($this->table);
        }
    }

    function get_current_balance($ar_id)
    {
        $this->db->where('ar_id', $ar_id);
        $query = $this->db->get($this->table);
        $row = $query->row();
        if ($row) {
            return $row->current_balance;
        }
    }
}
