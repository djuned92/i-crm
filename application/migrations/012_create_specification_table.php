<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_specification_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_specification' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'id_barang' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'specification_code' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'processor' => array(
                'type'=>'VARCHAR',
                'constraint'=>30
            ),
            'ram' => array(
                'type'=>'INT',
                'constraint'=>3
            ),
            'hdd' => array(
                'type'=>'INT',
                'constraint'=>7
            ),
            'display' => array(
                'type'=>'INT',
                'constraint'=>3
            ),
            'os' => array(
                'type'=>'VARCHAR',
                'constraint'=>20
            ),
            'notes' => array(
                'type'=>'VARCHAR',
                'constraint'=>50
            ),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_specification', TRUE);
        $this->dbforge->create_table('spesification', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('spesification', TRUE);
    }
}
/* End of file '012_create_spesification_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/012_create_spesification_table.php */
