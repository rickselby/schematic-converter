<?php

$nbtService = new \Nbt\Service(new \Nbt\DataHandler());

$blockList = [];
$maps = [];
foreach(glob('section*') AS $file) {

    $tree = $nbtService->loadFile($file);
    $map[$file] = [];

    $width = $tree->findChildByName('Width')->getValue();
    $length = $tree->findChildByName('Length')->getValue();
    $height = $tree->findChildByName('Height')->getValue();

    $blocks = $tree->findChildByName('Blocks');
    $blockData = $tree->findChildByName('Data')->getValue();
    $i = 0;
    foreach ($blocks->getValue() AS $ref => $block) {

        $x = $ref % $width;
        $z = floor($ref / $width) % $length;
        $y = floor($ref / ($width * $length));

        if ($x != 0 && $x != 129 && $z != 0 && $z != 129) {

            $block = signedToUnsigedByte($block);
            $data = signedToUnsigedByte($blockData[$ref]);

            $val = $block . ':' . $data;

            if ($block != 0 && $block != 20) {

                if (isset($maps[$file][$z-1][$x-1])) {
                    // we're overwriting with something higher!
                    // unset the block we're overwriting
                    $blockList[$maps[$file][$z-1][$x-1]][$file]--;
                }

                $maps[$file][$z-1][$x-1] = $val;

                if (!isset($blockList[$val])) {
                    $blockList[$val] = [];
                }
                if (!isset($blockList[$val][$file])) {
                    $blockList[$val][$file] = 0;
                }

                $blockList[$val][$file]++;
            }
        }
    }
}


function signedToUnsigedByte($value)
{
    return unpack('C', pack('c', $value))[1];
}
