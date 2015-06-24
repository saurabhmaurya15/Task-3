<?php
define("text",1);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class validation{
    private $types = array("text"=>text);
    private $error;
    
    public function __construct() {
       
    }
    
    private function CheckType($type) {
        
        if(array_search($type, $this->types))
        {
            return true;
        }
        else
        {
            $this->error = "Not a valid Input type";
        }
        
    }
    public function GetError() {
        return $this->error;
        
    }
    public function Validate($input,$type) {
        echo 22;
        if($this->CheckType($type))
        {
            if($type == $this->types["text"])
            {
                echo 33;
                //echo $this->ValidateString($input);
                return $this->ValidateString($input);
            }
            else
            {
                return false;
            }
            
        }
        
    }
    
    private function ValidateString($input) {
        
        $str = filter_input($input, FILTER_SANITIZE_SPECIAL_CHARS);
        echo 11,' ',$str;
        if($str=""){
            $this->error = "Input is not correct.";
            return false;
                    
            
        }
                
        else {
                echo 'here';
                return $str;
                
            }
        
    }
}
