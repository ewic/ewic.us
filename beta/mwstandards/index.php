<head>
<?php

include 'header.php';
include 'info.php';

?>
</head>

<body style="font-family:monospace">

<script type="text/javascript">

var clickedIt = false;

function clearTextArea(id){ 
if (clickedIt == false){ 
id.value=""; 
clickedIt=true; 
} 
}
</script>

<?php
/*
    index.php - directory file for Molecular Weight calculation
    Eric Zhang - 2012
*/

require_once 'functions.php';

//Fresh form, no input.  Generate the input form.
if (!isset($_GET['protein'])) {
    print '<form method="get" action="index.php">';
    print 'Enter protein sequence below<br />';
    print '<textarea rows="10" cols="80" name="protein" onfocus="clearTextArea(this);">
Please enter Protein here.</textarea>';
    print '<input type="submit"></form>';
}

else {
    $input = $_GET['protein'];
    $input = preg_replace("/[\n\r]/", "", $input);
    //strip whitespace
    $input = str_replace(" ","",$input);    
    
    //TODO - implement a helpful tool to determine if input is protein or not.
    
    //Arrange the acid residues into an array.
    $arr = str_split($input);
    
    //calculate the monoisotopic weight as the sum of the masses of the acid residues
    //plus 2H and an O.
    $monoisotopic_mass = 0;
    for ($i=0;$i<count($arr);$i++) {
        $monoisotopic_mass += $residue_mass[$arr[$i]];
    }
    $monoisotopic_mass += 2*$isotope_mass['H1'] + $isotope_mass['O16'];
    //monoisotopic mass is calculated!

    //weighted molecular mass is calculated as the sum of the weighted mass of the acid residues
    //plus 2H and an O.
    $weighted_mass = 0;
    for ($i=0;$i<count($arr);$i++) {
        $weighted_mass += $weighted_residue_mass[$arr[$i]];
    }
    $weighted_mass += 2*$element_weighted_mass['H'] + $element_weighted_mass['O'];
    //weighted mass is calculated!
    
    //Presentation - Above the table of references is already displayed.  We will print out the results below.
    echo 'Monoisotopic Molecular Mass is '.$monoisotopic_mass.'.<br />';
    echo 'Weighted Molecular Mass is '.$weighted_mass.'.<br />';
}

?>