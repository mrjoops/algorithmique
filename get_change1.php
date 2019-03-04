<?php

/**
 * @param int $amount Montant en euros
 * @return array
 */
function get_change(int $amount): array
{
	$change = [
		'bill5' => 0,
		'bill10' => 0,
		'coin1' => 0,
		'coin2' => 0,
	];

	$change['bill10'] = intval($amount / 10);
	$amount -= $change['bill10'] * 10;
	$change['bill5'] = intval($amount / 5);
	$amount -= $change['bill5'] * 5;
	$change['coin2'] = intval($amount / 2);
	$amount -= $change['coin2'] * 2;
	$change['coin1'] = $amount;

	return $change;
}

if ($argc !== 2) {
    trigger_error("Merci de spécifier le montant en argument.\nExemple : php get_change1.php 16\n", E_USER_ERROR);
}

$change = get_change(intval($argv[1]));

print_r($change);
