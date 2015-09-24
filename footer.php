    <footer id="footer" class="clearfix">
      <div id="footer-widgets">
      <?php global $brew_options; ?>
<?php if ($brew_options['block6-switch'] != 2 && $brew_options['block6-col-number'] == 3) {
       echo '<div class="container">

        <div id="footer-wrapper">
        
          <div class="row">
            <div class="col-sm-6 col-md-3">';
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : 
              endif; 
            echo '</div> <!-- end widget1 -->

            <div class="col-sm-6 col-md-3">';
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : 
              endif; 
            echo '</div> <!-- end widget2 -->

            <div class="col-sm-6 col-md-3">';
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : 
              endif; 
            echo '</div> <!-- end widget3 -->
            <div class="col-sm-6 col-md-3">';
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-4') ) : 
              endif; 
            echo '</div>  <!-- end widget4 -->

          </div> <!-- end .row -->

        </div> <!-- end #footer-wrapper -->

        </div> <!-- end .container -->
      </div> <!-- end #footer-widgets -->';
    } elseif ($brew_options['block6-switch'] != 2 && $brew_options['block6-col-number'] == 2) {
       echo '<div class="container">

        <div id="footer-wrapper">
        
          <div class="row">
            <div class="col-sm-6 col-md-4">';
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : 
              endif; 
            echo '</div> <!-- end widget1 -->

            <div class="col-sm-6 col-md-4">';
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : 
              endif; 
            echo '</div> <!-- end widget2 -->

            <div class="col-sm-6 col-md-4">';
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : 
              endif; 
            echo '</div> <!-- end widget3 -->

          </div> <!-- end .row -->

        </div> <!-- end #footer-wrapper -->

        </div> <!-- end .container -->
      </div> <!-- end #footer-widgets -->';
    } elseif ($brew_options['block6-switch'] != 2 && $brew_options['block6-col-number'] == 1) {
      echo '<div class="container">

        <div id="footer-wrapper">
        
          <div class="row">
            <div class="col-sm-6 col-md-6">';
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : 
              endif; 
            echo '</div> <!-- end widget1 -->

            <div class="col-sm-6 col-md-6">';
              if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : 
              endif; 
            echo '</div> <!-- end widget2 -->
            </div> <!-- end widget3 -->

          </div> <!-- end .row -->

        </div> <!-- end #footer-wrapper -->

        </div> <!-- end .container -->
      </div> <!-- end #footer-widgets -->';
    }
      ?>

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
  <?php echo $brew_options['tracking-code']; ?>
    </footer> <!-- end footer -->
    
    <!-- all js scripts are loaded in library/bones.php -->
    <?php wp_footer(); ?>
    <!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

  </body>

</html> <!-- end page. what a ride! -->