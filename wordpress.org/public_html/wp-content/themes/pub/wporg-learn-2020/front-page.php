<?php

/**
 * The front page of the site.
 *
 * @package WPBBP
 */

get_header(); ?>

	<main id="main" class="site-main home-page" role="main">
		<section class="quick-intro">
			<div class="shapes">
				<a class="parallelogram workshops" href="/workshops/">
					<p class="dashicons-before dashicons-desktop">
						<strong><?php esc_html_e( 'Workshops', 'wporg-learn' ); ?></strong>
						<?php
						esc_html_e( 'Workshops are a great way to get hands-on with WordPress. Here are some workshops for you to level up your WordPress skills.', 'wporg-learn' );
						?>
						<u><?php esc_html_e( 'Browse Workshops', 'wporg-learn' ); ?></u>
					</p>
				</a>
				<a class="parallelogram lesson-plans" href="/lesson-plans/">
					<p class="dashicons-before dashicons-clipboard">
						<strong><?php esc_html_e( 'Lesson Plans', 'wporg-learn' ); ?></strong>
						<?php
						esc_html_e( 'Are you sharing WordPress with others? These lesson plans are designed to guide and inspire you to deliver great content.', 'wporg-learn' );
						?>
						<u><?php esc_html_e( 'Access Lesson Plans', 'wporg-learn' ); ?></u>
					</p>
				</a>
			</div>
		</section>

		<section class="about-training">
			<div class="getin">
				<div class="graphic"><span class="dashicons dashicons-welcome-learn-more"></span></div>
				<div>
					<h2 class="h3"><?php esc_html_e( 'Get Involved', 'wporg-learn' ); ?></h2>
					<p><?php esc_html_e( 'Want to get involved in creating the content for Learn WordPress?', 'wporg-learn' ); ?></p>
					<a href="//learn.wordpress.org/contribute"><?php esc_html_e( 'Learn how to contribute', 'wporg-learn' ); ?></a>
				</div>
			</div>
		</section>

		<hr>

		<section>
			<div class="row align-middle between section-heading">
				<h2 class="h4 section-heading_title"><?php esc_html_e( 'Recent Workshops', 'wporg-learn' ); ?></h2>
				<a class="section-heading_link" href="/workshops"><span aria-hidden="true"><?php esc_html_e( 'View All »', 'wporg-learn' ); ?></span><span class="screen-reader-text"><?php esc_html_e( 'View All Workshops', 'wporg-learn' ); ?></span></a>
			</div>

			<?php
			$args = array(
				'query' => wporg_get_archive_query(
					'wporg_workshop',
					array(
						'posts_per_page' => 6,
					)
				),
			);
			get_template_part( 'template-parts/component', 'video-grid', $args );
			?>
		</section>

		<hr>

		<?php $discussion_events = \WPOrg_Learn\Events\get_discussion_events(); ?>
		<?php if ( ! empty( $discussion_events ) ) : ?>
			<section class="wporg-learn-workshop-discussion-events">
				<div class="row align-middle between section-heading">
					<h2 class="h4 section-heading_title">
						<?php esc_html_e( 'Upcoming Social Learning Spaces', 'wporg-learn' ); ?>
					</h2>
					<a class="section-heading_link" href="/social-learning/">
						<?php esc_html_e( 'View All »', 'wporg-learn' ); ?>
					</a>
				</div>
				<ul class="discussion-event-list">
					<?php foreach ( $discussion_events as $event ) : ?>
						<?php get_template_part( 'template-parts/component', 'discussion-event-short-item', $event ); ?>
					<?php endforeach; ?>
				</ul>
				<p>
					<?php
					printf(
						wp_kses_post( __( 'Want to facilitate a discussion group about a workshop? <a href="%s">Apply to become a facilitator.</a>', 'wporg-learn' ) ),
						'https://learn.wordpress.org/discussion-groups/'
					);
					?>
				</p>
			</section>

			<hr>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/component', 'submit-idea-cta', array( 'icon' => 'lightbulb' ) ); ?>
	</main>

<?php get_footer();
