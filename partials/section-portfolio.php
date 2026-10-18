<?php
$page = get_page_by_path('home', OBJECT, 'page');
$label = get_field('section_portfolio_label') ?: get_field('section_portfolio_label', $page->ID);
$title = get_field('section_portfolio_title') ?: get_field('section_portfolio_title', $page->ID);
$descr = get_field('section_portfolio_descr') ?: get_field('section_portfolio_descr', $page->ID);
$btn = get_field('section_portfolio_btn') ?: get_field('section_portfolio_btn', $page->ID);

$categories = get_terms([
	'taxonomy' => 'portfolio_category',
	'hide_empty' => false,
]);
?>
<section class="section section-portfolio" id="section-portfolio">
	<div class="container section-portfolio__container grid-container grid-container--reverse">

		<?php get_template_part('partials/section-header', null, [
			'label' => $label,
			'title' => $title,
			'descr' => $descr,
			'btn' => $btn,
			'btn_class' => 'btn--stroke'
		]); ?>

		<div class="section-portfolio__box card-box">
			<ul class="section-portfolio__category-list">
				<?php foreach ($categories as $category): ?>
					<div class="section-portfolio__category section-portfolio-category">
						<a class="section-portfolio-category__link"
							href="<?php echo esc_url(get_term_link($category->term_id)) ?>">
							<?php if ($image = get_field('portfolio_category_thumb', 'term_' . $category->term_id)): ?>
								<div class="section-portfolio-category__image image-box">
									<?php echo wp_get_attachment_image(
										$image['ID'],
										'large',
										false,
										array(
											'class' => 'img',
											'alt' => $image['alt'] ?: $category->name
										)
									); ?>
								</div>
							<?php endif; ?>
							<h3 class="section-portfolio-category__title">
								<?php echo esc_html($category->name) ?>
							</h3>
						</a>
					</div>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>