<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_supplier_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_supplier' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'supplier_code' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'supplier_name' => array(
                'type'=>'VARCHAR',
                'constraint'=>30
            ),
            'address' => array(
                'type'=>'VARCHAR',
                'constraint'=>11
            ), 
            'phone' => array(
                'type'=>'INT',
                'constraint'=>15
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_supplier', TRUE);
        $this->dbforge->create_table('supplier', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('supplier', TRUE);
    }
}
/* End of file '005_create_supplier_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/005_create_supplier_table.php */
