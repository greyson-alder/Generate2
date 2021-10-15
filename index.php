<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate 2</title>
    <link href="main.css" rel="stylesheet" />
</head>
<body>
    <?php 
        $PALETTE = rand(0, 360);
        $CHOSEN_X = rand(0, 9);
        $CHOSEN_Y = rand(0, 9);
    ?>
    <div 
        class="grid__container"
        data-chosenX="<?=$CHOSEN_X?>"
        data-chosenY="<?=$CHOSEN_Y?>"
    >
        <?php for ($i = 0; $i < 100; $i++) {
            $x = floor($i/10);
            $y = $i - $x*10;
            $AVERAGE = ($x + $y)/2;
            $DIFF_X = abs($CHOSEN_X - $x);
            $DIFF_Y = abs($CHOSEN_Y - $y);
            $DIFF_FROM_CHOSEN = sqrt( $DIFF_X**2 + $DIFF_Y**2 );
            ?>
            <div 
                class="grid__item"
                style=" background-color: hsl(<?=$PALETTE+($DIFF_FROM_CHOSEN)*(360/18)?>deg, 75%, 75%);
                        transform: scale(<?= ($DIFF_FROM_CHOSEN > 9) ? 0 : (1 - $DIFF_FROM_CHOSEN/9);?>);
                        ";
                data-x="<?=$x?>"
                data-y="<?=$y?>"
                data-diff_from_chosen="<?=$DIFF_FROM_CHOSEN?>"
                data-scale="<?= 1 - $DIFF_FROM_CHOSEN / sqrt(162) ?>"
            ></div>
            <!-- <?="#".$i+1?> -->
        <?php } 
        ?>
    </div>
</body>
</html>