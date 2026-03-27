<?php

/**
 *
 * @property CI_DB_active_record $db
 * @property CI_Form_validation $input
 * @property CI_Pagination $pagination
 * @author Mohamed Mahdy <eng.mohamed.php@gmail.com>
 * @copyright Copyright (c) 2011, Web Developer <Mohamed Mahdy>
 */
class Articles_model extends CI_Model
{
    protected $table = "articles";
    protected $parentTable = false;
    protected $prefix = "ar_";
    public $ar_active = 0;
    public $ar_title;
    public $ar_slug;
    public $ar_user_id;
    public $bridge_comments_id;
    public $ar_main_thumb;
    public $ar_main_photo;
    public $ar_file_path;
    public $ar_introduction;
    public $bridge_steps_id;
    public $bridge_tips_id;
    public $bridge_warnings_id;
    public $bridge_sources_id;
    public $ar_video;
    public $ar_tags;
    public $ar_created_date;
    public $ar_state;
    public $bridge_category_id;


    private function fill_data()
    {
        $slug = str_replace(' ', '-', $this->ar_slug);
        $slug = str_replace(')', '-', $slug);
        $slug = str_replace('(', '-', $slug);

        $this->db->set("ar_title", $this->ar_title);
        $this->db->set("ar_main_thumb", $this->ar_main_thumb);
        $this->db->set("ar_main_photo", $this->ar_main_photo);
        $this->db->set("ar_video", $this->ar_video);
        $this->db->set("ar_slug", $slug);
        $this->db->set("ar_user_id", $this->ar_user_id);
        $this->db->set("ar_introduction", $this->ar_introduction);
        $this->db->set("ar_tags", $this->ar_tags);
        $this->db->set("ar_created_date", $this->ar_created_date);
        $this->db->set("ar_state", 1);
        $this->db->set("ar_active", $this->ar_active);
        $this->db->set("bridge_category_id", $this->bridge_category_id);
    }

    function get_next_ord()
    {
        $this->db->select_max($this->prefix . "ord", "next_ord");
        $max_ord = $this->db->get($this->table);
        $next_ord = $max_ord->row();

        return $next_ord->next_ord + 1;
    }

    function create_new()
    {
        $this->fill_data();
        $this->db->set($this->prefix . "ord", $this->get_next_ord());
        $this->db->insert($this->table);
    }

    /**
     * delete the article information using the article id
     * @param int $article_id
     */
    function delete_article_data($article_id = 0)
    {
        $this->db->delete('steps', array('bridge_articles_id' => $article_id));
        $this->db->delete('tips', array('bridge_articles_id' => $article_id));
        $this->db->delete('warnings', array('bridge_articles_id' => $article_id));
        $this->db->delete('resources', array('bridge_articles_id' => $article_id));
    }


    /**
     * @param integer $id
     * @return timestamp with query elapsed time
     */
    function update_data($id)
    {
        $this->fill_data();
        $this->db->where($this->prefix . "id", $id);
        $this->db->update($this->table);

        return $this->db->elapsed_time();
    }

    /**
     * @param integer $id
     * @param string $field_name the name of the field
     * @param string $value the modified value
     */
    public function update_one_field($id, $field_name, $value)
    {
        $this->db->set($field_name, $value);
        $this->db->where($this->prefix . "id", $id);
        $this->db->update($this->table);
    }

    /**
     * @param integer $id
     * @return timestamp with query elapsed time
     */
    function approve($id)
    {
        $this->db->set($this->prefix . "state", 1);
        $this->db->where($this->prefix . "id", $id);
        $this->db->update($this->table);

        return $this->db->elapsed_time();
    }

    /**
     * @param integer $id
     * @return timestamp with query elapsed time
     */
    function unapprove($id)
    {
        $this->db->set($this->prefix . "state", 0);
        $this->db->where($this->prefix . "id", $id);
        $this->db->update($this->table);

        return $this->db->elapsed_time();
    }

    /**
     *
     * @param Integer $id
     * @return Object
     */

    function find_by_id($id)
    {
        return $this->db->get_where($this->table, $this->prefix . "id = '" . $id . "'")->row();
    }

    /**
     *
     */
    function add_comment()
    {
        $obj = new stdClass();
        $obj->comment_content = $this->input->post('comment_content');
        $obj->bridge_user_id = $this->authority->user->user_id;
        $obj->bridge_ar_id = $this->input->post('ar_id');
        $obj->comment_state = 1;
        $obj->comment_created_date = time();
        $this->db->insert('articles_comments', $obj);
    }

    /**
     * @param int $article_id
     * @return comments for some article array of objects
     */
    function get_comments($article_id = 0)
    {
        $this->db->join('users', 'articles_comments.bridge_user_id = users.user_id', 'left');
        $this->db->order_by('comment_correct', 'DESC');

        return $this->db->get_where('articles_comments', array('bridge_ar_id' => $article_id))->result();
    }

    /**
     *
     * @param string $slug
     * @return Object
     */

    function find_by_slug($slug = '')
    {
        $this->db->join('categories', 'categories.category_id = articles.bridge_category_id', 'left');
        $this->db->join('users', 'users.user_id = articles.ar_user_id', 'left');

        return $this->db->get_where($this->table, $this->prefix . "slug = '" . $slug . "'")->row();
    }

    /**
     * @param integer $limit
     * @return array
     */
    function find_all($limit)
    {
        $this->db->order_by($this->prefix . "ord", "asc");
        $this->db->limit($this->pagination->per_page, $limit);

        return $this->db->get($this->table)->result_array();
    }

    /**
     * @return integer (count of all the table rows)
     */
    function get_total_rows()
    {
        return $this->db->count_all_results($this->table);
    }

    /**
     * @param $id
     * @return integer (count rows with specific id)
     */
    function count_rows_where($id)
    {
        $this->db->where($this->prefix . "id", $id);

        return $this->db->get($this->table)->num_rows();
    }

    /**
     * @param integer $id
     * @return timestamp with query elapsed time
     */
    function delete($id)
    {
        $this->db->delete($this->table, $this->prefix . "id = $id");

        return $this->db->elapsed_time();
    }

    /**
     * @param string $action
     * @param array $ids
     * @return void
     */
    function bulk_action_data($action, $ids)
    {
        switch ($action) {
            case "approved":
                for ($i = 0; $i < count($ids); $i++) {
                    $this->approve($ids[$i]);
                }
                break;

            case "unapproved":
                for ($i = 0; $i < count($ids); $i++) {
                    $this->unapprove($ids[$i]);
                }
                break;

            case "delete":
                for ($i = 0; $i < count($ids); $i++) {
                    $this->delete($ids[$i]);
                }
                break;
        }
    }

    /**
     * @param integer $id
     * @return Object
     */
    function get_Parent_Table_Information($id)
    {
        $this->db->from($this->table);
        $this->db->join($this->parentTable, "prod_pc_id = pc_id");
        $this->db->where($this->prefix . "id", $id);
        $data = $this->db->get();

        return $data->row();
    }

    /**
     * @param integer $id
     * @param string $fileName
     * @return void
     */
    function update_img($id, $fileName)
    {
        $this->db->where($this->prefix . "id", $id);
        $this->db->set($this->prefix . "img", $fileName);
        $this->db->update($this->table);
    }

    /**
     * @param string $direction
     * @param integer $current
     */
    function sort($direction, $current)
    {
        $this->db->where($this->prefix . "ord", $current);
        $current_ord = $this->db->get($this->table);
        $current_ord = $current_ord->row();
        switch ($direction) {
            case "up":
                $this->db->limit(1, 0);
                $this->db->order_by($this->prefix . "ord", "desc");
                $this->db->where($this->prefix . "ord <", $current);
                $new_ord = $this->db->get($this->table);
                $new_ord = $new_ord->row();
                break;
            default:
                $this->db->limit(1, 0);
                $this->db->order_by($this->prefix . "ord", "asc");
                $this->db->where($this->prefix . "ord >", $current);
                $new_ord = $this->db->get($this->table);
                $new_ord = $new_ord->row();
                // update current
                break;
        }

        if (is_object($new_ord) and is_object($current_ord)) {
            $this->db->set($this->prefix . "ord", $new_ord->arord);
            $this->db->where($this->prefix . "id", $current_ord->arid);
            $this->db->update($this->table);

            $this->db->set($this->prefix . "ord", $current_ord->arord);
            $this->db->where($this->prefix . "id", $new_ord->arid);
            $this->db->update($this->table);
        }
    }

    /** regenerate numericable from 0 . 1 .2 .3 ascending */
    function reset_table_ord()
    {
        $allRecords = $this->db->get($this->table)->result_array();

        $i = 1;
        foreach ($allRecords as $row) {
            $this->db->where($this->prefix . "id", $row[$this->prefix . 'id']);
            $this->db->set($this->prefix . "ord", $i);
            $this->db->update($this->table);
            $i++;
        }
    }

    function list_videos($user_id, $per_page, $page_number)
    {
        $this->db->select('*');
        $this->db->from('articles');
        $this->db->join('articles_top_up', 'articles.ar_id = articles_top_up.ar_id');
        $this->db->where('ar_user_id', $user_id);

        $this->db->limit($per_page, $page_number);
        $query = $this->db->get();

        $data = [
            'result' => $query->result(),
            'count' => $this->db->from("articles")->where('ar_user_id', $user_id)->count_all_results(),
        ];
        return $data;
    }

    function un_active_ar($ar_id)
    {
        $this->db->where('ar_id', $ar_id);
        $this->db->set('ar_active', 0);
        $this->db->update($this->table);
    }
}
