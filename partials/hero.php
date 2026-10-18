<?php
$page = get_page_by_path('home');

$label = get_field('hero_label', $page) ?? '';
$title = get_field('hero_title', $page) ?? '';
$descr = get_field('hero_descr', $page) ?? '';
$btn = get_field('hero_btn', $page) ?? '';

$media_first = get_field('hero_media_first', $page) ?? '';
$media_second = get_field('hero_media_second', $page) ?? '';
$media_third = get_field('hero_media_third', $page) ?? '';
$media_fourth = get_field('hero_media_fourth', $page) ?? '';
$media_fifth = get_field('hero_media_fifth', $page) ?? '';

?>

<section class="hero" id="hero">
	<div class="container hero__container">
		<div class="hero__content">
			<?php if ($label): ?>
				<p class="hero__label label">
					<?php echo esc_html($label) ?>
				</p>
			<?php endif; ?>
			<h1 class="hero__title title-2">
				<?php echo esc_html($title) ?>
			</h1>
			<?php if ($descr): ?>
				<div class="hero__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			<?php endif; ?>
			<?php if ($btn): ?>
				<a class="hero__btn btn" href="<?php echo esc_attr($btn['url']) ?>">
					<?php echo esc_html($btn['title']) ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="hero__media hero-media">
			<?php if ($media_first): ?>
				<div class="hero-media__item hero-media-item hero-media-item--first hero-media-item--image">
					<?php if ($media_first['image']): ?>
						<div class="hero-media-item__image image-box">
							<?php echo wp_get_attachment_image(
								$media_first['image']['ID'],
								'large',
								false,
								array(
									'class' => 'img',
									'alt' => $media_first['image']['alt'] ?: ''
								)
							); ?>
						</div>
					<?php endif; ?>
					<div class="hero-media-item__content">
						<p class="hero-media-item__text title-3">
							<?php echo esc_html($media_first['text']) ?>
						</p>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($media_second): ?>
				<div
					class="hero-media__item hero-media-item hero-media-item--second hero-media-item--image hero-media-item--image-reverse">
					<?php if ($media_second['image']): ?>
						<div class="hero-media-item__image image-box">
							<?php echo wp_get_attachment_image(
								$media_second['image']['ID'],
								'large',
								false,
								array(
									'class' => 'img',
									'alt' => $media_second['image']['alt'] ?: ''
								)
							); ?>
						</div>
					<?php endif; ?>
					<div class="hero-media-item__content">
						<p class="hero-media-item__text title-4">
							<?php echo esc_html($media_second['text']) ?>
						</p>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($media_third): ?>
				<div class="hero-media__item hero-media-item hero-media-item--third hero-media-item--content">
					<div class="hero-media-item__content">
						<?php if ($media_third['number']): ?>
							<span class="hero-media-item__number">
								<?php echo esc_html($media_third['number']) ?>
							</span>
						<?php endif; ?>
						<p class="hero-media-item__text">
							<?php echo esc_html($media_third['text']) ?>
						</p>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($media_fourth): ?>
				<div
					class="hero-media__item hero-media-item hero-media-item--fourth hero-media-item--content hero-media-item--text">
					<div class="hero-media-item__content">
						<p class="hero-media-item__text">
							<?php echo esc_html($media_fourth['text']) ?>
						</p>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($media_fifth): ?>
				<div class="hero-media__item hero-media-item hero-media-item--fifth hero-media-item--image">
					<?php if ($media_fifth['image']): ?>
						<div class="hero-media-item__image image-box">
							<?php echo wp_get_attachment_image(
								$media_fifth['image']['ID'],
								'large',
								false,
								array(
									'class' => 'img',
									'alt' => $media_fifth['image']['alt'] ?: ''
								)
							); ?>
						</div>
					<?php endif; ?>
					<div class="hero-media-item__content">
						<p class="hero-media-item__text title-3">
							<?php echo esc_html($media_fifth['text']) ?>
						</p>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>