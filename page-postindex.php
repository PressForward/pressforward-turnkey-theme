<?php
/*
Template Name: Page -- Post Index Page
*/
?>

<?php get_header(); ?>
<div class="container">

        <div id="content" class="clearfix row">
        
          <div id="main" class="col-md-offset-1 col-md-10 col-md-offset-1 clearfix" role="main">

            
            <?php if ( function_exists('custom_breadcrumb') ) { custom_breadcrumb(); } ?> 

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
              
              <header class="page-head article-header">
                
                <div class=""><h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1></div>
              
              </header> <!-- end article header -->
            
              <section class="page-content entry-content clearfix" itemprop="articleBody">



<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><?php echo $brew_options['Category1-Tab Title'] ?></a></li>
    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><?php echo $brew_options['Category2-Tab Title'] ?></a></li>
    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><?php echo $brew_options['Category3-Tab Title'] ?></a></li>
    <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"><?php echo $brew_options['Category4-Tab Title'] ?></a></li>
    <li role="presentation"><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab"><?php echo $brew_options['Category5-Tab Title'] ?></a></li>
    <li role="presentation"><a href="#tab6" aria-controls="tab6" role="tab" data-toggle="tab"><?php echo $brew_options['Category6-Tab Title'] ?></a></li>
     <li role="presentation"><a href="#tab7" aria-controls="tab7" role="tab" data-toggle="tab"><?php echo $brew_options['Category7-Tab Title'] ?></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="tab1">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php
          $tab1category = $brew_options['tab1-category'];
          query_posts(array('nopaging' => 1, 'category__and' => array($brew_options['tab1-category']) /* we want all posts, so disable paging. Order by date is default */));
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
    </div> <!-- close tab panel -->
    <div role="tabpanel" class="tab-pane" id="tab2">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php

        query_posts(array('nopaging' => 1, 'category__and' => array($brew_options['tab2-category']) /* we want all posts, so disable paging. Order by date is default */));
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
    </div> <!-- close tabpanel -->
    <div role="tabpanel" class="tab-pane" id="tab3">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <?php

          query_posts(array('nopaging' => 1, 'category__and' => array($brew_options['tab3-category']) /* we want all posts, so disable paging. Order by date is default */));
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
      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="tab4">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php

        query_posts(array('nopaging' => 1, 'category__and' => array($brew_options['tab4-category']) /* we want all posts, so disable paging. Order by date is default */));
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
    <div role="tabpanel" class="tab-pane" id="tab5">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php

        query_posts(array('nopaging' => 1, 'category__and' => array($brew_options['tab5-category']) /* we want all posts, so disable paging. Order by date is default */));
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
                <a data-toggle="collapse" data-parent="#accordion" href="#panel5' . $this_year . '" aria-expanded="true" aria-controls="collapse' . $this_year . '">' . $this_year . '</a>
              </h4>
            </div>';
                  echo '<div id="panel5' . $this_year . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $this_year . '">
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
    <div role="tabpanel" class="tab-pane" id="tab6">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php

        query_posts(array('nopaging' => 1, 'category__and' => array($brew_options['tab6-category']) /* we want all posts, so disable paging. Order by date is default */));
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
                <a data-toggle="collapse" data-parent="#accordion" href="#panel6' . $this_year . '" aria-expanded="true" aria-controls="collapse' . $this_year . '">' . $this_year . '</a>
              </h4>
            </div>';
                  echo '<div id="panel6' . $this_year . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $this_year . '">
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
    <div role="tabpanel" class="tab-pane" id="tab7">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php

        query_posts(array('nopaging' => 1, 'category__and' => array($brew_options['tab7-category']) /* we want all posts, so disable paging. Order by date is default */));
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
                <a data-toggle="collapse" data-parent="#accordion" href="#panel7' . $this_year . '" aria-expanded="true" aria-controls="collapse' . $this_year . '">' . $this_year . '</a>
              </h4>
            </div>';
                  echo '<div id="panel7' . $this_year . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $this_year . '">
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






    </div> <!-- end tab-content-->     
  </div><!--end tabpanel-->

</div> <!--end main-->

</section> <!-- end article section -->
              
              <footer>
        
                
                
              </footer> <!-- end article footer -->
            
            </article> <!-- end article -->
            
            <?php //comments_template('',true); ?>
            </div> <!-- end #main -->
            
        </div> <!-- end #content -->

      </div> <!-- end .container -->
<?php get_footer(); ?>