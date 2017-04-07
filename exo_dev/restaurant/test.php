<?php

try {

    if (true) {
        test();
    }
}
catch(DomainException $e)
{
    var_dump($e);
    //echo $e->getMessage();
}



function test()
{
    throw new DomainException('Mon erreur pas cool');
}
