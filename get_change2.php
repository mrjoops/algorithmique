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

	$values = [
		'bill10' => 10,
		'bill5' => 5,
		'coin2' => 2,
		'coin1' => 1,
	];

	foreach ($values as $type => $value) {
		$change[$type] = intval($amount / $value);
		$amount -= $change[$type] * $value;
	}

	return $change;
}

if ($argc !== 2) {
    trigger_error("Merci de spécifier le montant en argument.\nExemple : php get_change2.php 16\n", E_USER_ERROR);
}

$change = get_change(intval($argv[1]));

print_r($change);
