<?php

/* isomass.php - Contains the weights of all isotopes */

$isotope = array(
    'H1',
    'H2',
    'C12',
    'C13',
    'N14',
    'N15',
    'O16',
    'O17',
    'O18',
    'S32',
    'S33',
    'S34',
    'S36',
    'Cl35',
    'Cl37'
);  

$isotope_mass = array(
	'H1' =>	1.0078250321,
	'H2' =>	2.0141017780,
	'C12' =>	12.0000000,
	'C13' =>	13.0033548378,
	'N14' =>	14.0030740052,
	'N15' =>	15.0001088984,
	'O16' =>	15.9949146221,
	'O17' =>	16.99913150,
	'O18' =>	17.9991604,
	'S32' =>	31.97207069,
	'S33' =>	32.97145850,
	'S34' =>	33.96786683,
	'S36' =>	35.96708088,
	'Cl35' =>	34.96885271,
	'Cl37' =>	36.96590260
);

$isotope_abundance = array(
	'H1' => 0.999885,
	'H2' => 0.000115,
	'C12' => 0.9893,
	'C13' => 0.0107,
	'N14' => 0.99632,
	'N15' => 0.00368,
	'O16' => 0.99757,
	'O17' => 0.00038,
	'O18' => 0.00205,
	'S32' => 0.9493,
	'S33' => 0.0076,
	'S34' => 0.0429,
	'S36' => 0.0002,
	'Cl35' => 0.7578,
	'Cl37' => 0.2422
);

$element_weighted_mass = array(
    'C' => $isotope_mass['C12']*$isotope_abundance['C12']+$isotope_mass['C13']*$isotope_abundance['C13'],
    'H' => $isotope_mass['H1']*$isotope_abundance['H1']+$isotope_mass['H2']*$isotope_abundance['H2'],
    'N' => $isotope_mass['N14']*$isotope_abundance['N14']+$isotope_mass['N15']*$isotope_abundance['N15'],
    'O' => $isotope_mass['O16']*$isotope_abundance['O16']+$isotope_mass['O17']*$isotope_abundance['O17']+$isotope_mass['O18']*$isotope_abundance['O18'],
    'S' => $isotope_mass['S32']*$isotope_abundance['S32']+$isotope_mass['S33']*$isotope_abundance['S33']+$isotope_mass['S34']*$isotope_abundance['S34']+$isotope_mass['S36']*$isotope_abundance['S36'],
    'Cl' => $isotope_mass['Cl35']*$isotope_abundance['Cl35']+$isotope_mass['Cl37']*$isotope_abundance['Cl37']
);