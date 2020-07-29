<?php

Class Trophy{
	
	public $shape;
	public $metalType;
	public $metalPurity; 
	public $coatingElement;
	public $coatingThickness;
	public $data;
	public $file_data ;
	public $length;
	public $height;
	public $width;
	public $radius;

	
	public function __construct($shape,  $metalType, $metalPurity, $coatingElement, $coatingThickness , $length, $height,$width,$radius){
		
		$this->setShape($shape);
		$this->setMetalType($metalType);
		$this->setMetalPurity($metalPurity);
		$this->setCoatingElement($coatingElement);
		$this->setCoatingThickness($coatingThickness);
		$this->setLength($length);
		$this->setHeight($height);
		$this->setWidth($width);
		$this->setRadius($radius);
		$this->file_data =  file_get_contents('costData.json');
		$this->data = json_decode($this->file_data, TRUE);
	}
	
	public function setShape($shape){
		$this->shape = $shape;
	}
	
	public function setMetalType($metalType){
		$this->metalType = $metalType;
	}
	
	public function setMetalPurity($metalPurity=50){
		$this->metalPurity = $metalPurity;
	}
	
	public function setCoatingElement($coatingElement){
		$this->coatingElement = $coatingElement;
	}
	public function setCoatingThickness($coatingThickness=9){
		$this->coatingThickness = $coatingThickness;
	
	}
	public function setLength($length){
		$this->length=$length;
	}public function setHeight($height){
		$this->height=$height;
	}public function setWidth($width){
		$this->width=$width;
	}
	public function setRadius($radius){
		$this->radius=$radius;
	}

	
	public function getMetalCost(){

        if ($this->metalType == 'aluminium') {
            return $this->data['metal']['aluminium'];
        } else if ($this->metalType == "steel") {
            return $this->data['metal']['steel'];
        } else if ($this->metalType == "copper") {
            return $this->data['metal']['copper'];
        } else {
            return 0;
        }

    }
	
	public function getCoatingCost(){

        if ($this->coatingElement == 'gold') {
            return $this->data['coating']['gold'];
        } else if ($this->coatingElement == "silver") {
            return $this->data['coating']['silver'];
        } else if ($this->coatingElement == "bronze") {
            return $this->data['coating']['bronze'];
        } else {
            return 0;
        }
    }
	
		
	public function sphereVolume(){
        return (4 * 3.14 * pow($this->radius, 3)) / 3;
    }	
		
	public function sphereSurfaceArea(){
        return 4 * 3.14 * pow($this->radius, 2);
    }

    public function cylinderVolume(){
        return 3.14 * pow($this->radius, 2) * $this->height;
    }

    public function cylinderSurfaceArea(){
        return 2 * 3.14 * $this->radius * ($this->radius + $this->height);
    }

    public function cubeVolume(){
        return $this->length * $this->width * $this->height;
    }

    public function cubeSurfaceArea(){
        return 6 * pow($this->length, 2);
    }

    public function cuboidVolume(){
        return $this->length * $this->width * $this->height;
    }

    public function cuboidSurfaceArea(){
        return 2 * ($this->length * $this->width + $this->width * $this->height + $this->height * $this->length);
    }
	

	
	
	
	public function cost($volume, $surface)
    {
        $metal_cost = $this->getMetalCost();
        $coating_cost = $this->getCoatingCost();
        return $metal_cost * $volume * $this->metalPurity / 100 + $coating_cost * $surface * $this->coatingThickness;
    }
	

		

	
	 public function getVolume()
    {
        $shape = $this->shape;
        return $shape . 'Volume';
    }

    public function getSuraceArea()
    {
        $shape = $this->shape;
        return $shape . 'SurfaceArea';
    }
	
	
   
}




?>













