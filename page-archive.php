<?php
/*
Template Name: Archive Test
*/
?>

<?php get_header(); ?>
	<div class="container">
	<div class="row">
	<div class="col-md-12">			
		<header class="page-head article-header">
                
                <div class=""><h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1></div>
              
              </header> <!-- end article header -->
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			         	2015
			        </a>
			      </h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			      <div class="panel-body">
			        <ul>
			         <?php $feat_posts = get_posts('category=170&&55'); ?>
			         <?php foreach($feat_posts as $post) { ?>
						<li><?php echo $post->post_title; ?></li>
					<?php } ?>
					</ul>
			      </div>
			    </div>
			  </div>
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingTwo">
			      <h4 class="panel-title">
			        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          2014
			        </a>
			      </h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			      <div class="panel-body">
			         <ul>
			         <?php $feat_posts = get_posts('category=featured&posts_per_page=5000'); ?>
			         <?php foreach($feat_posts as $post) { ?>
						<li><?php echo $post->post_title; ?></li>
					<?php } ?>
					</ul>
			      </div>
			    </div>
			  </div>
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingThree">
			      <h4 class="panel-title">
			        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          2013
			        </a>
			      </h4>
			    </div>
			    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			      <div class="panel-body">
			         <ul>
			         <?php $feat_posts = get_posts('category=170&&55'); ?>
			         <?php foreach($feat_posts as $post) { ?>
						<li><?php echo $post->post_title; ?></li>
					<?php } ?>
					</ul>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		</div>
		</div>
<?php get_footer(); ?>