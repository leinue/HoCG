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
*  admin类
*/
class admin{
	
	private $name;
	private $pw;

	function getName(){return $this->name;}

	function getPW(){return $this->pw;}
}

/**
* class pdoOperation
* 用于封装查询语句时的必须查询过程
* @submitQuery()使用pdo的预处理语句进行查询,比较安全
* @fetchClassQuery()返回对应数据库的class
* @fetchOdd()返回单个值
*/
class pdoOperation{

	//CG数据SQL
	public $addNewCG="INSERT INTO `hocg_cg`(`title`, `introduction`, `description`, `tags`, `imgsrc`) VALUES (?,?,?,?,?)";
	public $deleteCG="DELETE FROM `hocg_cg` WHERE `id`=?";
	public $updateCG="UPDATE `hocg_cg` SET `title`=?,`introduction`=?,`description`=?,`tags`=?,`imgsrc`=?,`publicTime`=? WHERE `id`=?";
	public $getAllCG="SELECT * FROM `hocg_cg`";
	public $getOddCG="SELECT * FROM `hocg_cg` WHERE `id`=?";
	public $latestCG="SELECT * FROM `hocg_cg` WHERE `id` IN (SELECT MAX(`id`) FROM `hocg_cg`)";

	//ADMIN SQL
	public $loginIn="SELECT * FROM `hocg_admin` WHERE `name`=? AND `pw`=?";
	public $alterPW="UPDATE `hocg_admin` SET `pw`=? WHERE `name`=? AND `pw`=?";

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
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
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
		return $this->fetchOdd($this->getOddCG,array($id));
	}

	function update($id,$title,$introduction,$description,$tags,$imgsrc){
		return $this->submitQuery($this->updateCG,array($title,$introduction,$description,$tags,$imgsrc,$id));
	}

	function getLatest(){
		return $this->fetchOdd($this->latestCG,array($id));
	}

}

//$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
//$cgm=new CGManager($pdo);
//$cgm->insert('fuck','shit','bitch','poo','r.jpg');
//$cgm->delete(1);
//print_r($cgm->getAll());
//print_r($cgm->get(2));
//print_r($cgm->getLatest());

/**
* adminManager
*/
class adminManager extends pdoOperation{

	function __construct($pdo){
		parent::$pdo=$pdo;
	}

	function login($name,$pw){
		return $this->fetchClassQuery($this->loginIn,array($name,$pw),'admin');
	}

	function updatePw($name,$old,$new){
		return $this->submitQuery($this->alterPW,array($new,$name,$old));
	}
}
?>