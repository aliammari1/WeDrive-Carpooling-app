<?php
class address
{
	private $addressid = null;
	private $addressA = null;
	private $addressB = null;
	private $type = null;

	function __construct($addressA, $addressB, $type)
	{
		$this->addressA = $addressA;
		$this->addressB = $addressB;
		$this->type = $type;
	}
	function getaddressid()
	{
		return $this->addressid;
	}
	function getaddressA()
	{
		return $this->addressA;
	}
	function getaddressB()
	{
		return $this->addressB;
	}
	function gettype()
	{
		return $this->type;
	}
}
