<head>
<?php

include 'header.php';
include 'propensity.php';

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
    index.php - directory file for the Chou-Fasman Prediction algorithm
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
    
    print 'Protein: '.$input.'<br />';
    
    if (cfm_isprotein($input)==0){
        echo "not a valid protein";
    }


    //actual work gets done here:
    else {
      // define variables that will be used below in a .= of [] manner.
 
      $bend4 = null;
        //generate a table:
        echo '<table border="1">';
        echo '<tr>
                <th>i</th>
                <th>Acid</th>
                <th>pa</th>
                <th>pb</th>
                <th>Pa</th>
                <th>Pb</th>
                <th>Pt</th>
                <th>Struct</th>
            </tr>';
    //alpha helix prediction;
        $arr = str_split($input);
        
        //$struct will hold the final output for our chou fasman prediction.
        $struct = "";
             
             
        //add the propensities to the array in a sub-array.
        //$i is our index, however since we are using a window size of 3 at the least,
        //  we start our calculations one residue in.
        for ($i=1;$i<count($arr)-1;$i++) {
            
            //Calculate the propensities for this acid to be part of which structure.
            
            //for alpha-helical regions, we are looking at the previous two residues, the residue, and the next residue.
            //  Averaging these 4 will determine the propensity for the surrounding region to be alpha-helical in nature.
            $Pa = ($ahelix[$arr[$i-2]]+$ahelix[$arr[$i-1]]+$ahelix[$arr[$i]]+$ahelix[$arr[$i+1]])/4;
            
            //For beta-sheets, we do the same, except since a beta-sheet can be nucleated with only 3 residues,
            //  we use the previous residue, the residue, and the next residue.
            $Pb = ($bsheet[$arr[$i-1]]+$bsheet[$arr[$i]]+$bsheet[$arr[$i+1]])/3;
            
            //And for a beta-turn, we do the same for this as we do for alpha helix.
            $Pt = ($bturn[$arr[$i]]+$bturn[$arr[$i+1]]+$bturn[$arr[$i+2]]+$bturn[$arr[$i+3]])/4;
            
            //We also calculate the turn indices.
            //Pta -> first residue in the turn, Ptb -> 2nd residue, and so on.
            $Pta = ($bend1[$arr[$i-2]]+$bend2[$arr[$i-1]]+$bend3[$arr[$i]]+$bend4[$arr[$i+1]])/4;
            $Ptb = ($bend1[$arr[$i-1]]+$bend2[$arr[$i]]+$bend3[$arr[$i+1]]+$bend4[$arr[$i+2]])/4;
            $Ptc = ($bend1[$arr[$i]]+$bend2[$arr[$i+1]]+$bend3[$arr[$i+2]]+$bend4[$arr[$i+3]])/4;
            $Ptd = ($bend1[$arr[$i+1]]+$bend2[$arr[$i+2]]+$bend3[$arr[$i+3]]+$bend4[$arr[$i+4]])/4;
            
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$arr[$i].'</td>';
            //add the propensity for alpha helix (Pa)
            echo '<td>'.$ahelix[$arr[$i]].'</td>';
            //And the propensity for a beta sheet (Pb)
            echo '<td>'.$bsheet[$arr[$i]].'</td>';

            echo '<td>'.$Pa.'</td>';
            echo '<td>'.$Pb.'</td>';
            echo '<td>'.$Pt.'</td>';
            
            //This $s is the result from the last iteration.
            //We will use it to test to see if we are in the middle of an alpha helix or not.
            //This is because Proline can only start an alpha helix, never in the middle or end.
            //Thus, if we are not examining a Proline, check to see if we are an alpha helix.
            if ($arr[$i] != 'P' && max($Pa,$Pb,$Pt) == $Pa)
                $s = 'A';
                
            //However, if we are examining a Proline, it can only be an alpha helix if
            //  the previous $s was not already part of an alpha helix.
            else if ($arr[$i] =='P' && $s != 'A' && max($Pa,$Pb,$Pt) == $Pa)
                $s = 'A';
                
            else if (max($Pa,$Pb,$Pt) == $Pb)
                $s = 'B';
            else if (max($Pa,$Pb, $Pt) == $Pt)
                //If the residue is determined to be a turn, we have to see where the turn starts.
                //If the turn starts 2 or 3 residues in, the leading residues are randoms.
                if (max($Pta,$Ptb,$Ptc,$Ptd) == $Pta){
                    $struct .= "TTT";
                    $s = "T";
                    $i = $i + 3;
                    }
                else if (max($Pta,$Ptb,$Ptc,$Ptd) == $Ptb){
                    $i = $i+1;
                    $struct .= "RTTT";
                    $s = "T";
                    $i = $i + 2;
                    }
                else if (max($Pta,$Ptb,$Ptc,$Ptd) == $Ptc){
                    $i = $i+2;
                    $struct .= "RRTTT";
                    $s = "T";
                    $i = $i + 1;
                    }
                else {
                    $struct .= "RRRTTT";
                    $s = "T";
                    $i = $i+3;
                    }
            echo '<td>'.$s.'</td>';
            
            $struct .= $s;
            
            echo '</tr>';
        }
        echo '</table>';
        echo 'The secondary structure is '.$struct;
    }
}

?>
</body>
