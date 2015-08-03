    <footer id="footer" class="clearfix">
      <div id="footer-widgets">

        <div class="container">

        <div id="footer-wrapper">

          <div class="row">
            <div class="col-sm-6 col-md-3">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>
              <?php endif; ?>
            </div> <!-- end widget1 -->

            <div class="col-sm-6 col-md-3">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
              <?php endif; ?>
            </div> <!-- end widget1 -->

            <div class="col-sm-6 col-md-3">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : ?>
              <?php endif; ?>
            </div> <!-- end widget1 -->

            <div class="col-sm-6 col-md-3">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-4') ) : ?>
              <?php endif; ?>
            </div> 

          </div> <!-- end .row -->

        </div> <!-- end #footer-wrapper -->

        </div> <!-- end .container -->
      </div> <!-- end #footer-widgets -->

      <div id="sub-floor">
        <div class="container">
          <div class="row">
            <div class="col-md-4 copyright">
              &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
            </div>
            <div class="col-md-4 col-md-offset-4 attribution">
              
            </div>
          </div> <!-- end .row -->
        </div>
      </div>

    </footer> <!-- end footer -->

    <!-- all js scripts are loaded in library/bones.php -->
    <?php wp_footer(); 

    if ( is_page_template( 'page-schedule.php' ) ) {
      //echo '<script src="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>';
      echo '<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>';
      echo '<script src="' .  get_template_directory_uri() . '/library/js/tabletop.js"></script>';
      echo '<script src="' .  get_template_directory_uri() . '/library/js/simple.js"></script>';
     

        }    ?>

    <!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

  </body>

</html> <!-- end page. what a ride! -->
