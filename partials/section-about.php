<?php
$page = get_page_by_path('about', OBJECT, 'page');

$title = get_field('section_about_title') ?: get_field('section_about_title', $page) ?? '';
$descr = get_field('section_about_descr') ?: get_field('section_about_descr', $page) ?? '';
$image = get_field('section_about_image') ?: get_field('section_about_image', $page) ?? '';
?>
<section class="section section-about" id="section-about">
	<div class="un-container section-about__un-container">
		<?php if ($image): ?>
			<div class="un-container__full section-about__image image-box">
				<?php echo wp_get_attachment_image(
					$image['ID'],
					'large',
					false,
					array(
						'class' => 'img',
						'alt' => $image['alt'] ?: $title
					)
				); ?>
			</div>
		<?php endif; ?>
		<div class="un-container__content section-about__content">
			<h2 class="section-about__title title-3">
				<?php echo esc_html($title) ?>
			</h2>
			<?php if ($descr): ?>
				<div class="section-about__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>