<?php
$page = 'option';

$phones = get_field('contacts_phones', $page);
$emails = get_field('contacts_emails', $page);
$address = get_field('contacts_address', $page);
$time = get_field('contacts_time', $page);

$icon_phone = get_template_directory_uri() . '/assets/images/icons/phone.svg';

?>
<div class="contacts-box">
	<?php if ($phones): ?>
		<ul class="contacts-box__list">
			<li class="contacts-box__item">
				<?php foreach ($phones as $item): ?>
					<a class="contacts-box__link icon icon--phone"
						href="tel:+<?php echo esc_attr(correct_phone($item['phone'])) ?>"
						style="--icon-bg: url('<?= esc_attr($icon_phone) ?>');">
						<span class="link"><?php echo esc_html($item['phone']) ?></span>
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

	<?php if ($emails): ?>
		<ul class="contacts-box__list">
			<li class="contacts-box__item">
				<?php foreach ($emails as $item): ?>
					<a class="contacts-box__link icon icon--email" href="mailto:<?php echo esc_attr($item['link']) ?>">
						<span class="link"><?php echo esc_html($item['link']) ?></span>
					</a>
				<?php endforeach; ?>
			</li>
		</ul>
	<?php endif; ?>

	<?php if ($address): ?>
		<div class="contacts-box__content-box icon icon--address">
			<address class="contacts-box__descr descr"><?php echo wp_kses_post($address) ?></address>
		</div>
	<?php endif; ?>

	<?php if ($time): ?>
		<div class="contacts-box__content-box icon icon--time">
			<div class="contacts-box__descr descr"><?php echo wp_kses_post($time) ?></div>
		</div>
	<?php endif; ?>
</div>