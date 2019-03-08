<?php

/*
Programmation de la function mathématique factorielle en utilisant différents algorithmes
*/

// utilisation d'une boucle
function fact_loop(int $n): int
{
	$result = 1;

	for ($i = 1; $i <= $n; $i++) {
		$result = $i * $result;
	}

	return $result;
}

// utilisation de la récursivité
function fact_recursive(int $n): int
{
	return $n > 0 ? $n * fact_recursive($n - 1) : 1;
}

// utilisation de la programmation fonctionnelle et de la fonction reduce()
function fact_reduce(int $n): int
{
	if ($n <= 0) {
		return 1;
	}

	$tab = range(1, $n);

	return array_reduce($tab, multiply, 1);
}

function multiply($n_minus_1, $n)
{
	return $n_minus_1 * $n;
}

// utilisation d'une fonction anonyme à la place de la fonction multiply()
function fact_reduce_anon(int $n): int
{
	if ($n <= 0) {
		return 1;
	}

	$tab = range(1, $n);
	$multiply = function ($n_minus_1, $n)
	{
		return $n_minus_1 * $n;
	};

	return array_reduce($tab, $multiply, 1);
}

// suppression des variables
function fact_reduce_anon_extreme(int $n): int
{
	if ($n <= 0) {
		return 1;
	}

	return array_reduce(range(1, $n), function ($n_minus_1, $n)
	{
		return $n_minus_1 * $n;
	}, 1);
}
