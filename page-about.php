<?php
/*
Template Name: О компании
*/
?>
<?php get_header(); ?>
<?php get_template_part('partials/components/hero-page') ?>
<?php get_template_part('partials/section-about') ?>
<?php get_template_part('partials/about-stats') ?>
<?php get_template_part('partials/about-services') ?>
<?php get_template_part('partials/how-to-order'); ?>
<?php get_template_part('partials/why-us', null, ['is_reverse' => true]); ?>
<?php get_template_part('partials/about-benefits'); ?>

<?php get_template_part('partials/section-contacts-form'); ?>

<?php get_footer(); ?>