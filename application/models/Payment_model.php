<?php

/**
 *
 * @property CI_DB_active_record $db
 * @property CI_Form_validation $input
 * @property CI_Pagination $pagination
 * @author Mohamed Mahdy <eng.mohamed.php@gmail.com>
 * @copyright Copyright (c) 2011, Web Developer <Mohamed Mahdy>
 */
class Payment_model extends CI_Model
{
    protected $table = "transactions";
    protected $parentTable = false;

    public $user_id;
    public $amount;
    public $status;
    public $updated_at;

    function save_transactions()
    {
        $this->db->set("user_id", $this->user_id);
        $this->db->set("amount", $this->amount);
        $this->db->set("status", $this->status);
        $this->db->insert($this->table);
    }

    function _list($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
