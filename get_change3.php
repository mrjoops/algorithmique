<?php

/**
 * @param int $amount Montant en centimes
 * @return array
 */
function get_change(int $amount): array
{
	$change = [];
	$values = [
		'bill500' => 50000,
		'bill200' => 20000,
		'bill100' => 10000,
		'bill50' => 5000,
		'bill20' => 2000,
		'bill10' => 1000,
		'bill5' => 500,
		'coin2' => 200,
		'coin1' => 100,
		'cent50' => 50,
		'cent20' => 20,
		'cent10' => 10,
		'cent5' => 5,
		'cent2' => 2,
		'cent1' => 1,
	];

	foreach ($values as $type => $value) {
		$change[$type] = intval($amount / $value);
		$amount -= $change[$type] * $value;
	}

	ksort($change);

	return $change;
}

if ($argc !== 2) {
    trigger_error("Merci de spécifier le montant en argument.\nExemple : php get_change3.php 16\n", E_USER_ERROR);
}

$change = get_change(intval($argv[1]));

print_r($change);
