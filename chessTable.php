<body bgcolor="olive" >  
    <style>
        a{
            /*font-size: 38px;*/
            /*background-color: #ffcc33;*/
        }
    </style>
    <?php
    $chessPieces = [];

    $chessPieces['white']['pawn'] = '<a>&#9817</a>';
    $chessPieces['white']['bishop'] = '<a>&#9815</a>';
    $chessPieces['white']['knight'] = '<a>&#9816</a>';
    $chessPieces['white']['quin'] = '<a>&#9813</a>';
    $chessPieces['white']['king'] = '<a>&#9812</a>';
    $chessPieces['white']['rock'] = '<a>&#9814</a>';
    
    $chessPieces['black']['pawn'] = '<a>&#9823</a>';
    $chessPieces['black']['bishop'] = '<a>&#9821</a>';
    $chessPieces['black']['knight'] = '<a>&#9822</a>';
    $chessPieces['black']['quin'] = '<a>&#9819</a>';
    $chessPieces['black']['king'] = '<a>&#9818</a>';
    $chessPieces['black']['rock'] = '<a>&#9820</a>';
?>
    <a>
        <table border="1" style="border-color: #003333" >
    <?php
    for($i=0;$i<8;$i++){
       ?>
<tr>
           <?php
        for($e=0;$e<8;$e++){
            if(($i+$e)%2==0){
        $color="yellowgreen";
    }else{
        $color="lightblue";
        ?>
<style>
    button{
        background-color: #003333;
    }
</style>
            <?php
    }
 $value= getValue($chessPieces,$i,$e);
    
         ?>
    <td> 
        <button type="submit" name="<?=$i.$e?>" style="font-size: xx-large; width: 59px;height: 59px;background-color: <?=$color?>"><?=$value?></button>
    </td>
             <?php   
             $value='';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
    </a>
    <?php
    /**
     * 
     * @param array $chessPieces
     * @param int $i
     * @param int $e
     * @return array
     */
    function getValue(array $chessPieces=[],int $i=0, int $e){
           
    if($i==6){
        $value=$chessPieces['white']['pawn'];
    }
    elseif($i==1){
        $value=$chessPieces['black']['pawn'];
    }
    elseif ($i==0&&($e==0||$e==7)) {
    $value=$chessPieces['black']['rock'];
}
elseif ($i==0&&($e==1||$e==6)) {
$value=$chessPieces['black']['knight'];
}
elseif($i==0&&($e==2||$e==5)){
    $value=$chessPieces['black']['bishop'];
}
elseif ($i==0&&$e==3) {
$value=$chessPieces['black']['quin'];
}
elseif ($i==0&&$e==4) {
$value=$chessPieces['black']['king'];
}
elseif ($i==7) {
    if($e==0||$e==7){
        $value=$chessPieces['white']['rock'];
    }
    elseif($e==1||$e==6){
        $value=$chessPieces['white']['knight'];
    }
    elseif($e==2||$e==5){
        $value=$chessPieces['white']['bishop'];
    }
    elseif($e==3){
        $value=$chessPieces['white']['quin'];
    }
    elseif($e==4){
        $value=$chessPieces['white']['king'];
    }
}else{
    $value='';
}
return $value;
    }
    
    
    ?>
</body>