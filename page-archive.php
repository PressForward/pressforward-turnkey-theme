<?php
/*
Template Name: Archive Test
*/
?>

<?php get_header(); ?>
	<div class="container">
	<div class="row">
	<div class="col-md-12">	
	


	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php

query_posts(array('nopaging' => 1, 'category__and' => array(66) /* we want all posts, so disable paging. Order by date is default */));
$prev_year = null;
if ( have_posts() ) {
   while ( have_posts() ) {
      the_post();
      $this_year = get_the_date('Y');
      if ($prev_year != $this_year) {
          // Year boundary
          if (!is_null($prev_year)) {
             // A list is already open, close it first
             echo '</div>
    </div>
  </div>';
          }
          echo '<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading' . $this_year . '">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $this_year . '" aria-expanded="true" aria-controls="collapse' . $this_year . '">' . $this_year . '</a>
      </h4>
    </div>';
          echo '<div id="collapse' . $this_year . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $this_year . '">
      <div class="panel-body">';
      }
      echo '<li>';
      echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
      echo '</li>'; 
      $prev_year = $this_year;
   }
   echo '</div>
    </div>
  </div>';
}

?>
		</div>
		</div>
		</div>
		</div>
<?php get_footer(); ?>


<!-- http://wordpress.stackexchange.com/questions/46136/archive-by-year -->