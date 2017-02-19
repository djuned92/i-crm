<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_kepemilikan_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_kepemilikan' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'id_user' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'id_barang' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'date_received' => array(
                'type'=>'DATE'
            ),
            'kondisi' => array(
                'type'=>'INT',
                'constraint'=>1
            ),
            'notes' => array(
                'type'=>'VARCHAR',
                'constraint'=>50
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_kepemilikan', TRUE);
        $this->dbforge->create_table('kepemilikan', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('kepemilikan', TRUE);
    }
}
/* End of file '007_create_kepemilikan_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/007_create_kepemilikan_table.php */
