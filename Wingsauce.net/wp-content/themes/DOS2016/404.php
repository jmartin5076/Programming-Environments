<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( '404 ERROR, could this be a syntax error?', 'DOS2016' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
                                    <image src="https://a2ua.com/matrix/matrix-006.jpg"/>
					<p><?php _e( 'Better try again.', 'DOS2016' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>

