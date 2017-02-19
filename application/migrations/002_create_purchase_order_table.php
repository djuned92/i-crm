<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_purchase_order_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_purchase_order' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'id_user' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'po_no' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'po_date' => array(
                'type'=>'DATE'
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_purchase_order', TRUE);
        $this->dbforge->create_table('purchase_order', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('purchase_order', TRUE);
    }
}
/* End of file '002_create_purchase_order_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/002_create_purchase_order_table.php */
