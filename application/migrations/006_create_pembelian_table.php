<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_pembelian_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_pembelian' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'id_purchase_order' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'id_purchase_request' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'id_invoice' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'id_supplier' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'id_barang' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'price' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'currency' => array(
                'type'=>'VARCHAR',
                'constraint'=>5
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_pembelian', TRUE);
        $this->dbforge->create_table('pembelian', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('pembelian', TRUE);
    }
}
/* End of file '006_create_pembelian_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/006_create_pembelian_table.php */
