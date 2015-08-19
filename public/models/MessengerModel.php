<?php

class MessengerModel extends Fusion\System\SystemModel {

    public function get_new( $rid ) {
        
        $get = $this->db->prepare("SELECT * FROM messenger_inbox WHERE rid = ?");
        $get->execute( array( $rid ) );
        
        return $get;
    }
}
