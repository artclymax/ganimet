<?php
$page = get_page_by_path('services', OBJECT, 'page');

$title = get_field('services_section_title') ?: get_field('services_section_title', $page) ?? '';
$btn = get_field('services_section_btn') ?: get_field('services_section_btn', $page) ?? '';
?>
<?php if (have_posts()): ?>
	<section class="section services-section" id="services-section">
		<div class="container services-section__container">
			<h2 class="services-section__title title-2">
				<?php echo esc_html($title) ?>
			</h2>

			<ul class="services-section__list">
				<?php while (have_posts()):
					the_post(); ?>

					<li class="services-section__item services-section-item">
						<a class="services-section-item__link-wrapper card-box" href="<?php the_permalink() ?>">
							<div class="services-section-item__image image-box">
								<?php the_post_thumbnail() ?>
							</div>

							<div class="services-section-item__content">
								<h3 class="services-section-item__title title-3">
									<?php the_title() ?>
								</h3>

								<div class="services-section-item__descr descr">
									<?php the_excerpt() ?>
								</div>

								<?php if ($btn): ?>
									<span class="services-section-item__btn btn btn--stroke">
										<?php echo esc_html($btn) ?>
									</span>
								<?php endif; ?>
							</div>
						</a>
					</li>
				<?php endwhile; ?>

			</ul>
		</div>
	</section>
<?php endif; ?>