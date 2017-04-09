<?php
namespace controllers\display;

const TEMPLATE_EXTENSION = '.phtml';
const TEMPLATE_FOLDER = '../view/templates/';
//const TEMPLATE_PREFIX = '';

function display($template, $variables = [], $extension = TEMPLATE_EXTENSION) {
	extract($variables);
	
	ob_start();
	include TEMPLATE_FOLDER . $template . $extension;
	return ob_get_clean();
}