<?php $toggle_footer = Kirki::get_option('pftk_opts', 'toggle-footer'); ?>
<?php if ($toggle_footer == true): ?>
					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="large-12 medium-12 columns">
								<nav role="navigation">
		    						<?php pressforward_tk_theme_footer_links(); ?>
		    					</nav>
		    				</div>
							<?php $toggle_copyright = Kirki::get_option('pftk_opts', 'toggle-copyright');
							$toggle_footer_text = Kirki::get_option('pftk_opts', 'toggle-footer-text');
							$footer_text = Kirki::get_option('pftk_opts', 'footer-text');
							if ($toggle_copyright == true && $toggle_footer_text == true): ?>
							<div class="large-6 medium-6 columns">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
							</div>
							<div class="large-6 medium-6 columns">
								<?php echo $footer_text; ?>
							</div>
						<?php elseif($toggle_copyright == true && $toggle_footer_text == false): ?>
							<div class="large-12 medium-12 columns">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
							</div>
						<?php elseif($toggle_copyright == false && $toggle_footer_text == true): ?>
							<div class="large-12 medium-12 columns">
								<p><?php echo $footer_text; ?></p>
							</div>
						<?php endif; ?>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				<?php endif; //end if $toggle_footer ?>
				</div>  <!-- end .main-content -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
