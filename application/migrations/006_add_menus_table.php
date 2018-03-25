<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Menus_Table extends CI_Migration {

    public function up() {

        $this->dbforge->drop_table('menu_items', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'menu_id' => array(
                'type' => 'INT'
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
        ));
        $this->dbforge->add_field('created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('menu_items');

        $this->dbforge->drop_table('menu_item_locales', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'menu_item_id' => array(
                'type' => 'INT',
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => true
            ),
            'lang_id' => array(
                'type' => 'INT',
            ),
        ));
        $this->dbforge->add_field('created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('menu_item_locales');

        $this->dbforge->drop_table('menus', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '155'
            ),
        ));
        $this->dbforge->add_field('created_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('menus');

        
    }

    public function down() {
    }

}
