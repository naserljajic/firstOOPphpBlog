<?php
include_once('DBConfig.php');
class BlogPosts extends DBConfig {
	private $title;
	private $post;
	private $author;
	private $date_posted;


	public function __construct() {
		parent::__construct();
	}

	public function setDetails($title=null,$post=null,$author=null,$date_posted=null) {
		$this->title=$title;
		$this->post=$post;
		$sql="SELECT firstLastName FROM author WHERE id=".$author;
		$firstLastName=$this->getPosts($sql);
		foreach ($firstLastName as $key => $firstLast) {
			$this->author=$firstLast['firstLastName'];
		}
		$splitDate=explode("-",$date_posted);
		$month=$this->getDate($splitDate[1]);
		$this->date_posted=" on ".$month." ".$splitDate[2].", ".$splitDate[0];
	}

	public function getDetails() {
		return ['title'=>$this->title,'post'=>$this->post,'author'=>$this->author,'date_posted'=>$this->date_posted];
	}
	public function addnewPost($title=null,$post=null,$author=null,$date_posted=null){
		$this->title=$title;
		$this->post=$post;
		$sql="SELECT id FROM author WHERE username='".$author."'";
		$idAuthor=$this->getPosts($sql);
		foreach ($idAuthor as $key => $id) {
			$this->author=$id['id'];

		}
		
		$this->date_posted=date('Y-m-d');
		$sql="INSERT INTO posts (title,post,author_id,date_posted) VALUES ('".$this->title."','".$this->post."',".$this->author.",'".$this->date_posted."')";
		if ($this->conn->query($sql) === TRUE) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	public function getPosts($query) {
		$result=$this->conn->query($query);
		if ($result == false || ((mysqli_num_rows($result)) == 0)) {
			return false;
		}
		$rows= array();

		while($row = $result->fetch_assoc()) {
			$rows[]= $row;
		}
		return $rows;
	}


	public function getDate($month) {
		switch ($month) {
		case "01":
			$month="Janary";
			break;
		case "02":
			$month="February";
			break;
		case "03":
			$month="March";
			break;
		case "04":
			$month="April";
			break;
		case "05":
			$month="May";
			break;
		case "06":
			$month="June";
			break;
		case "07":
			$month="July";
			break;
		case "08":
			$month="August";
			break;
		case "09":
			$month="September";
			break;
		case "10";
			$month="October";
			break;
		case "11";
			$month="November";
			break;
		case "12";
			$month="December";
			break;

		default:
			# code...
			break;
	}
	return $month;

	}
}