<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_departement_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}
	
	public function up()
	{
	    $fields = array(
            'id_departement' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'departement_code' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'departement_name' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            ),
            'departement_location' => array(
                'type'=>'VARCHAR',
                'constraint'=>15
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_departement', TRUE);
        $this->dbforge->create_table('departement', TRUE);
    }
    
	public function down()
	{
	    $this->dbforge->drop_table('departement', TRUE);
    }
}
/* End of file '010_create_departement_table' */
/* Location: ./C:\xampp\htdocs\S.I.M.A\application\migrations/010_create_departement_table.php */
