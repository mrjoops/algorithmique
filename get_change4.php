<?php

/**
 * @param int $amount Montant en euros
 * @return array
 */
function get_change(int $amount): array
{
	if ($amount === 1 || $amount === 3) {
		trigger_error('Impossible', E_USER_ERROR);
	}

	$change = [
		'bill5' => 0,
		'bill10' => 0,
		'coin1' => 0,
		'coin2' => 0,
	];

	if ($amount % 2 === 1) {
		$change['bill5'] = 1;
		$amount -= 5;
	}

	$change['bill10'] = intval($amount / 10);
	$amount -= $change['bill10'] * 10;
	$change['coin2'] = intval($amount / 2);

	return $change;
}

if ($argc !== 2) {
    trigger_error("Merci de spécifier le montant en argument.\nExemple : php get_change4.php 16\n", E_USER_ERROR);
}

$change = get_change(intval($argv[1]));

print_r($change);
