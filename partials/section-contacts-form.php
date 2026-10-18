<?php 
$page = get_page_by_path('home', OBJECT, 'page');
$archive_var = '';
$archive = '';
if (is_archive()) {
	$archive_var = get_query_var('pagename') ?: get_query_var('post_type') ?? '';
	$archive = get_page_by_path($archive_var, OBJECT, 'page');
}
$label = get_field('section_contacts_form_label') ?: get_field('section_contacts_form_label', $archive) ?: get_field('section_contacts_form_label', $page) ?? '';
$title = get_field('section_contacts_form_title') ?: get_field('section_contacts_form_title', $archive) ?: get_field('section_contacts_form_title', $page) ?? '';
$descr = get_field('section_contacts_form_descr') ?: get_field('section_contacts_form_descr', $archive) ?: get_field('section_contacts_form_descr', $page) ?? '';
$form = get_field('section_contacts_form_form') ?: get_field('section_contacts_form_form', $archive) ?: get_field('section_contacts_form_form', $page) ?? '';
$image = get_field('section_contacts_form_image') ?: get_field('section_contacts_form_image', $archive) ?: get_field('section_contacts_form_image', $page) ?? '';
?>
<section class="section-contacts-form" id="section-contacts-form">
	<div class="container section-contacts-form__header-container">
		<?php get_template_part('partials/section-header', null, [
			'label' => $label,
			'title' => $title,
			'descr' => $descr
		]); ?>
	</div>
	<div class="section-contacts-form__section jarallax">
		<div class="container section-contacts-form__container">
			<?php get_template_part('partials/contacts-box'); ?>
			<?php if ($form): ?>
				<div class="section-contacts-form__form">
					<?php echo do_shortcode($form) ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if ($image): ?>
			<div class="section-contacts-form__image image-box jarallax-img">
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
		<?php endif; ?>
	</div>
</section>