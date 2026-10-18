<?php
$page = get_page_by_path('home', OBJECT, 'page');
$archive_var = '';
$archive = '';
if (is_archive()) {
	$archive_var = get_query_var('pagename') ?: get_query_var('post_type') ?? '';
	$archive = get_page_by_path($archive_var, OBJECT, 'page');
}
$label = get_field('how_to_order_label') ?: get_field('how_to_order_label', $archive) ?: get_field('how_to_order_label', $page) ?? '';
$title = get_field('how_to_order_title') ?: get_field('how_to_order_title', $archive) ?: get_field('how_to_order_title', $page) ?? '';
$descr = get_field('how_to_order_descr') ?: get_field('how_to_order_descr', $archive) ?: get_field('how_to_order_descr', $page) ?? '';
$list = get_field('how_to_order_list') ?: get_field('how_to_order_list', $archive) ?: get_field('how_to_order_list', $page) ?? '';
$btn = get_field('how_to_order_btn') ?: get_field('how_to_order_btn', $archive) ?: get_field('how_to_order_btn', $page) ?? '';
$is_reverse = $args['is_reverse'] ?? false;
?>
<?php if ($list): ?>
	<section class="section how-to-order" id="how-to-order">
		<div class="container how-to-order__container grid-container <?php echo $is_reverse ? 'grid-container--reverse' : ''; ?>">

			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
				'btn' => $btn
			]); ?>

			<!-- GRID -->
			<ul class="how-to-order__list hidden-mobile">
				<?php foreach ($list as $index => $item): ?>
					<li class="how-to-order__item how-to-order-item card-box">
						<div class="how-to-order-item__header">
							<span class="how-to-order-item__number title-4">
								<?php echo esc_html($index > 9 ? $index + 1 : '0' . ($index + 1)) ?>
							</span>
							<h3 class="how-to-order-item__title title-4">
								<?php echo esc_html($item['title']) ?>
							</h3>
						</div>
						<div class="how-to-order-item__descr descr">
							<?php echo wp_kses_post($item['descr']) ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>


			<!-- SWIPER -->
			<div class="swiper how-to-order-swiper visible-mobile"
				data-swiper="{'slidesPerView': 1,'spaceBetween': 20,'rewind': true}">
				<div class="swiper-wrapper how-to-order-swiper__wrapper">
					<?php foreach ($list as $index => $item): ?>
						<div class="swiper-slide how-to-order-slide">
							<div class="how-to-order-slide__wrapper how-to-order-item card-box">
								<div class="how-to-order-item__header">
									<span class="how-to-order-item__number title-4">
										<?php echo esc_html($index > 9 ? $index + 1 : '0' . ($index + 1)) ?>
									</span>
									<h3 class="how-to-order-item__title title-4">
										<?php echo esc_html($item['title']) ?>
									</h3>
								</div>
								<div class="how-to-order-item__descr descr">
									<?php echo wp_kses_post($item['descr']) ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-pagination how-to-order-swiper__pagination" data-swiper-pagination=".how-to-order-swiper">
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>