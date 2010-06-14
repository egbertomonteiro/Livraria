<?php
class Xml{

	private $file;
	private $xml;
	public function __construct($file){
		$this->file=file_get_contents($file);
		$this->xml = new SimpleXMLElement($this->file);
	}

	public function setConstant(){
		foreach($this->xml->children() as $val){
			define(strtoupper($val->getName()),$val);
		}
	}
	public function printConstant(){
		foreach($this->xml->children() as $val){
                        echo strtoupper($val->getName())."=".$val."\n";
                }
	}
	public function dsn(){
		$dsn=DRIVER.":host=".SERVER.";dbname=".DATABASE;
		return $dsn;
	}
}
