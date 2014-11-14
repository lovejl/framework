<?php
/**
 * PRODUCT MOD
 * @author fanzw
 */
namespace model;

class ProductMod extends \core\Model
{
	private $tableName = 'info';
	public function __construct()
	{
		parent::connect('product');
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
	
	public function insInfo($name, $content, $pic)
	{
		$sql = "INSERT INTO $this->tableName (name, content, pic, addTime) values (?,?,?,?)";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute(array($name, $content,$pic,$_SERVER['REQUEST_TIME'])))
		{
			return true;
		}
		return false;
	}
}