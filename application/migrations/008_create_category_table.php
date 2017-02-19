<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_category_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_category' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'category_code' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'category_name' => array(
                'type'=>'VARCHAR',
                'constraint'=>30
            ),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_category', TRUE);
        $this->dbforge->create_table('category', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('category', TRUE);
    }
}
/* End of file '008_create_category_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/008_create_category_table.php */
