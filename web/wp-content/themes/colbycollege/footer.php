<?php
$printView = ( isset( $_GET['print'] ) || isset( $_GET['renderforprint'] ) ? true : false );
?>
			<?php
			$pageTemplate = get_page_template();
			if ( is_active_sidebar( 'footer1' ) && ( strpos( $pageTemplate, '/page-three-column.php' ) === false ) ) {
				?>

					<?php
					$pageTemplate = get_page_template();

					if ( strpos( $pageTemplate, '/page-three-column.php' ) !== false || strpos( $pageTemplate, 'homepage' ) !== false ) {
						?>
							<div id="siteFooter">
							  <div id="inner-footer" class="clearfix">
							  <div id="widget-footer" class="clearfix row-fluid">
									  <?php
										dynamic_sidebar( 'footer1' );
										?>
							</div>
					<nav class="clearfix">
									  <?php
										//
										// If we decide to use footer links, uncomment here.
										//bones_footer_links(); // Adjust using Menus in WordPress Admin
										?>
					</nav>
					</div>
										  <?php
					}
					?>

				</div>

					<?php
			}
			?>
			</div>

<?php
if ( ! $printView ) {
	?>
	<div class="push"></div>
	<?php
}
?>
			<?php
			if ( ! $printView ) {
				?>
			<footer id="colbytemplatefooter">

			<div id="footerWrapper">
				<div id="footerNav">
				<ul class="footerCol firstCol">
					<li><a href="https://news.colby.edu">News</a></li>
					<li><a href="https://events.colby.edu">Events</a></li>
					<li><a href="https://magazine.colby.edu/"><em>Colby</em> Magazine</a></li>
					<li><a href="https://museum.colby.edu/">Museum of Art</a></li>
					<li><a href="/">Libraries</a></li>
				</ul>
				<ul class="footerCol secondCol">
					<li><a href="https://www.colby.edu/academics/course-catalogue/about-colby/">About Colby</a></li>
					<li><a href="https://www.colby.edu/visit/">Visit Colby</a></li>
					<li><a href="https://www.colby.edu/people/people-directory/">Directory</a></li>
					<li><a href="https://map.colby.edu">Campus Map</a></li>
					<li><a href="https://www.colby.edu/humanresources/employment">Employment</a></li>

				</ul>
				<ul class="footerCol thirdCol">
					<li><a href="http://my.colby.edu">myColby</a></li>

					<li><a href="https://www.colby.edu/people/offices-directory/general-counsel/">Accessibility Policy</a></li>
					<li><a href="https://davisconnects.colby.edu/">DavisConnects</a></li>
					<li><a href="https://colby.cafebonappetit.com/">Dining Menus</a></li>
					<li><a href="https://www.colby.edu/contact-colby-college/">Site Feedback</a></li>
				</ul>
				<ul class="footerCol lastCol">
					<li id="colby-loginli"></li>
					<li><a href="https://www.colby.edu/people/offices-directory/general-counsel/">Privacy Policy</a></li>
					<li><a href="https://www.colby.edu/colbyalumni/">Alumni</a></li>
					<li><a href="https://www.colby.edu/parents/">Parents</a></li>
					<li><a href="https://afa.colby.edu/">Admissions</a></li>
				</ul>
			</div>

			<div id="contactSupportConnect">
				<div id="footerContactInfo"
				<?php
				if ( is_active_sidebar( 'footercontact' ) ) {
					echo ' class="customFooterContact"';
				}
				?>
				>
				<?php
				if ( is_active_sidebar( 'footercontact' ) ) {

					// Output whatever widgetized content that is set...
					dynamic_sidebar( 'footercontact' );

				} else {

					// Output standard footer contact information
					echo 'Colby College<br />Mayflower Hill Drive<br />Waterville, ME 04901<br />207-859-4000<br /><a href="https://colby.edu/contact-colby-college/">Contact Us</a>';
				}
				?>
				</div>
				<div id="connectSupport">
				<div id="footerSupport">
					<?php
					if ( is_active_sidebar( 'footer_right' ) ) {
						dynamic_sidebar( 'footer_right' );
					}
					?>
				</div>
				<div id="footerConnect" class=connect-wrapper>
					<h4>Connect with Colby</h4>
						<a id="facebook" title="Facebook" href="http://www.facebook.com/colbycollege" target="_blank">
														<svg height="20" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024"><path fill="#fff" d="M1024,512C1024,229.2,794.8,0,512,0S0,229.2,0,512c0,255.6,187.2,467.4,432,505.8V660H302V512H432V399.2C432,270.9,508.4,200,625.4,200c56,0,114.6,10,114.6,10V336H675.4c-63.6,0-83.4,39.5-83.4,80v96H734L711.3,660H592v357.8C836.8,979.4,1024,767.6,1024,512Z"/><path d="M711.3,660,734,512H592V416c0-40.5,19.8-80,83.4-80H740V210s-58.6-10-114.6-10C508.4,200,432,270.9,432,399.2V514H302V660H432v357.8a519.23,519.23,0,0,0,160,0V660Z" fill="transparent"/></svg>
												</a>
						<a href="https://www.instagram.com/colbycollege/" target="_blank">
														<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 504 503.9"><path fill="#fff" d="M256,49.5c67.3,0,75.2.3,101.8,1.5,24.6,1.1,37.9,5.2,46.8,8.7a78.18,78.18,0,0,1,29,18.8,77,77,0,0,1,18.8,29c3.4,8.9,7.6,22.2,8.7,46.8,1.2,26.6,1.5,34.5,1.5,101.8s-.3,75.2-1.5,101.8c-1.1,24.6-5.2,37.9-8.7,46.8a78.18,78.18,0,0,1-18.8,29,77,77,0,0,1-29,18.8c-8.9,3.4-22.2,7.6-46.8,8.7-26.6,1.2-34.5,1.5-101.8,1.5s-75.2-.3-101.8-1.5c-24.6-1.1-37.9-5.2-46.8-8.7a78.18,78.18,0,0,1-29-18.8,77,77,0,0,1-18.8-29c-3.4-8.9-7.6-22.2-8.7-46.8-1.2-26.6-1.5-34.5-1.5-101.8s.3-75.2,1.5-101.8c1.1-24.6,5.2-37.9,8.7-46.8a78.18,78.18,0,0,1,18.8-29,77,77,0,0,1,29-18.8c8.9-3.4,22.2-7.6,46.8-8.7,26.6-1.3,34.5-1.5,101.8-1.5m0-45.4c-68.4,0-77,.3-103.9,1.5S107,11.1,91,17.3A122.79,122.79,0,0,0,46.4,46.4,125,125,0,0,0,17.3,91c-6.2,16-10.5,34.3-11.7,61.2S4.1,187.6,4.1,256s.3,77,1.5,103.9,5.5,45.1,11.7,61.2a122.79,122.79,0,0,0,29.1,44.6A125,125,0,0,0,91,494.8c16,6.2,34.3,10.5,61.2,11.7s35.4,1.5,103.9,1.5,77-.3,103.9-1.5,45.1-5.5,61.2-11.7a122.79,122.79,0,0,0,44.6-29.1,125,125,0,0,0,29.1-44.6c6.2-16,10.5-34.3,11.7-61.2s1.5-35.4,1.5-103.9-.3-77-1.5-103.9-5.5-45.1-11.7-61.2a122.79,122.79,0,0,0-29.1-44.6,125,125,0,0,0-44.6-29.1C405.2,11,386.9,6.7,360,5.5S324.4,4.1,256,4.1Z" transform="translate(-4.1 -4.1)"/><path fill="#fff"  d="M256,126.6A129.4,129.4,0,1,0,385.4,256,129.42,129.42,0,0,0,256,126.6ZM256,340a84,84,0,1,1,84-84A84,84,0,0,1,256,340Z" transform="translate(-4.1 -4.1)"/><circle cx="386.4" cy="117.4" r="30.2"/></svg>
												</a>
						<a id="twitter" title="Twitter" href="http://www.twitter.com/colbycollege" target="_blank">
							<svg height="20" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 324"><rect width="400" height="400" fill="none"/><path fill="#fff" d="M126,324c150.36,0,232.63-124.69,232.63-232.64,0-3.5,0-7-.16-10.52a166.49,166.49,0,0,0,40.82-42.41,165.81,165.81,0,0,1-47,12.91,82.23,82.23,0,0,0,36-45.28,162.73,162.73,0,0,1-52,19.77,81.78,81.78,0,0,0-141.43,56,90.69,90.69,0,0,0,2.07,18.65A232.19,232.19,0,0,1,28.4,15,82.09,82.09,0,0,0,53.76,124.21a82.87,82.87,0,0,1-37-10.2v1.11a81.93,81.93,0,0,0,65.54,80.2,82.39,82.39,0,0,1-36.84,1.44,81.75,81.75,0,0,0,76.38,56.76A164,164,0,0,1,20.27,288.6,158.72,158.72,0,0,1,.82,287.49,232.58,232.58,0,0,0,126,324"/></svg>
						</a>
						<a href="https://www.linkedin.com/school/colby-college/" target="_blank">
							<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 448"><path fill="#fff" d="M416,0H31.9A32.14,32.14,0,0,0,0,32.3V415.7A32.14,32.14,0,0,0,31.9,448H416a32.22,32.22,0,0,0,32-32.3V32.3A32.22,32.22,0,0,0,416,0ZM135.4,384H69V170.2h66.5V384ZM102.2,141a38.5,38.5,0,1,1,38.5-38.5A38.52,38.52,0,0,1,102.2,141ZM384.3,384H317.9V280c0-24.8-.5-56.7-34.5-56.7-34.6,0-39.9,27-39.9,54.9V384H177.1V170.2h63.7v29.2h.9c8.9-16.8,30.6-34.5,62.9-34.5,67.2,0,79.7,44.3,79.7,101.9Z"/></svg>
						</a>
						<a id="youtube" title="YouTube" href="http://www.youtube.com/colbycollege" target="_blank">
														<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 176 124"><path d="M172.3,19.4A22.27,22.27,0,0,0,156.7,3.7C143,0,88,0,88,0S33,0,19.2,3.7A22.1,22.1,0,0,0,3.6,19.4C0,33.2,0,62,0,62s0,28.8,3.7,42.6a22.27,22.27,0,0,0,15.6,15.7C33,124,88,124,88,124s55,0,68.8-3.7a22.1,22.1,0,0,0,15.6-15.7C176,90.8,176,62,176,62S176,33.2,172.3,19.4Z" fill="#fff"/><polygon points="70 88.2 116 62 70 35.8 70 88.2" fill="transparet"/></svg>
												</a>
						<a href="https://colby.edu/newsletter/" target="_blank">
							<svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 12"><path fill="#fff" d="M15,0H1A1,1,0,0,0,0,1V11a.94.94,0,0,0,1,1H15a.94.94,0,0,0,1-1V1A1,1,0,0,0,15,0Zm-.5,1.4V2.7L8,6.3,1.6,2.7V1.4ZM1.6,10.5v-6L8,8l6.5-3.5v6.1H1.6Z"/></svg>
						</a>
					</div>
				</div>
			</div>
				<div class="clearfix">&nbsp;</div>
				</div>
			</footer>
				<?php
			}
			?>
		<!--[if lt IE 7 ]>
			  <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
			  <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/library/js/respond.min.js"></script><![endif]-->

		<script>(function() {
		var _fbq = window._fbq || (window._fbq = []);
		if (!_fbq.loaded) {
		var fbds = document.createElement('script');
		fbds.async = true;
		fbds.src = '//connect.facebook.net/en_US/fbds.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(fbds, s);
		_fbq.loaded = true;
		}
		_fbq.push(['addPixelId', '856862474372994']);
		})();
		window._fbq = window._fbq || [];
		window._fbq.push(['track', 'PixelInitialized', {}]);
		</script>
		<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=856862474372994&amp;ev=PixelInitialized" /></noscript>

<?php

wp_footer();

include 'assets/svg/sprite.svg';
