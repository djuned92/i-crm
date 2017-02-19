<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_purchase_request_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_purchase_request' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'id_departement' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'pr_no' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'pr_date' => array(
                'type'=>'DATE'
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_purchase_request', TRUE);
        $this->dbforge->create_table('purchase_request', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('purchase_request', TRUE);
    }
}
/* End of file '003_create_purchase_request_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/003_create_purchase_request_table.php */
