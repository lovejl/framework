<?php
namespace model;
class WelcomeMod extends \core\Model
{
	private $tableName = 'info';
	public function __construct()
	{
		parent::connect();
	}
	
	public function getInfo()
	{
		$sql = "SELECT * FROM $this->tableName";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute())
		{
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}
		return false;
	}
	
	public function insInfo($name, $content)
	{
		$sql = "INSERT INTO $this->tableName (name, content, addTime) values (?,?,?)";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute(array($name, $content,$_SERVER['REQUEST_TIME'])))
		{
			return true;
		}
		return false;
	}
}