<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_brand_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_brand' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'brand_code' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'brand_name' => array(
                'type'=>'VARCHAR',
                'constraint'=>30
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_brand', TRUE);
        $this->dbforge->create_table('brand', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('brand', TRUE);
    }
}
/* End of file '009_create_brand_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/009_create_brand_table.php */
