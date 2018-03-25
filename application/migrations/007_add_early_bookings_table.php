<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Early_Bookings_Table extends CI_Migration {

    public function up() {

        $this->dbforge->drop_table('early_bookings', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'percentage' => array(
                'type' => 'FLOAT',
            ),
            'valid_until' => array(
                'type' => 'DATE',
            ),
            'active' => array(
                'type' => 'BOOLEAN',
                'default' => true
            )
        ));
        $this->dbforge->add_field('created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('early_bookings');

        $this->dbforge->drop_table('early_booking_packages', TRUE);
        $this->dbforge->add_field(array(
            'early_booking_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE
            ),
            'package_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE
            ),
        ));
        $this->dbforge->add_field('created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_key('early_booking_id', TRUE);
        $this->dbforge->add_key('package_id', TRUE);
        $this->dbforge->create_table('early_booking_packages');

        
    }

    public function down() {
    }

}
