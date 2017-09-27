<?php

include 'vendor/autoload.php';
include('shared.php');
include('template/header.html');


include('read-files.php');

$files = array_keys($maps);

$compare = [];

for ($i = 0; $i < count($files); $i++) {
    for ($j = ($i+1); $j < count($files); $j++) {
#        echo compare($maps[$files[$i]], $maps[$files[$j]])."\n";
        $iFile = $files[$i];
        $jFile = $files[$j];
        $compare[$iFile][$jFile] = compare($maps[$iFile], $maps[$jFile]);
    }
}

echo '<table>';
echo '<tr><td></td>';
foreach($files AS $f) {
    echo '<th>'.shortName($f).'</th>';
}
echo '</tr>';
foreach($files AS $f1) {
    echo '<tr><th>'.shortName($f1).'</th>';
    foreach($files AS $f2) {
        echo '<td>'.$compare[$f1][$f2].'</td>';
    }
    echo '</tr>';
}
echo '</table>';

include('template/footer.html');

/************************************************************************************/
/************************************************************************************/

function shortName($file)
{
    return str_replace(['section.', '.schematic'], '', $file);
}

function compare($a, $b) {
    $similar = 0;
    foreach($a AS $z => $aRow) {
        foreach($aRow AS $x => $block) {
            if ($block == $b[$z][$x]) {
                $similar++;
            }
        }
    }
    return $similar;
}