<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Facility_Field extends CI_Migration {

    public function up() {
        

        $field = array(
            'is_main' => array(
                'type' => 'INT',
                'default' => 0
            ),
            'order' => array(
                'type' => 'INT',
                'default' => 100
            )
        );
        $this->dbforge->add_column('facilities', $field);

        
    }

    public function down() {
    }

}
