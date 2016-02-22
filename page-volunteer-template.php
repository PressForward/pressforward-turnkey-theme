<?php
/*
Template Name: Page -- Volunteer (DHNow Specific)
*/
?>

<?php get_header(); ?>

      <div class="container">
        <?php if (is_user_logged_in() ) { ?>
        <div class="row clearfix">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1 clearfix">
        <div class="row" id="reg-row">
        <div class="col-md-6 text-center" id="login-col">
        <h3>Nominate Content</h3>
        <?php echo '<a class="btn btn-primary" href="' .get_dashboard_url() . '/admin.php?page=pf-menu" role="button">Nominate Content</a>'; ?>
        </div>
        <div class="col-md-6 text-center">
        <h3>Manage Volunteer Dates & Profile</h3>
        <?php echo '<a class="btn btn-primary" href="' . get_edit_profile_url() . '" role="button">Manage Volunteer Dates</a> '; ?>
        </div>
        </div>
        </div>
        </div> <!-- close reg-row -->
      <?php } else { ?>
      <div class="row clearfix">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1 clearfix">
        <div class="row" id="reg-row">
        <div class="col-md-6 text-center" id="login-col">
        <h3>Editor-at-Large Login</h3>
        <?php echo '<a class="btn btn-primary" href="' . get_site_url() . '/login" role="button">Log In</a>'; ?>
        </div>
        <div class="col-md-6 text-center">
        <h3>Volunteer</h3>
        <?php echo '<a class="btn btn-primary" href="' . get_site_url() . '/registration" role="button">Register</a>'; ?>
        </div>
        </div>
        </div>
        </div> <!-- close reg-row -->
      <?php } ?>
        <div id="content" class="clearfix row">

          <div id="main" class="col-md-offset-1 col-md-10 col-md-offset-1 clearfix" role="main">


            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

              <header class="page-head article-header">

                <div class=""><h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1></div>

              </header> <!-- end article header -->

              <section class="page-content entry-content clearfix" itemprop="articleBody">
                <?php the_content(); ?>

              </section> <!-- end article section -->

              <footer>

              </footer> <!-- end article footer -->

            </article> <!-- end article -->

            <?php //comments_template('',true); ?>

            <?php endwhile; ?>

            <?php else : ?>

            <article id="post-not-found">
                <header>
                  <h1><?php _e("Not Found", "bonestheme"); ?></h1>
                </header>
                <section class="page-content entry-content clearfix" itemprop="articleBody">
                  <p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
                </section>
                <footer>
                </footer>
            </article>

            <?php endif; ?>

          </div> <!-- end #main -->

        </div> <!-- end #content -->

      </div> <!-- end .container -->

<?php get_footer(); ?>
