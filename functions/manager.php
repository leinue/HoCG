<?php

require('config.php');
error_reporting(E_ALL ^ E_NOTICE);

/**
* CG类
*/
class CG{
	private $title;
	private $introduction;
	private $description;
	private $tags;
	private $imgsrc;
	
	function getTitle(){return $this->title;}

	function getIntroduction(){return $this->introduction;}

	function getDescription(){return $this->description;}

	function getTags(){return $this->tags;}

	function getImgsrc(){return $this->imgsrc;}

}

/**
* class pdoOperation
* 用于封装查询语句时的必须查询过程
* @submitQuery()使用pdo的预处理语句进行查询,比较安全
* @fetchClassQuery()返回对应数据库的class
* @fetchOdd()返回单个值
*/
class pdoOperation{

	public $addNewCG="INSERT INTO `hocg_cg`(`title`, `introduction`, `description`, `tags`, `imgsrc`) VALUES (?,?,?,?,?)";
	public $deleteCG="DELETE FROM `hocg_cg` WHERE `id`=?";
	public $updateCG="UPDATE `hocg_cg` SET `title`=?,`introduction`=?,`description`=?,`tags`=?,`imgsrc`=?,`publicTime`=? WHERE `id`=?";
	public $getAllCG="SELECT * FROM `hocg_cg`";

	protected static $pdo;
	
	function __construct($pdo){
		self::$pdo=$pdo;
		self::$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //禁用prepared statements的仿真效果
	}

	function submitQuery($sql,$arr){
		if(!(is_array($arr))){
			return false;
		}
		$stmt=self::$pdo->prepare($sql);
		$result=$stmt->execute($arr);
		return $result;
	}

	function fetchClassQuery($sql,$arr,$className){
		if(!(is_array($arr))){
			return false;
		}
		$stmt=self::$pdo->prepare($sql);
		$res=$stmt->execute($arr);

		$stmt->setFetchMode(PDO::FETCH_CLASS,$className);

		if ($res) {
			if($draft=$stmt->fetchAll()) {
				return $draft;
			}else{
				return false;}
		}else{
			return false;}
	}

	function fetchOdd($sql,$arr){
		if(!(is_array($arr))){
			return false;
		}
		$stmt=self::$pdo->prepare($sql);

		if($stmt){
			$stmt->execute($arr);
			$row=$stmt->fetch();
			return $row;
		}else{return false;}
	}
}

/**
* CGmanager类,用来对CG进行增删查改操作
* 
*/
class CGManager extends pdoOperation{
	
	function __construct($pdo){
		parent::$pdo=$pdo;
	}

	function insert($title,$introduction,$description,$tags,$imgsrc){
		return $this->submitQuery($this->addNewCG,array($title,$introduction,$description,$tags,$imgsrc));
	}

	function delete($id){
		return $this->submitQuery($this->deleteCG,array($id));
	}

	function getAll(){
		return $this->fetchClassQuery($this->getAllCG,array(),'CG');
	}

	function get($id){

	}

	function update($id,$title,$introduction,$description,$tags,$imgsrc){
		return $this->submitQuery($this->updateCG,array($title,$introduction,$description,$tags,$imgsrc,$id));
	}


}

$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
$cgm=new CGManager($pdo);
//$cgm->insert('fuck','shit','bitch','poo','r.jpg');
//$cgm->delete(1);
//print_r($cgm->getAll());

?>