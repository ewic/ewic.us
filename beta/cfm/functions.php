<?
/*
    functions.php - helpful functions that warranted a separate sheet.
*/



function cfm_isprotein($input){
    
    //Define the alphabet.  If the input is not a valid protein sequence, then it will not work.
    $alpha = '/[BJOUXZ]/';
    
    //not a valid protein sequence if any of the above matches.
    if (preg_match($alpha,$input) > 0) {
        return 0;
    }
    
    //input is a valid protein sequence.
    else {
        return 1;
    }
}

//calculates the propensity of a sequence to an alpha helix.
function cfm_calc_pa($seq){
    //these arrays contains the propensity data.
    include 'propensity.php';
        
    //arrange the string into an array or characters.
    $arr = str_split($seq);
    
    //convert the array entries to their propensities.
    for ($i=0;$i<count($arr);$i++) {
        $arr[$i] = $ahelix[$arr[$i]];
    }
    
    //calculate the average propensities across the array of values.
    $pa = sprintf("%01.3f",array_sum($arr)/count($arr));
    
    return $pa;
}


?>