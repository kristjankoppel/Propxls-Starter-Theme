<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  PropxlsTheme
 */

$context = Timber::context();
Timber::render( '404.twig', $context );
