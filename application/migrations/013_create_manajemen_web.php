<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_manajemen_web extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

		public function up()
	{
	    $fields = array(
            'id_manajemen_web' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'navbar_inverse' => array(
                'type'=>'VARCHAR',
                'constraint'=>255
            ),
            'menu_top_active' => array(
                'type'=>'VARCHAR',
                'constraint'=>255
            ),
            'page_head_line' => array(
                'type'=>'VARCHAR',
                'constraint'=>255
            ),
            'footer' => array(
                'type'=>'VARCHAR',
                'constraint'=>255
            ),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_manajemen_web', TRUE);
        $this->dbforge->create_table('manajemen_web', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('manajemen_web', TRUE);
    }

}

/* End of file 013_create_manajemen_web.php */
/* Location: ./application/migrations/013_create_manajemen_web.php */