<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_barang_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_barang' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'id_category' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'id_brand' => array(
                'type'=>'INT',
                'constraint'=>15
            ),
            'id_specification' => array(
                'type'=>'INT',
                'constraint'=>15
            ),
            'id_departement' => array(
                'type'=>'INT',
                'constraint'=>15
            ),
            'asset_no' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'item_name' => array(
                'type'=>'VARCHAR',
                'constraint'=>255
            ),
            'warranty' => array(
                'type'=>'INT',
                'constraint'=>2
            ),
            'exp_date_wrr' => array(
                'type'=>'DATE'
            ),
            'act_condition' => array(
                'type'=>'INT',
                'constraint'=>1
            ),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_barang', TRUE);
        $this->dbforge->create_table('barang', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('barang', TRUE);
    }
}
/* End of file '011_create_barang_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/011_create_barang_table.php */
