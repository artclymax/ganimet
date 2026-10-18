<?php
$label = $args['label'] ?? '';
$title = $args['title'] ?? '';
$descr = $args['descr'] ?? '';
$btn = $args['btn'] ?? '';
$list = $args['list'] ?? [];
$small = $args['small'] ?? [];
$is_reverse = $args['is_reverse'] ?? false;
$class = $args['class'] ?? '';
?>
<section class="section section-orders-page <?= esc_attr($class) ?>" id="section-orders-page">
	<div
		class="container section-orders-page__container grid-container <?= $is_reverse ? 'grid-container--reverse' : '' ?>">
		<?php get_template_part('partials/section-header', null, [
			'label' => $label,
			'title' => $title,
			'descr' => $descr,
			'btn' => $btn
		]) ?>

		<?php if ($list): ?>
			<ul class="section-orders-page__list">
				<?php foreach ($list as $item): ?>
					<li class="section-orders-page-item card-box">
						<?php if ($item['image']): ?>
							<div class="section-orders-page-item__icon">
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
						<div class="section-orders-page-item__content">
							<div class="section-orders-page-item__title title-3">
								<?php echo esc_html($item['title']) ?>
							</div>
							<div class="section-orders-page-item__descr descr">
								<?php echo wp_kses_post($item['descr']) ?>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ($small): ?>
			<small class="section-orders-page__small grid-container__item-wide descr">
				<?php echo wp_kses_post($small) ?>
			</small>
		<?php endif; ?>
	</div>
</section>