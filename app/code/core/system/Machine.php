<?php
namespace Hal\Core;

/*
 * Get data about machine hardware
 */

class Machine {
    
    public $cpu = [];
    public $eth = [];
    public $hdd = [];
    public $ram = [];
    
    public function getCpu() {
    
        $cpu_result = shell_exec("cat /proc/cpuinfo | grep model\ name");
        $stat['cpu_model'] = strstr($cpu_result, "\n", true);
        $stat['cpu_model'] = str_replace("model name :", "", $stat['cpu_model']);
        
        foreach( $stat as $c ) {
        
            if( strpos( $c, ':' ) )
                $stat['cpu_model'] = str_replace(":", "", $c);
            if( strpos( $c, 'model name' ) )
                $stat['cpu_model'] = str_replace("model name", "", $c);
        }
            
        return $this->cpu['model'] = str_replace( "model name", "", $stat['cpu_model'] );

    }

}
