<?php
$page = get_page_by_path('about', OBJECT, 'page');

$first_col = get_field('about_benefits_first_col') ?: get_field('about_benefits_first_col', $page) ?? '';
$second_col = get_field('about_benefits_second_col') ?: get_field('about_benefits_second_col', $page) ?? '';
$gallery = get_field('about_benefits_gallery') ?: get_field('about_benefits_gallery', $page) ?? '';
?>
<?php if ($first_col || $second_col || $gallery): ?>
	<section class="section about-benefits" id="about-benefits" style="--items-count: <?= esc_attr(count($gallery) + 2)?>">
		<div class="container about-benefits__container">
			<!-- COL-1-->
			<?php if ($first_col): ?>
				<div class="about-benefits__col about-benefits__col-1 about-benefits-content">
					<h3 class="about-benefits__title title-3">
						<?php echo esc_html($first_col['title']) ?>
					</h3>
					<div class="about-benefits__descr descr">
						<?php echo wp_kses_post($first_col['descr']) ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ($second_col): ?>
				<!-- COL-2 -->
				<div class="about-benefits__col about-benefits__col-2 about-benefits-content">
					<h3 class="about-benefits__title title-3">
						<?php echo esc_html($second_col['title']) ?>
					</h3>
					<div class="about-benefits__descr descr">
						<?php echo wp_kses_post($second_col['descr']) ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ($gallery): ?>
				<?php foreach ($gallery as $index => $image): ?>
					<!-- COL-IMG -->
					<div
						class="about-benefits__col about-benefits__col-<?= esc_attr(++$index + 2); ?> about-benefits-image image-box">
						<?php echo wp_get_attachment_image(
							$image['ID'],
							'large',
							false,
							array(
								'class' => 'img',
								'alt' => $image['alt'] ?: ''
							)
						); ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>