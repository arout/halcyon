<?php
namespace Hal\Core;

/*
 * Get server / PHP / database and other software information
 */

class System {
    
    # PHP information
    public $php = [];
    
    public function php() {
    
        $this->php['version'] = phpversion();
        
    }
    
    public function sql

}
