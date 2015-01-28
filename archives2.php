<?php
/*
Template Name: Archive Test2
*/
?>

<?php get_header(); ?>

<div class="container">
  <div class="row">
  <div class="col-md-12">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Editors Choice</a></li>
    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">CFPs</a></li>
    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Resources</a></li>
    <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Jobs</a></li>
    <li role="presentation"><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab">Jobs</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="tab1">
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
        <a data-toggle="collapse" data-parent="#accordion" href="#panel1' . $this_year . '" aria-expanded="true" aria-controls="collapse' . $this_year . '">' . $this_year . '</a>
      </h4>
    </div>';
          echo '<div id="panel1' . $this_year . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $this_year . '">
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
    <div role="tabpanel" class="tab-pane" id="tab2">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php

query_posts(array('nopaging' => 1, 'category__and' => array(74) /* we want all posts, so disable paging. Order by date is default */));
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
        <a data-toggle="collapse" data-parent="#accordion" href="#panel2' . $this_year . '" aria-expanded="true" aria-controls="collapse' . $this_year . '">' . $this_year . '</a>
      </h4>
    </div>';
          echo '<div id="panel2' . $this_year . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $this_year . '">
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
    <div role="tabpanel" class="tab-pane" id="tab3"><div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php

query_posts(array('nopaging' => 1, 'category__and' => array(75) /* we want all posts, so disable paging. Order by date is default */));
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
        <a data-toggle="collapse" data-parent="#accordion" href="#panel3' . $this_year . '" aria-expanded="true" aria-controls="collapse' . $this_year . '">' . $this_year . '</a>
      </h4>
    </div>';
          echo '<div id="panel3' . $this_year . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $this_year . '">
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
    </div></div>
    <div role="tabpanel" class="tab-pane" id="tab4">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php

query_posts(array('nopaging' => 1, 'category__and' => array(77) /* we want all posts, so disable paging. Order by date is default */));
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
        <a data-toggle="collapse" data-parent="#accordion" href="#panel4' . $this_year . '" aria-expanded="true" aria-controls="collapse' . $this_year . '">' . $this_year . '</a>
      </h4>
    </div>';
          echo '<div id="panel4' . $this_year . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $this_year . '">
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

        <div role="tabpanel" class="tab-pane active" id="tab1">
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
        <a data-toggle="collapse" data-parent="#accordion" href="#panel1' . $this_year . '" aria-expanded="true" aria-controls="collapse' . $this_year . '">' . $this_year . '</a>
      </h4>
    </div>';
          echo '<div id="panel1' . $this_year . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $this_year . '">
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





    </div>
    </div>
    </div>
<?php get_footer(); ?>
