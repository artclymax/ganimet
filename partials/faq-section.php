<?php
$page = get_page_by_path('home', OBJECT, 'page');
$archive_var = '';
$archive = '';
if (is_archive()) {
	$archive_var = get_query_var('pagename') ?: get_query_var('post_type') ?? '';
	$archive = get_page_by_path($archive_var, OBJECT, 'page');
}
$label = get_field('faq_label') ?: get_field('faq_label', $archive) ?: get_field('faq_label', $page->ID) ?? '';
$title = get_field('faq_title') ?: get_field('faq_title', $archive) ?: get_field('faq_title', $page->ID) ?? '';
$descr = get_field('faq_descr') ?: get_field('faq_descr', $archive) ?: get_field('faq_descr', $page->ID) ?? '';
$list = get_field('faq_list') ?: get_field('faq_list', $archive) ?: get_field('faq_list', $page->ID) ?? '';
$btn = get_field('faq_btn') ?: get_field('faq_btn', $archive) ?: get_field('faq_btn', $page->ID) ?? '';

?>
<?php if ($list): ?>
	<section class="section faq-section" id="faq-section">
		<div class="container faq-section__container grid-container">

			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
				'btn' => $btn
			]); ?>

			<ul class="faq-section__list">
				<?php foreach ($list as $index => $item): ?>
					<li class="faq-section-item <?= !$index ? esc_attr('spoiler-active') : '' ?>" data-spoiler>
						<button class="faq-section-item__btn" data-spoiler-title>
							<h3 class="faq-section-item__title">
								<?php echo esc_html($item['title']) ?>
							</h3>
							<span class="faq-section-item__icon "></span>
						</button>
						<div class="faq-section-item__content" data-spoiler-content>
							<div class="faq-section-item__descr descr">
								<?php echo wp_kses_post($item['descr']) ?>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>