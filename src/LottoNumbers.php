<?php

namespace App;

class LottoNumbers{
    
    private $arrayNumbers = [];
    
    public function __construct($from, $to) {
        
        for($i=$from*1;$i<=$to*1;$i++){
            $this->arrayNumbers[] = $i;
        } 
        
    }
    
    public function shuffleArray()
    {        
        shuffle($this->arrayNumbers);
        
    
    }
    
    public function getNumber()
    {
        $position = rand(0, count($this->arrayNumbers)-1);
        $ret = $this->arrayNumbers[$position];
        unset($this->arrayNumbers[$position]);
        $this->shuffleArray();
        return $ret;
    }
    
    
}

