<?php
include_once('header.php');
include_once('BlogPosts.php');
$posts=new BlogPosts();
$query="SELECT * FROM posts ORDER BY id DESC";
$result=$posts->getPosts($query);
?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/index.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">My first OOP PHP blog</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php 
        if (is_array($result) || is_object($result)) {
            foreach ($result as $key => $res) {
              $posts->setDetails($res['title'],$res['post'],$res['author_id'],$res['date_posted']);
              $post=$posts->getDetails();?>
        <div class="post-preview">
          <a href="post.php?id=<?php echo $res['id'];?>">
            <h2 class="post-title">
              <?php echo $post['title']; ?>
            </h2>
            <h3 class="post-subtitle">
              <?php echo $post['post']; ?>
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#"><?php echo $post['author']; ?></a><?php 
            echo $post['date_posted'];
            ?></p>
        </div>
        <?php 
      }
        }
        ?>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>
<?php
include_once('footer.php');
?>