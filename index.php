<?php

ini_set('memory_limit', '512M');
include 'vendor/autoload.php';
include('shared.php');
include('template/header.html');


include('read-files.php');

$maxBlockList = [];
foreach($blockList AS $blockID => $blocks) {
    $maxBlockList[$blockID] = max($blocks);
}

printMaxColours($maxBlockList);


foreach($maps AS $file => $map) {

    for ($xDiv = 0; $xDiv < 128; $xDiv += 16) {
        for ($zDiv = 0; $zDiv < 128; $zDiv += 16) {

            $blockList = [];

            echo '<table class="smallgrid">';
            for ($sgZ = 0; $sgZ < 8; $sgZ++) {
                echo '<tr>';
                for ($sgX = 0; $sgX < 8; $sgX++) {
                    echo '<td'
                        .(((($xDiv / 16) == $sgX) && (($zDiv / 16) == $sgZ))
                            ? ' class="this" '
                            : '')
                        .'></td>';
                }
                echo '</tr>';
            }
            echo '</table>';

            echo '<h2>Map '.getFileName($file).' : Part '.($xDiv / 16).','.($zDiv / 16).'</h2>';
            echo '<table class="grid">';
            echo '<tr><th></th>';
            for ($x = 0; $x < 16; $x++) {
                echo '<th>'.($x + 1).'</th>';
            }
            echo '</tr>';

            for ($z = 0; $z < 16; $z++) {
                echo '<tr>';
                echo '<th>'.($z + 1).'</th>';
                for ($x = 0; $x < 16; $x++) {

                    $ref = $map[$zDiv + $z][$xDiv + $x];

                    echo '<td class="'.($classRefs[$ref]).'"><div>'
                        .$blockRefs[$ref]
                        .'</div></td>';

                    if (!isset($blockList[$ref])) {
                        $blockList[$ref] = 0;
                    }
                    $blockList[$ref]++;
                }
                echo '</tr>';
            }

            echo '</table>';
            printGridColours($blockList);
        }
    }
}

/************************************************************************************/
/************************************************************************************/

function dumpTree(\Nbt\Node $tree, $indent = 0) {
    for ($i = 0; $i < $indent; $i++) {
        echo ' ';
    }
    echo $tree->getName();
    if (!is_array($tree->getValue())) {
        echo ' ('.$tree->getValue().') ';
    } else {
        echo '['.count($tree->getValue()).']';
    }
    echo "\n";
    if (count($tree->getChildren())) {
        foreach($tree->getChildren() AS $child) {
            dumpTree($child, $indent + 2);
        }
    }
}


include('template/footer.html');

