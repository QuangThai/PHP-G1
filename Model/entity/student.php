<?php
    class Student {
        var $id;
        var $firstName ;
        var $lastName;
        var $dateOfBirth;
        var $placeOfBirth;
        function _construct($firstName,$lastName,$dateOfBirth,$placeOfBirth){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->dateOfBirth = $dateOfBirth;
            $this->placeOfBirth = $placeOfBirth;
        }
        function display(){
                echo " Họ tên " .   $this->firstName ." ".$this->
                echo " Họ tên " +  $firstName;
        }
    }
?>
