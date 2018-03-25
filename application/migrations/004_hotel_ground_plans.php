<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Hotel_Ground_Plans extends CI_Migration {

    public function up() {

        $this->dbforge->drop_table('hotel_ground_plans', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'hotel_id' => array(
                'type' => 'INT'
            ),
            'ground_plan_description' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'ground_plan_image' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'ground_plan_original_image' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_field('ground_plan_created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('hotel_ground_plans');

        
    }

    public function down() {
    }

}
