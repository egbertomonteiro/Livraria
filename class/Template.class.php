<?php

class Template{
	
	private $code;
	
	public function build($search, $value, $html)
	{
		$file = file_get_contents($html);
		//print_r($file);
		$this->code = str_replace($search,$value,$file);
	}
	
	public function render()
	{
		echo $this->code;
	
	}	
			
	public function __toString()
	{
		return $this->code;
	}
	
}


?>