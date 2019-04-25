<?php

namespace PenguinPass;

use Illuminate\Support\Facades\Facade;

class Password extends Facade
{
    public static function generate()
    {
        return (new Generator)->make();
    }

}
