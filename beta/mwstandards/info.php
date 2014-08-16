<?php

//info.php - This form will print out the referential data used when calculating the molecular weights of protein sequences.

include 'acidmass.php';

echo 'Weights of AA Residues';
echo '<table borderstyle="1">
        <tr>
            <th>Amino Acid</th>
            <th>Weighted Residue Mass</th>
            <th>Monoisotopic Residue Mass</th>
        </tr>';

for ($i=0;$i<count($aminoacid);$i++) {
    echo '<tr>';
	echo '<td>'.$aminoacid[$i].'</td>';
	echo '<td>'.$weighted_residue_mass[$aminoacid[$i]].'</td>';
	echo '<td>'.$residue_mass[$aminoacid[$i]].'</td>';
    echo '</tr>';
}

echo '</table>';

echo 'Weights of AA (non-residues)';
echo '<table borderstyle="1">
        <tr>
            <th>Amino Acid</th>
            <th>Weighted Acid mass</th>
            <th>Monoisotopic Acid mass</th>
        </tr>';

for ($i=0;$i<count($aminoacid);$i++) {
    echo '<tr>';
	echo '<td>'.$aminoacid[$i].'</td>';
	echo '<td>'.$weighted_acid_mass[$aminoacid[$i]].'</td>';
	echo '<td>'.$acid_mass[$aminoacid[$i]].'</td>';
    echo '</tr>';
}

echo '</table>';

//print_r($element_weighted_mass);

?>