<?php

main($argv);

function main($args) {
    if (!isset($args[2]) || strtolower($args[2]) == 'p') {
        if (is_numeric($args[1]) && $args[1] > 0) {
            if ($args[1] > 30) {
                echo "This program yields no more than 30 paragraphs" . PHP_EOL;
                exit();
            }
            echo getLoremParagraphs($args[1]).PHP_EOL;
        } else {
            echo help($args[0]);
        }
    }
    else if (strtolower($args[2]) == 's') {
        if (is_numeric($args[1]) && $args[1] > 0) {
            echo getLoremSentences($args[1]).PHP_EOL;
        } else {
            echo help($args[0]);
        }
    } else if (strtolower($args[2]) == 'w') {
        if (is_numeric($args[1]) && $args[1] > 0) {
            echo getLoremWords($args[1]).PHP_EOL;
        } else {
            echo help($args[0]);
        }
    } else if (strtolower($args[2]) == 'c') {
        if (is_numeric($args[1]) && $args[1] > 0) {
            echo getLoremChars($args[1]).PHP_EOL;
        } else {
            echo help($args[0]);
        }
    } else {
        echo help($args[0]);
    }
}

function help($filename)
{
    $h = "Error. usage: $filename NUMBER " . " ELEMENT" . PHP_EOL;
    $h .= "where ELEMENT can be ".PHP_EOL;
    $h .= "- 'p' for paragraps,".PHP_EOL;
    $h .= "- 's' for sentences,".PHP_EOL;
    $h .= "- 'w' for words,".PHP_EOL;
    $h .= "- 'c' for characters,".PHP_EOL;
    $h .= "and NUMBER is the number of elements you need".PHP_EOL;
    return $h;
}

function getLoremParagraphs($num)
{
    $lorem = array_slice(lorem(),0,$num);
    return implode(PHP_EOL,$lorem);
}

function getLoremSentences($num, $separator = '.')
{
    $lorem = implode(PHP_EOL,lorem()).PHP_EOL;
    $dots = substr_count($lorem, $separator);
    $max = strlen($lorem);
    $n = 0;
    for ($i=0; $i<$max; $i++) {
        if ($lorem[$i] == $separator) {
            $n++;
            if ($n >= $num) {
                break;
            }
        }
    }
    return substr($lorem, 0, $i+1);
}

function getLoremWords($num)
{
    return getLoremSentences($num, ' ');
}

function getLoremChars($num)
{
    $lorem = implode(PHP_EOL,lorem()).PHP_EOL;
    return substr($lorem, 0, $i);
}

function lorem()
{
    $lorem = [];
    $lorem[] .= "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris risus leo, efficitur id justo et, semper tristique velit. Nam pharetra turpis at sem sollicitudin, vel auctor leo condimentum.o Maecenas tristique facilisis tempor. Maecenas scelerisque leo nisi, eu mattis velit pharetra suscipit. Ut dignissim sodales sodales. Pellentesque venenatis tortor erat, sed blandit est porta quis. Integer odio mi, efficitur ut lectus ac, tempor feugiat libero.";
    $lorem[] .= "Vestibulum at erat nulla. Aliquam finibus ullamcorper urna, at scelerisque purus faucibus vitae. Phasellus id augue non ex blandit semper vel eget tellus. Sed hendrerit, est non tincidunt rhoncus, libero elit vulputate dolor, sed feugiat nisl leo ac enim. Aenean sed urna nunc. Nunc ullamcorper, mi sit amet eleifend gravida, metus lacus faucibus magna, at vehicula lacus mi et odio. Sed convallis, turpis nec ultrices dapibus, ipsum nisi viverra leo, eget convallis ipsum nisi eu sem. Aliquam tristique at ligula id mattis. Vivamus augue quam, malesuada sit amet feugiat vel, volutpat eu turpis. Praesent sit amet magna ac nunc ornare sagittis. Donec faucibus vulputate est sit amet mollis. Suspendisse id semper ligula. Nullam faucibus elit vel augue fermentum accumsan. Phasellus suscipit imperdiet velit ut egestas. Ut augue libero, rhoncus a pharetra ac, aliquam sit amet mauris. Cras interdum volutpat accumsan.";
    $lorem[] .= "Cras mattis ante quis vehicula lacinia. Sed eget neque non augue iaculis egestas ut in justo. Nam nec nisl et dolor aliquam fermentum quis nec enim. Integer mauris ante, fermentum eget neque ut, venenatis vehicula dui. Ut imperdiet tempor aliquet. Phasellus congue est et ligula maximus, eu sodales ante consequat. Integer rutrum congue dui in lacinia. Maecenas aliquet laoreet enim eget varius. Cras at porttitor diam. Sed a turpis eget odio pretium sagittis sit amet consequat arcu. Donec quis felis aliquet, congue elit congue, fringilla leo.";
    $lorem[] .= "Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris tempor tortor eu arcu dignissim, a pharetra diam mollis. Duis maximus, nisl a bibendum laoreet, urna purus pulvinar risus, id vestibulum leo elit at tellus. Maecenas blandit commodo vulputate. Aenean ipsum orci, ultricies sit amet sem id, mollis faucibus justo. Donec ac felis volutpat, convallis tortor et, hendrerit libero. Proin non ligula nunc. Pellentesque tellus ante, fringilla vel purus nec, lacinia lobortis justo. Vestibulum facilisis laoreet felis, non rhoncus dolor convallis a. Nullam nec ipsum vitae est vestibulum tincidunt. Mauris nisl metus, cursus quis ex non, hendrerit faucibus nibh.";
    $lorem[] .= "Duis molestie aliquam mi, vel volutpat ipsum tincidunt facilisis. Ut iaculis dui vel nibh rhoncus blandit. Sed eget eleifend tellus. Integer id leo vel felis mattis varius ut ut lorem. Donec pellentesque at justo quis consequat. Morbi interdum sit amet turpis at porta. Nam ultricies ligula eget semper sagittis. Phasellus fringilla hendrerit elit a cursus. Nam quis sem hendrerit, blandit turpis porttitor, vulputate odio. Cras pellentesque maximus dignissim. In sed euismod felis. Curabitur lacinia quam ut magna scelerisque aliquam. Phasellus lacinia dignissim ullamcorper. Etiam risus ex, tincidunt eleifend leo sed, tincidunt tincidunt ex. Curabitur ultrices ullamcorper ipsum eu consequat.";
    $lorem[] .= "Etiam facilisis sem augue, eu venenatis mi tempus id. Sed ac magna consequat, commodo eros id, suscipit quam. Suspendisse sit amet justo ante. Donec ac ante vel arcu eleifend congue quis vel erat. Suspendisse in dolor diam. Vivamus ut risus faucibus, commodo neque a, hendrerit ligula. Nullam tristique lectus nec purus egestas condimentum. Nam molestie feugiat tortor, quis mollis nunc rhoncus eget. Morbi ut ligula sed augue aliquam aliquam. Duis quis molestie sem, sit amet mollis purus. Pellentesque vehicula, eros sit amet varius vehicula, elit velit consectetur arcu, et convallis libero augue eget velit.";
    $lorem[] .= "Sed odio turpis, dictum quis rhoncus eu, pellentesque eget nunc. Aliquam augue magna, ultrices sed sollicitudin vel, pharetra a metus. Nullam vulputate lacus purus, nec pellentesque odio faucibus sit amet. Sed semper orci quis libero rhoncus consectetur. Aliquam ullamcorper pretium risus, eu fermentum tortor iaculis vel. Morbi suscipit orci id velit euismod, ac sollicitudin dui porta. Vestibulum in malesuada justo, eu venenatis tellus. Ut ex justo, condimentum ut urna nec, euismod porttitor sem. Aliquam molestie non nulla quis aliquet. Vestibulum vitae erat sit amet arcu euismod mattis. Vestibulum diam elit, porttitor at nisl id, auctor bibendum nulla. Quisque venenatis dapibus lectus in lacinia. Donec vehicula lacus scelerisque lectus suscipit lacinia. Vestibulum vel malesuada ligula.";
    $lorem[] .= "Pellentesque lobortis maximus massa. Curabitur feugiat maximus diam finibus venenatis. Etiam faucibus ullamcorper eleifend. Morbi nec mi et augue sollicitudin efficitur a eu tellus. Morbi lorem mauris, maximus sit amet mauris sed, lobortis ornare nisi. Mauris blandit hendrerit bibendum. Aenean sit amet lorem congue ipsum lacinia aliquam nec sed lectus. Ut sit amet lorem quis sapien congue volutpat non faucibus tortor. Vestibulum non nibh in tellus porttitor faucibus. Donec sit amet lectus dolor. Mauris suscipit justo sit amet massa hendrerit, vel sodales ante consectetur. Nunc rhoncus dictum tristique. Aliquam gravida velit sit amet diam pharetra mollis. Sed quis eros vitae nibh hendrerit mollis nec a augue.";
    $lorem[] .= "Pellentesque euismod leo at sodales ultricies. Nulla quis rutrum ante. Sed sit amet ligula in lorem auctor ornare. Donec blandit ex sit amet quam tempor euismod. Duis varius, est vel iaculis volutpat, sem ipsum hendrerit dolor, ac consequat ante lorem varius ex. Vivamus sed libero sed nisi vestibulum cursus et quis enim. Praesent non nisi dignissim, tempor tortor id, cursus libero. Duis quis iaculis lectus. Vestibulum semper nibh ac nulla laoreet, sit amet rhoncus justo dapibus. In leo ligula, auctor non aliquet at, scelerisque sit amet mauris. Donec lectus mi, vehicula eu nulla sed, sagittis vulputate nisi. Sed laoreet malesuada mi, in rhoncus dui posuere non.";
    $lorem[] .= "Vivamus accumsan sapien sit amet euismod fringilla. Nulla ultrices venenatis porta. Quisque venenatis feugiat pellentesque. Quisque eu sapien leo. Nam quis augue tempus, molestie tortor at, pretium sapien. Praesent laoreet euismod dui venenatis facilisis. Maecenas vel egestas neque, quis venenatis dolor. Sed maximus, est vestibulum molestie sagittis, lorem est rhoncus mi, nec molestie leo mauris a sem. Nunc viverra felis orci, nec vulputate mi accumsan at. Sed tristique posuere ex, eu sollicitudin lacus.";
    $lorem[] .= "Morbi fermentum tellus sagittis laoreet aliquet. Nam accumsan diam id lacinia convallis. Morbi nec aliquam mauris, a ultrices velit. Nullam iaculis laoreet nulla, vel varius nibh dapibus vitae. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer hendrerit fermentum venenatis. Maecenas posuere iaculis tortor vitae tempus. Fusce a mauris sit amet libero tristique molestie. Proin vel orci tincidunt, tempus sem vehicula, porta ex. Cras eu dui ac diam varius commodo. Vestibulum luctus ultrices felis sed porta.";
    $lorem[] .= "In semper accumsan nisl, eget suscipit orci. Nunc non augue commodo, elementum sem at, porta mauris. Pellentesque sit amet quam at lacus blandit pretium ac vel massa. Donec pulvinar turpis a interdum lacinia. Nam ut lobortis mauris. Praesent maximus viverra nisl, quis maximus libero. Praesent non vulputate arcu. Donec at enim a eros imperdiet egestas volutpat et tortor. Cras et ante ut elit suscipit tincidunt. Praesent gravida justo vitae interdum facilisis. Phasellus quis turpis sodales, eleifend sapien vel, eleifend lectus. Cras porttitor pulvinar faucibus. Etiam tristique, nibh eget fermentum egestas, erat justo imperdiet turpis, sit amet placerat ante odio vel nibh. Aenean convallis nulla nec ante commodo, eu laoreet quam venenatis. Quisque scelerisque ligula vitae sem egestas fringilla.";
    $lorem[] .= "Phasellus pellentesque gravida justo, aliquet lacinia orci auctor eu. Morbi sodales arcu vel quam tincidunt, eget auctor odio eleifend. Morbi id turpis rutrum, elementum eros at, tincidunt dolor. Fusce tristique, nunc et rhoncus tristique, justo elit placerat augue, quis sagittis massa sapien in sapien. Morbi tristique placerat finibus. Aliquam nisl ipsum, pharetra quis lacinia vitae, consequat non erat. Sed ut leo gravida, placerat lorem non, varius sem. Donec congue tellus et augue imperdiet, ac eleifend quam facilisis. Vestibulum pharetra hendrerit ex, nec fermentum dui ornare vitae. Integer imperdiet fermentum maximus. In rutrum vitae justo quis interdum. Donec at pulvinar lorem.";
    $lorem[] .= "Fusce vulputate tellus sed turpis elementum, vitae sodales dui tincidunt. Nunc faucibus ac dui eu vehicula. Vestibulum sodales orci enim, in volutpat urna eleifend consectetur. Vestibulum id gravida magna, eget maximus dui. Aenean nunc neque, condimentum nec egestas ac, porta vitae urna. Nam consequat ut nibh vitae condimentum. Donec tellus sem, accumsan sit amet orci euismod, sagittis rhoncus tortor. Pellentesque hendrerit erat ante, non convallis lacus pharetra at. Fusce dapibus fringilla tellus in molestie. Fusce sollicitudin tempus massa, ac finibus dolor gravida ac. Quisque nec mi dui. Curabitur eleifend, felis eu interdum mattis, sapien felis rutrum est, a commodo orci diam ut orci. Donec eu diam ullamcorper nunc porttitor malesuada. Praesent sit amet scelerisque lorem, nec euismod quam.";
    $lorem[] .= "Morbi vitae sapien orci. Nullam et vestibulum nunc. Morbi ac rhoncus risus. In hac habitasse platea dictumst. Duis luctus augue vitae molestie dignissim. Nulla vulputate, massa vitae scelerisque sagittis, tellus lorem laoreet mi, in consequat felis arcu eget eros. Suspendisse congue, lorem at luctus venenatis, ipsum metus tincidunt nisi, sit amet feugiat velit purus id erat. Quisque quis nisl velit.";
    $lorem[] .= "Aliquam sagittis facilisis augue vel scelerisque. Nulla pretium varius vehicula. Aliquam mattis, turpis ut pretium blandit, ipsum nibh sagittis quam, quis pretium neque nisl eu velit. Nulla eros mauris, auctor ac pretium a, mollis vel quam. Praesent egestas sagittis finibus. Maecenas gravida purus ut libero auctor blandit. Proin et nisl quis turpis cursus tristique. Nullam a mauris sed tortor porta malesuada. Sed vel felis laoreet, fringilla velit vel, sagittis mauris. Aliquam maximus lacinia diam in finibus.";
    $lorem[] .= "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porta rhoncus diam maximus imperdiet. Nullam vel luctus ex. Integer vitae dapibus nisi. Fusce posuere condimentum dolor, tempus tempor ipsum bibendum eu. Morbi egestas ante aliquam nibh iaculis pulvinar. Pellentesque eget elementum nisi, in molestie quam.";
    $lorem[] .= "Donec egestas enim et felis vulputate, eu pharetra nulla feugiat. Aenean id vestibulum est. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut euismod tortor id dui posuere, ac eleifend ipsum consequat. Vestibulum ultricies vulputate velit, eu placerat erat auctor in. Mauris sit amet nibh nisl. Morbi semper purus ac nunc scelerisque lacinia. Sed ullamcorper molestie dui ut ullamcorper. Vivamus ac imperdiet tortor. Vestibulum efficitur tincidunt orci, iaculis iaculis justo placerat at. Nullam ut sem eget felis hendrerit placerat. Praesent a fringilla mi. Curabitur ullamcorper mi vitae dui vestibulum porta.";
    $lorem[] .= "Praesent elementum ut risus in commodo. In tempus mauris quis sapien porttitor pretium. Aliquam ut nisi metus. Fusce vel libero non quam vulputate feugiat sed at leo. Aliquam ipsum est, pulvinar ac sapien ac, volutpat eleifend magna. Aliquam feugiat erat vitae neque tempor tincidunt. Nulla eu leo malesuada, lobortis nulla ac, rutrum dui. In hac habitasse platea dictumst. Vestibulum porttitor lobortis quam, eget vestibulum dui dictum sit amet. Maecenas suscipit viverra tellus et faucibus. Duis nec placerat dui.";
    $lorem[] .= "Nulla bibendum libero enim, eget pulvinar est efficitur quis. Cras purus odio, vulputate eu sollicitudin id, porttitor quis sem. Phasellus ut malesuada mauris. Nam accumsan eros eros, sit amet dapibus erat commodo non. Cras in accumsan ex. Quisque malesuada faucibus est id dignissim. Donec id ipsum augue.";
    $lorem[] .= "Nunc non tempor dolor, sed convallis neque. Etiam consequat vulputate lacus, eu vehicula justo sodales sed. Maecenas iaculis sem quis egestas consectetur. Mauris dapibus lorem enim, in sodales massa luctus sit amet. Donec iaculis porta mauris, in sollicitudin lectus. Phasellus pellentesque posuere metus et feugiat. Etiam pretium imperdiet sem, at convallis leo imperdiet et. Ut vitae suscipit felis, id iaculis nunc. Quisque vitae cursus arcu. Vivamus eget fermentum eros. Sed et hendrerit metus.";
    $lorem[] .= "Donec bibendum justo non urna dignissim, vel porttitor massa eleifend. In tincidunt a diam eget consequat. Nam consectetur, est ut tristique finibus, turpis purus aliquet urna, sit amet malesuada ante leo eu sapien. Fusce non iaculis leo. Sed leo urna, elementum placerat ligula vitae, feugiat feugiat elit. Phasellus quam neque, fringilla pretium mauris ut, vestibulum placerat eros. Maecenas nec odio in leo iaculis mattis nec vestibulum quam. Aliquam imperdiet mauris ut sem tincidunt mollis.";
    $lorem[] .= "Mauris eu risus dapibus, posuere mauris sit amet, placerat erat. Vestibulum tristique magna erat, nec mollis mauris convallis at. Integer ultricies tempor nunc, sit amet tempus purus auctor sed. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque posuere velit sed congue auctor. Quisque ultrices egestas sem. Curabitur pellentesque sollicitudin elit, vitae pulvinar massa accumsan suscipit. In hendrerit ligula vel urna dictum, tincidunt bibendum erat pulvinar. Phasellus pharetra, lectus sed feugiat ullamcorper, quam justo facilisis sapien, quis porttitor elit arcu nec diam. Phasellus at mi arcu. Quisque interdum facilisis nunc ut fringilla. Phasellus nec erat eget dui aliquam porta sit amet in elit. Mauris a turpis rhoncus, consequat tortor sed, efficitur arcu.";
    $lorem[] .= "Sed finibus suscipit justo ac aliquam. Quisque egestas eleifend auctor. Quisque sit amet dapibus eros, cursus sollicitudin diam. Fusce quis diam ipsum. Quisque at risus vel sem maximus commodo ac eget ante. Curabitur at elementum magna. Aenean iaculis ipsum sed metus egestas vulputate. Vivamus malesuada varius lectus. Suspendisse suscipit, lectus nec commodo auctor, dolor justo venenatis orci, in malesuada nulla purus ut ante. Sed nec bibendum risus. Pellentesque scelerisque tempus lectus sed egestas. Morbi justo diam, pulvinar quis aliquam a, tincidunt sed lectus. Nulla fermentum iaculis consequat. Nullam lorem justo, cursus quis velit vel, pharetra convallis odio.";
    $lorem[] .= "Donec pellentesque mi eget nisi elementum, eu tincidunt dolor tincidunt. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam efficitur justo tempus orci efficitur, id elementum ante placerat. Sed consequat sapien ex. Suspendisse gravida nibh ex, at maximus neque aliquet at. Donec nunc arcu, semper vitae purus vel, ullamcorper ullamcorper lectus. Praesent sed lacus orci. Duis eget congue dui. Vivamus sagittis tempor nulla tincidunt vulputate. Sed viverra mi dui, quis placerat erat dignissim non.";
    $lorem[] .= "Suspendisse gravida neque lorem, quis blandit ex suscipit sed. Sed lobortis viverra urna. Duis tellus purus, fermentum eu lectus sed, maximus pulvinar dolor. Vestibulum commodo sodales tristique. Suspendisse dolor leo, interdum vitae leo sit amet, hendrerit gravida libero. Phasellus sollicitudin est gravida mauris fermentum volutpat. In hac habitasse platea dictumst. Nulla id risus velit. Fusce porttitor, metus eget maximus eleifend, urna lorem mollis neque, vitae sollicitudin est velit sed risus. Vestibulum id quam non orci dignissim euismod a non mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean sit amet scelerisque velit, sed pretium mauris. Vivamus finibus, nulla suscipit suscipit convallis, est enim hendrerit leo, non feugiat est nisl sit amet mauris. Nulla interdum pretium odio nec vestibulum.";
    $lorem[] .= "Quisque rutrum convallis lorem, sit amet finibus eros sodales condimentum. Morbi tempus fermentum nulla non laoreet. Proin erat enim, tincidunt id est nec, feugiat tincidunt erat. Integer ullamcorper blandit metus in congue. Ut a lectus vel nunc volutpat egestas. Fusce accumsan tristique elementum. Maecenas a faucibus magna. Donec tincidunt ante nec elementum tempus. Integer interdum justo euismod mi porttitor tincidunt nec lobortis nulla. Sed mattis, mi et ullamcorper volutpat, lorem enim faucibus massa, id lacinia sapien massa eget purus. Morbi sit amet tortor semper sapien sollicitudin blandit. Aenean tristique nisl arcu, eget scelerisque est congue vel. Aliquam vel orci id sem iaculis placerat. Curabitur id mattis lacus. Nunc eget elementum tortor, in malesuada elit. Maecenas convallis vulputate enim, ut commodo mauris condimentum id.";
    $lorem[] .= "Quisque ut aliquam risus. Nam posuere venenatis ipsum id sodales. Proin aliquet risus mollis aliquet mollis. Vestibulum ante enim, accumsan vitae orci et, viverra porta quam. Maecenas egestas est vitae mattis semper. Phasellus tincidunt lectus luctus, interdum lorem et, dignissim tellus. Pellentesque faucibus finibus tincidunt. In auctor placerat ultricies. Praesent et commodo libero, eu euismod mi.";
    $lorem[] .= "Donec gravida non est quis suscipit. Donec at velit nisl. Sed mollis tincidunt posuere. Quisque et ex odio. Maecenas felis arcu, tristique vitae luctus nec, aliquam in nibh. Quisque vel arcu nec ipsum efficitur hendrerit id a velit. Morbi porta ex ac vestibulum malesuada. Donec gravida feugiat quam, vitae convallis nisl consequat sit amet. Vestibulum tincidunt lorem ac massa vehicula, in sollicitudin quam tristique. Cras et felis ultricies, eleifend velit et, laoreet erat. Nulla non justo enim. Ut risus enim, dictum tempor ex eget, imperdiet sagittis nisl. Sed blandit ante eu condimentum sodales. Integer est eros, consectetur sit amet suscipit nec, pharetra id enim. Sed non ante vitae nisi posuere finibus.";
    $lorem[] .= "Suspendisse nisi dui, scelerisque et lectus ac, mattis dapibus lectus. Maecenas mollis tellus et dui eleifend rutrum consectetur eu sem. Suspendisse imperdiet sed erat vulputate pharetra. Donec lobortis leo id consectetur mattis. Sed sed justo sit amet augue dignissim fermentum at eget lacus. Etiam non ligula eget turpis scelerisque ullamcorper. Donec odio lorem, consectetur ut vehicula eu, dapibus ac diam. Nulla a tincidunt augue. Pellentesque iaculis porttitor urna nec dignissim.";
    return $lorem;
}
