<?php

// acidmass.php
include 'isomass.php';

$aminoacid = array(
    'A',
    'R',
    'N',
    'D',
    'C',
    'E',
    'Q',
    'G',
    'H',
    'I',
    'L',
    'K',
    'M',
    'F',
    'P',
    'S',
    'T',
    'W',
    'Y',
    'V'
);

//Calculate the weighted mass of each residue.

$carbon = array(
'A' => 3,
'R' => 6,
'N' => 4,
'D' => 4,
'C' => 3,
'E' => 5,
'Q' => 5,
'G' => 2,
'H' => 6,
'I' => 6,
'L' => 6,
'K' => 6,
'M' => 5,
'F' => 9,
'P' => 5,
'S' => 3,
'T' => 4,
'W' => 11,
'Y' => 9,
'V' => 5

);

$hydrogen = array(
'A' => 5,
'R' => 12,
'N' => 6,
'D' => 5,
'C' => 5,
'E' => 7,
'Q' => 8,
'G' => 3,
'H' => 7,
'I' => 11,
'L' => 11,
'K' => 12,
'M' => 9,
'F' => 9,
'P' => 7,
'S' => 5,
'T' => 7,
'W' => 10,
'Y' => 9,
'V' => 9

);

$nitrogen = array(
'A' => 1,
'R' => 4,
'N' => 2,
'D' => 1,
'C' => 1,
'E' => 1,
'Q' => 2,
'G' => 1,
'H' => 3,
'I' => 1,
'L' => 1,
'K' => 2,
'M' => 1,
'F' => 1,
'P' => 1,
'S' => 1,
'T' => 1,
'W' => 2,
'Y' => 1,
'V' => 1

);

$oxygen = array(
'A' => 1,
'R' => 1,
'N' => 2,
'D' => 3,
'C' => 1,
'E' => 3,
'Q' => 2,
'G' => 1,
'H' => 1,
'I' => 1,
'L' => 1,
'K' => 1,
'M' => 1,
'F' => 1,
'P' => 1,
'S' => 2,
'T' => 2,
'W' => 1,
'Y' => 2,
'V' => 1

);

$sulfur = array(
'A' => 0,
'R' => 0,
'N' => 0,
'D' => 0,
'C' => 1,
'E' => 0,
'Q' => 0,
'G' => 0,
'H' => 0,
'I' => 0,
'L' => 0,
'K' => 0,
'M' => 1,
'F' => 0,
'P' => 0,
'S' => 0,
'T' => 0,
'W' => 0,
'Y' => 0,
'V' => 0
);

/* 
    Weighted Amino Acid residue mass.
    The following section calculated the molecular mass of
    amino acid residues by adding up the weighted mass of each
    element, weighted by their isotope abundance.
*/
$weighted_residue_mass = array();

for ($i=0;$i<count($aminoacid);$i++){
    $weighted_residue_mass[$aminoacid[$i]] = 
      $element_weighted_mass['C']*$carbon[$aminoacid[$i]]
    + $element_weighted_mass['H']*$hydrogen[$aminoacid[$i]]
    + $element_weighted_mass['N']*$nitrogen[$aminoacid[$i]]
    + $element_weighted_mass['O']*$oxygen[$aminoacid[$i]]
    + $element_weighted_mass['S']*$sulfur[$aminoacid[$i]];
}

/*
    Residue mass is calculated the same, except using only the
    mono-isotopic mass, which is also the most naturally abundant.
*/

$residue_mass = array();

for ($i=0;$i<count($aminoacid);$i++){
    $residue_mass[$aminoacid[$i]] = 
      $isotope_mass['C12']*$carbon[$aminoacid[$i]]
    + $isotope_mass['H1']*$hydrogen[$aminoacid[$i]]
    + $isotope_mass['N14']*$nitrogen[$aminoacid[$i]]
    + $isotope_mass['O16']*$oxygen[$aminoacid[$i]]
    + $isotope_mass['S32']*$sulfur[$aminoacid[$i]];
}

/*
    Amino acid mass is calculated in the same process as
    amino acid residues, except amino acids have an extra
    2 Hydrogen and 1 Oxygen, so those must be added in accordingly.
*/

$weighted_acid_mass = array();

for ($i=0;$i<count($aminoacid);$i++){
    $weighted_acid_mass[$aminoacid[$i]] = 
      $element_weighted_mass['C']*$carbon[$aminoacid[$i]]
    + ($element_weighted_mass['H'] + 2)*$hydrogen[$aminoacid[$i]]
    + $element_weighted_mass['N']*$nitrogen[$aminoacid[$i]]
    + ($element_weighted_mass['O'] + 1)*$oxygen[$aminoacid[$i]]
    + $element_weighted_mass['S']*$sulfur[$aminoacid[$i]];
}

$acid_mass = array();

for ($i=0;$i<count($aminoacid);$i++){
    $acid_mass[$aminoacid[$i]] = 
      $isotope_mass['C12']*$carbon[$aminoacid[$i]]
    + ($isotope_mass['H1'] + 2)*$hydrogen[$aminoacid[$i]]
    + $isotope_mass['N14']*$nitrogen[$aminoacid[$i]]
    + ($isotope_mass['O16'] + 1)*$oxygen[$aminoacid[$i]]
    + $isotope_mass['S32']*$sulfur[$aminoacid[$i]];
}

?>