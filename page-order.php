<?php
/*
Template Name: Как заказать
*/
?>
<?php get_header(); ?>
<?php get_template_part('partials/components/hero-page') ?>

<?php get_template_part('partials/how-to-order'); ?>
<?php get_template_part('partials/section-orders-page', null, [
	'label' => get_field('order_calc_data_label'),
	'title' => get_field('order_calc_data_title'),
	'descr' => get_field('order_calc_data_descr'),
	'btn' => get_field('order_calc_data_btn'),
	'list' => get_field('order_calc_data_list'),
	'is_reverse' => true
]); ?>
<?php get_template_part('partials/section-orders-page', null, [
	'label' => get_field('dont_have_template_label'),
	'title' => get_field('dont_have_template_title'),
	'descr' => get_field('dont_have_template_descr'),
	'btn' => get_field('dont_have_template_btn'),
	'list' => get_field('dont_have_template_list'),
	'is_reverse' => false,
	'class' => 'items-reverse'
]); ?>
<?php get_template_part('partials/section-orders-page', null, [
	'label' => get_field('payment_delivery_label'),
	'title' => get_field('payment_delivery_title'),
	'descr' => get_field('payment_delivery_descr'),
	'btn' => get_field('payment_delivery_btn'),
	'list' => get_field('payment_delivery_list'),
	'small' => get_field('payment_delivery_small'),
	'is_reverse' => true,
]); ?>
<?php get_template_part('partials/faq-section'); ?>
<?php get_template_part('partials/section-contacts-form'); ?>

<?php get_footer(); ?>