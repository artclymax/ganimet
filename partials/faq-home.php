<?php
$page = get_page_by_path('home', OBJECT, 'page');
if (is_archive()) {
	$archive_var = get_query_var('pagename') ?: get_query_var('post_type') ?? '';
	$archive = get_page_by_path($archive_var, OBJECT, 'page');
}
$label = get_field('faq_label') ?: get_field('faq_label', $archive) ?: get_field('faq_label', $page->ID) ?? '';
$title = get_field('faq_title') ?: get_field('faq_title', $archive) ?: get_field('faq_title', $page->ID) ?? '';
$descr = get_field('faq_descr') ?: get_field('faq_descr', $archive) ?: get_field('faq_descr', $page->ID) ?? '';
$list = get_field('faq_list') ?: get_field('faq_list', $archive) ?: get_field('faq_list', $page->ID) ?? '';

?>
<?php if ($list): ?>
	<section class="section faq-home" id="faq-home">
		<div class="container faq-home__container grid-container grid-container--reverse">

			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
			]); ?>

			<ul class="faq-home__list">
				<?php foreach ($list as $index => $item): ?>
					<li class="faq-home-item <?= !$index ? esc_attr('spoiler-active') : '' ?> card-box" data-spoiler>
						<button class="faq-home-item__btn" data-spoiler-title>
							<h3 class="faq-home-item__title">
								<?php echo esc_html($item['title']) ?>
							</h3>
							<span class="faq-home-item__icon faq-icon-plus"></span>
						</button>
						<div class="faq-home-item__content" data-spoiler-content>
							<div class="faq-home-item__descr descr">
								<?php echo wp_kses_post($item['descr']) ?>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>