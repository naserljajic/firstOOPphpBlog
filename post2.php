<?php
include_once('BlogPosts.php');
$posts=new BlogPosts();
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	if (!empty($_GET['id'])) {
		$id=(int)$_GET['id'];
		$sql="SELECT * FROM posts WHERE id=".$id;
		$result=$posts->getPosts($sql);
		if (is_array($result) || is_object($result)) {
			foreach ($result as $key => $res) {
				$posts->setDetails($res['title'],$res['post'],$res['author_id'],$res['date_posted']);
				$post=$posts->getDetails();
				echo "<h1>".$post['title']."</h1>";
				echo "<p>".$post['post']."</p>";
				echo "<p>Author ".$post['author'].$post['date_posted'];
			}
		}else {
			echo "<h2> Prazan je </h2>";
		}
	}else {
		echo "<h1> The post not founded</h1>";
	}
}