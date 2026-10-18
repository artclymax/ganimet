<?php
$title = get_field('single_service_benefits_title') ?? '';
$label = get_field('single_service_benefits_label') ?? '';
$descr = get_field('single_service_benefits_descr') ?? '';
$list = get_field('single_service_benefits_list') ?? [];
$is_reverse = $args['is_reverse'] ?? false;
?>
<section class="section single-service-benefits" id="single-service-benefits">
	<div
		class="container single-service-benefits__container grid-container <?php echo $is_reverse ? 'grid-container--reverse' : '' ?>">
		<?php get_template_part('partials/section-header', null, [
			'label' => $label,
			'title' => $title,
			'descr' => $descr,
		]); ?>
		<ul class="single-service-benefits__list">
			<?php foreach ($list as $item): ?>
				<li class="single-service-benefits__item single-service-benefits-item card-box">
					<?php if ($item['image']): ?>
						<div class="single-service-benefits-item__image">
							<?php echo wp_get_attachment_image(
								$item['image']['ID'],
								'large',
								false,
								array(
									'class' => 'img',
									'alt' => $item['image']['alt'] ?: $item['title']
								)
							); ?>
						</div>
					<?php endif; ?>
					<div class="single-service-benefits-item__content">
						<h3 class="single-service-benefits-item__title title-3">
							<?php echo esc_html($item['title']) ?>
						</h3>
						<div class="single-service-benefits-item__descr descr">
							<?php echo wp_kses_post($item['descr']) ?>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>