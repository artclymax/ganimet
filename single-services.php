<?php get_header(); ?>
<?php get_template_part('partials/components/hero-page') ?>

<?php if (have_posts()): ?>
	<?php while (have_posts()):
		the_post(); ?>
		<?php get_template_part('partials/single-service-content'); ?>
		<?php get_template_part('partials/section-implementation'); ?>
		<?php get_template_part('partials/single-service-benefits'); ?>
		<?php get_template_part('partials/section-portfolio'); ?>
		<?php get_template_part('partials/how-to-order'); ?>
		<?php get_template_part('partials/faq-section'); ?>
		<?php get_template_part('partials/section-contacts-form'); ?>
	<?php endwhile; ?>
<?php else: ?>
	<section class="section index-section">
		<div class="container descr ">
			<p>Записей не найдено.</p>
		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>