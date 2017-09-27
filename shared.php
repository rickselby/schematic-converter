<?php

function printMaxColours($maxColours)
{
    global $blockIDs, $classRefs;
    echo '<table id="maxColours">';

    arsort($maxColours);

    foreach ($maxColours AS $id => $num) {
        echo '<tr>'
            .'<td class="'.($classRefs[$id]).'">'.($blockIDs[$id] ? $blockIDs[$id] : $id).'</td>'
            .'<td>'.$num.'</td>'
            .'<td>'.($num > 64
                ? floor($num / 64).'s '.($num % 64)
                : '').'</td>'
            .'<td>'.($num > (64 * 27)
                ? floor($num / (64 * 27)).'c '.floor(($num % (64 * 27) )/ 64).'s '.($num % 64)
                : '').'</td>'
            .'</tr>';
    }

    echo '</table>';
}

function printGridColours($maxColours)
{
    global $blockIDs, $classRefs;
    echo '<table class="gridColours">';

    arsort($maxColours);

    $count = 0;
    foreach ($maxColours AS $id => $num) {
        echo $count % 2 == 0 ? '<tr>' : '';
        echo '<td class="'.($classRefs[$id]).'">'.$blockIDs[$id].'</td>'
            .'<td>'.$num.'</td>'
            .'<td>'.($num > 64
                ? floor($num / 64).'s '.($num % 64)
                : '').'</td>';
        echo $count % 2 == 1 ? '</tr>' : '<td class="spacer"></td>';
        $count++;
    }
    if ($count %2 == 1) {
        echo '</tr>';
    }

    echo '</table>';
}

$blockIDs = [
    '1:0' => 'Cobblestone Slab',
    '1:3' => 'Diorite',
    '2:0' => 'Slime',
    '5:0' => 'Oak Wood',
    '5:1' => 'Spruce Wood',
    '5:3' => 'Dirt',
    '8:0' => 'Flowing Water',
    '18:4' => 'Leaves',
    '22:0' => 'Lapis',
    '24:0' => 'Birch Wood',
    '30:0' => 'Cobweb',
    '35:0' => 'White Clay',
    '35:1' => 'Orange Clay',
    '35:2' => 'Magenta Clay',
    '35:3' => 'Light Blue Clay',
    '35:4' => 'Yellow Clay',
    '35:5' => 'Lime Clay',
    '35:6' => 'Pink Clay',
    '35:7' => 'Gray Clay',
    '35:8' => 'Light Gray Clay',
    '35:9' => 'Cyan Clay',
    '35:10' => 'Purple Clay',
    '35:11' => 'Blue Clay',
    '35:12' => 'Dark Oak',
    '35:13' => 'Green Clay',
    '35:14' => 'Red Clay',
    '35:15' => 'Black Clay',
    '46:0' => 'Redstone',
    '57:0' => 'Diamond',
    '79:0' => 'Ice',
    '82:0' => 'Clay Block',
    '87:0' => 'Netherrack',
    '117:0' => 'Brewing Stand',
    '133:0' => 'Emerald',
    '147:0' => 'Hay Bale',
    '168:1' => 'Prismarine Bricks',
];


$blockRefs = [
    '1:0' => 'Cobble',
    '1:3' => 'Diorite',
    '2:0' => 'Slime',
    '5:0' => 'Oak Wood',
    '5:1' => 'Spruce Wood',
    '5:3' => 'Dirt',
    '8:0' => 'Water',
    '18:4' => 'Leaves',
    '22:0' => 'Lapis',
    '24:0' => 'Birch Wood',
    '35:0' => 'White',
    '35:1' => 'Orange',
    '35:2' => 'Magenta',
    '35:3' => 'Light Blue',
    '35:4' => 'Yellow',
    '35:5' => 'Lime',
    '35:6' => 'Pink',
    '35:7' => 'Gray',
    '35:8' => 'Light Gray',
    '35:9' => 'Cyan',
    '35:10' => 'Purple',
    '35:11' => 'Blue',
    '35:12' => 'Dark Oak',
    '35:13' => 'Green',
    '35:14' => 'Red',
    '35:15' => 'Black',
    '46:0' => 'Redstone',
    '57:0' => 'Diamond',
    '79:0' => 'Ice',
    '82:0' => 'Clay',
    '87:0' => 'Nether -rack',
    '133:0' => 'Emer -ald',
    '147:0' => 'Hay',
    '168:1' => 'Pris- marine',
];

$classRefs = [
    '1:0' => 'cobble',
    '1:3' => 'diorite',
    '2:0' => 'grass',
    '5:0' => 'oakwood',
    '5:1' => 'sprucewood',
    '5:3' => 'junglewood',
    '8:0' => 'water',
    '18:4' => 'leaves',
    '22:0' => 'lapis',
    '24:0' => 'sand',
    '35:0' => 'white',
    '35:1' => 'orange',
    '35:2' => 'magenta',
    '35:3' => 'lightblue',
    '35:4' => 'yellow',
    '35:5' => 'lime',
    '35:6' => 'pink',
    '35:7' => 'gray',
    '35:8' => 'lightgray',
    '35:9' => 'cyan',
    '35:10' => 'purple',
    '35:11' => 'blue',
    '35:12' => 'brown',
    '35:13' => 'green',
    '35:14' => 'red',
    '35:15' => 'black',
    '46:0' => 'tnt',
    '57:0' => 'diamond',
    '79:0' => 'ice',
    '82:0' => 'clay',
    '87:0' => 'netherrack',
    '133:0' => 'emerald',
    '147:0' => 'haybale',
    '168:1' => 'prismarine',
];

$colourNames = [
    '7182640' => 'grass',
    '14010764' => 'sand',
    '11250603' => 'bed / cobweb',
    '14417920' => 'tnt',
    '9079516' => 'ice',
    '9474192' => 'iron / brewing stand',
    '27136' => 'plants',
    '14474460' => 'wool / carpet / snow', # d9d9d9 # 14277081 # 219 219 219
    '14473683' => 'diorite / quartz',     # d9d6d1 # 14276305 # 217 214 209
    '9277598' => 'clay',
    '8543810' => 'dirt',
    '6316128' => 'cobble',
    '4210943' => 'water',
    '8087102' => 'oak things',
    '12217644' => 'orange (w/c) / pumpkin / acacia',
    '10043834' => 'magenta',
    '5801146' => 'light blue',
    '12961068' => 'yellow (w/c) / sponge',
    '7188501' => 'lime (w/c) / melon',
    '13659534' => 'pink',
    '4276545' => 'grey (w/c) / cauldron',
    '8684676' => 'light grey',
    '4287876' => 'cyan',
    '7157401' => 'purple (w/c) / mycelium',
    '2900377' => 'blue',
    '5783852' => 'brown (w/c) / dark oak',
    '5795116' => 'green (w/c) / end portal',
    '8662060' => 'red (w/c) / huge mushroom / brick',
    '1381653' => 'black (w/c) / coal',
    '14142786' => 'gold / hay',
    '5225655' => 'diamond / prismarine',
    '4157148' => 'lapis',
    '47922' => 'emerald',
    '7293482' => 'obsidian / enchantment table',
    '6291712' => 'netherrack / nether brick',
];

function getFileName($file) 
{
    return str_replace(['section.', '.schematic'], '', $file); 
}
