<?php

function myPrint_r($val)
{
    if (MODE == 'dev') {
        echo '<pre>';
        print_r($val);
        echo '</pre>';
    }
}
