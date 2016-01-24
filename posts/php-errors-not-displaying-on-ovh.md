# PHP errors not displaying on OVH even though display_errors = on

This happens because OVH use a custom, optimised PHP infrastructure known as PHP-FPM. There are settings in `.ovhconfig` which determine how PHP-FPM handles things like errors, based on an `environment` setting. When `environment = production`, errors are not displayed. 

There are a few solutions:

## Change the .ovhconfig environment

Download the `.ovhconfig` file from your web hosting root. Change the `environment` flag from `production` to `development`.
	
## Disable PHP-FPM

To do this, just delete the `.ovhconfig` file from your website root. I've not tested this.

## Manually force errors to display

This is the least elegant solution. At the start of the PHP file you want to debug, add:

	ini_set('display_errors', 1); 
	error_reporting(E_ALL);

## Source

[Activer l'optimisation PHP sur son Hébergement Mutualisé OVH](https://www.ovh.com/fr/g1175.activer_loptimisation_php_sur_son_hebergement_mutualise_ovh)
[Google translation to English](https://translate.google.co.uk/translate?sl=auto&tl=en&js=y&prev=_t&hl=en&ie=UTF-8&u=https%3A%2F%2Fwww.ovh.com%2Ffr%2Fg1175.activer_loptimisation_php_sur_son_hebergement_mutualise_ovh&edit-text=&act=url)