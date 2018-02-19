<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Extras extends CI_Migration {

    public function up() {
        

        // $this->dbforge->drop_table('facilities', TRUE);
        $field = array(
            'category_id' => array(
                'type' => 'INT',
                'null' => true
            ),
        );
        $this->dbforge->add_column('facilities', $field);


        
        // Drop table 'hotel_facilities' if it exists
        $this->dbforge->drop_table('facility_categories', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'order' => array(
                'type' => 'INT',
                'default' => 100
            ),
        ));
        $this->dbforge->add_field('created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('facility_categories');

        
    }

    public function down() {
    }

}
