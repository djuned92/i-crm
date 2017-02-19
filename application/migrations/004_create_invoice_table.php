<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_invoice_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_invoice' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'id_user' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'invoice_no' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'invoice_date' => array(
                'type'=>'DATE'
            ),
            'date_received' => array(
                'type'=>'DATE'
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_invoice', TRUE);
        $this->dbforge->create_table('invoice', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('invoice', TRUE);
    }
}
/* End of file '004_create_invoice_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/004_create_invoice_table.php */
