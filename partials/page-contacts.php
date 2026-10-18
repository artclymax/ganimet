<?php 
$page = 'option';

$phones = get_field('contacts_phones', $page);
$emails = get_field('contacts_emails', $page);
$address = get_field('contacts_address', $page);
$time = get_field('contacts_time', $page);
$map = get_field('contacts_map', $page);
$map_title = get_field('contacts_title_map', $page);
$form = get_field('contacts_form', $page);
$title = get_field('contacts_title_form', $page);

$icon_phone = get_template_directory_uri() . '/assets/images/icons/phone.svg';
?>
<section class="section page-contacts" id="page-contacts">
	<div class="container page-contacts__container">
		<div class="page-contacts__wrapper">
			<?php if ($phones || $emails): ?>
				<div class="page-contacts__box page-contacts__box--center card-box">
					<!-- PHONES -->
					<?php if ($phones): ?>
						<ul class="page-contacts__phones contacts-box__list">
							<li class="contacts-box__item">
								<?php foreach ($phones as $item): ?>
									<a class="contacts-box__link icon icon--phone"
										href="tel:+<?php echo esc_attr(correct_phone($item['phone'])) ?>"
										style="--icon-bg: url('<?= esc_attr($icon_phone) ?>');">
										<span class="link">
											<?php echo esc_html($item['phone']) ?>
										</span>
									</a>
									<?php if (!empty($item['messengers'])): ?>
										<ul class="contacts-box__sublist">
											<?php foreach ($item['messengers'] as $msg): ?>
												<li class="contacts-box__subitem">
													<a class="contacts-box__sublink link-icon" href="<?php echo esc_attr($msg['link']) ?>"
														aria-label="<?= esc_attr($msg['title']) ?>">
														<?php echo wp_get_attachment_image($msg['image']['ID'], 'large', false, ['class' => 'img', 'alt' => $msg['image']['alt'] ?: $msg['title']]); ?>
													</a>
												</li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								<?php endforeach; ?>
							</li>
						</ul>
					<?php endif; ?>
					<!-- EMAILS -->
					<?php if ($emails): ?>
						<ul class="page-contacts__emails contacts-box__list">
							<li class="contacts-box__item">
								<?php foreach ($emails as $item): ?>
									<a class="contacts-box__link icon icon--email" href="mailto:<?php echo esc_attr($item['link']) ?>">
										<span class="link">
											<?php echo esc_html($item['link']) ?>
										</span>
									</a>
								<?php endforeach; ?>
							</li>
						</ul>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="page-contacts__box card-box">
				<?php if ($address): ?>
					<div class="page-contacts__address contacts-box__content-box icon icon--address">
						<address class="contacts-box__descr descr">
							<?php echo wp_kses_post($address) ?>
						</address>
					</div>
				<?php endif; ?>

				<?php if ($time): ?>
					<div class="page-contacts__time contacts-box__content-box icon icon--time">
						<div class="contacts-box__descr descr">
							<?php echo wp_kses_post($time) ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($form): ?>
			<div class="page-contacts__form-box card-box">
				<?php if ($title): ?>
					<h2 class="page-contacts__form-title title-3">
						<?php echo esc_html($title) ?>
					</h2>
				<?php endif; ?>
				<div class="page-contacts__form">
					<?php echo do_shortcode($form) ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($map): ?>
			<div class="page-contacts__map-box">
				<?php if ($map_title): ?>
					<h3 class="page-contacts__title title-3">
						<?php echo esc_html($map_title) ?>
					</h3>
				<?php endif; ?>
				<div class="page-contacts__map">
					<?php echo wp_kses($map, [
						'iframe' => [
							'src' => true,
							'width' => true,
							'height' => true,
							'style' => true,
							'allowfullscreen' => true,
							'loading' => true,
						],
					]) ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>