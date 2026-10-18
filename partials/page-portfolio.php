<?php
$page = get_page_by_path('portfolio', OBJECT, 'page');

$label = get_field('page_portfolio_label') ?: $label = get_field('page_portfolio_label', $page) ?: '';
$title = get_field('page_portfolio_title') ?: $title = get_field('page_portfolio_title', $page) ?: '';
$descr = get_field('page_portfolio_descr') ?: $descr = get_field('page_portfolio_descr', $page) ?: '';
$terms = get_terms([
	'taxonomy' => 'portfolio_category',
	'hide_empty' => false,
]);

$list = [];
foreach ($terms as $term) {
	$list[] = [
		'title' => $term->name,
		'url' => get_term_link($term->term_id),
		'image' => get_field('portfolio_category_thumb', 'term_' . $term->term_id),
		'is_active' => get_queried_object_id() == $term->term_id
	];
}
?>

<section class="section page-portfolio" id="page-portfolio">
	<div class="container page-portfolio__container">
		<div class="page-portfolio__category-header grid-container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
			]); ?>
			<?php if ($list): ?>
				<ul class="page-portfolio__category page-portfolio-category">
					<?php foreach ($list as $item): ?>
						<li class="page-portfolio-category__item">
							<a class="page-portfolio-category__link card-box <?= esc_attr($item['is_active'] ? 'active-category' : '') ?>"
								href="<?php echo esc_url($item['url']) ?>">
								<?php if ($item['image']): ?>
									<div class="page-portfolio-category__image image-box">
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
								<div class="page-portfolio-category__content">
									<h3 class="page-portfolio-category__title title-3">
										<?php echo esc_html($item['title']) ?>
									</h3>
								</div>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<?php if (have_posts()): ?>
			<ul class="page-portfolio__list grid">
				<?php while (have_posts()):
					the_post(); ?>
					<li class="page-portfolio__item page-portfolio-item">
						<a class="page-portfolio-item__image image-box" href="<?php the_post_thumbnail_url() ?>"
							data-fancybox="portfolio">
							<?php the_post_thumbnail() ?>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
			<div class="page-portfolio__pagination pagination-page">
				<?php mx_pagination($wp_query, '←', '→')?>
			</div>
		<?php else: ?>
			<p>Записей не найдено.</p>
		<?php endif; ?>
	</div>
</section>