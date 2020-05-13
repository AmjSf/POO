<?php
class Car {
    private $registrationNumber = 0;
    private $dateOfCirculation = '1970/1/1';
    private $mileage = 0;
    private $model = "";
    private $brand = "";
    private $color = "";
    private $weight = 0;
    private $img = "";
    private $country = "";
    private $wear = "";
    private $reserved = "";
    private $age = 0;
    private $utility = "";
    

    function __construct($mileage,$model,$date,$brand,$platesNum,$color,$weight){
        $this->registrationNumber = $platesNum;
        $this->dateOfCirculation = $date;
        $this->brand = $brand;
        $this->mileage = $mileage;
        $this->model = $model;
        $this->color = $color;
        $this->weight = $weight;
        update();
    }

    private function update(){
        $this->$utility = ($this->$weight > 3.5) ? "utilitarian" : "commercial";
        $this->$reserved = ($this->$brand == "Audi") ? "reserved" : "free";
        $countr = substr($this->$registrationNumber,0,2);
        switch($countr){
            case "FR" :
                $this->$country = "France";
            break;
            case "DE" :
                $this->$country = "Germany";
            break;
            case "BE" :
                $this->$country = "Belgium";
            break;
            default :
            $this->$country = "Unknown";
            break;
        }
        if($this->$mileage < 100000){
            $this->$wear = "low";
        }elseif($this->$mileage < 200000){
            $this->$wear = "middle";
        }else{
            $this->$wear = "high";
        }
    }

    public function setMileage($mileage){
        $this->mileage = $mileage;
        update();
    }

    public function drive(){
        $this->mileage = $this->mileage + 100000;
        update();
    }

    public function display(){
        return "
        <table>
            <th>
                <td>Image</td>
                <td>Model</td>
                <td>Brand</td>
                <td>Mileage</td>
                <td>Color</td>
            </th>
            <tr>
                <td>".$this->img."</td>
                <td>".$this->model."</td>
                <td>".$this->brand."</td>
                <td>".$this->mileage."</td>
                <td>".$this->color."</td>
            </tr>
        </table>
        ";
    }
}