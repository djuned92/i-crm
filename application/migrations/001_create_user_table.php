<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_user_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_user' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'id_departement' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'nik' => array(
                'type'=>'INT',
                'constraint'=>11
            ),
            'name' => array(
                'type'=>'VARCHAR',
                'constraint'=>50
            ),
            'username' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'password' => array(
                'type'=>'VARCHAR',
                'constraint'=>64
            ),
            'level' => array(
                'type'=>'INT',
                'constraint'=>1
            ),
            'status' => array(
                'type'=>'INT',
                'constraint'=>1
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_user', TRUE);
        $this->dbforge->create_table('user', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('user', TRUE);
    }
}
/* End of file '001_create_user_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/001_create_user_table.php */
