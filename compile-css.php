<?php


// Config
$MAX_ITEMS = 80;
$MINIMIZE = true;
$PAD_LENGTH = 0;

// Styling
$COMMENT = "
/*******************************************
 * This file creates beautiful binary lists 
 * Use whenever you feel awesome            
 * ! This compiled version only features a  
 * ! maximum of %d rows :(               
 *******************************************/
";
$TABULATOR = "\t";
$SPACE = " ";
$DEFINITION_END = ";";
$LAST_DEFINITION_END = ";";
$LINE_SEPARATOR = "\n";
$END_OF_LINE = PHP_EOL;
$DEFINITION_LINE_SPACE = "\n";

// Items
$SELECTOR = 'ol';
$ITEM = 'li';

if($MINIMIZE) {
    $COMMENT = "/* Changed numbered lists to binary :). !Max rows: %d */\n";
    $TABULATOR = '';
    $SPACE = '';
    $LINE_SEPARATOR = '';
    $END_OF_LINE = '';
}

/**
 * Create css
 */
function print_style($selector, $arr) {
    global  $SPACE, 
            $TABULATOR, 
            $DEFINITION_END, 
            $LINE_SEPARATOR, 
            $DEFINITION_LINE_SPACE;
   
    echo "{$selector}{$SPACE}{{$LINE_SEPARATOR}";    
    foreach($arr as $key => $val) {
        echo $TABULATOR;
        echo "{$key}:{$SPACE}";
        echo "{$val}{$DEFINITION_END}";
        echo $LINE_SEPARATOR;
    }
    
    echo "}";
    echo $DEFINITION_LINE_SPACE;
}

// Output comment
printf($COMMENT, $MAX_ITEMS);
 
// Main style
print_style("{$SELECTOR} {$ITEM}", array(
    'list-style-type' => 'none'
));

// Main style for item
print_style("{$SELECTOR} {$ITEM}:before", array(
    'display' => 'inline',
    'content' => '""'
));

// Create all rows
for($i = 0; $i < $MAX_ITEMS; $i += 1) {
    $bin = str_pad(decbin($i), $PAD_LENGTH, '0', STR_PAD_LEFT);
    
    print_style(sprintf("{$SELECTOR} {$ITEM}:nth-child(%d):before", $i), array(
        'content' => sprintf('"%s"', $bin)
    ));
}