<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Banners_Table extends CI_Migration {

    public function up() {

        $this->dbforge->drop_table('banners', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),      
            'background_color' => array(
                'type' => 'VARCHAR',
                'constraint' => '55',
                'null' => true
            ),
            'link_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'link_target' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'image_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),   
            'icon_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'active' => array(
                'type' => 'BOOLEAN',
                'default' => true,
            ),

        ));
        $this->dbforge->add_field('created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('banners');

        $this->dbforge->drop_table('banner_locales', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'banner_id' => array(
                'type' => 'INT',
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '180',
                'null' => true
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'lang_id' => array(
                'type' => 'INT',
            ),
        ));
        $this->dbforge->add_field('created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('banner_locales');

        
    }

    public function down() {
    }

}
