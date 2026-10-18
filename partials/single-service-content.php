<?php
$title = get_field('single_service_content_title') ?: get_the_title();
$content = apply_filters('the_content', get_the_content()) ?? '';

?>
<?php if ($content): ?>
	<section class="section single-service-content" id="single-service-content">
		<div class="container single-service-content__container">
			<h2 class="single-service-content__title title-2">
				<?php echo esc_html($title) ?>
			</h2>
			<div class="single-service-content__descr descr">
				<?php echo wp_kses_post($content) ?>
			</div>
		</div>
	</section>
<?php endif; ?>