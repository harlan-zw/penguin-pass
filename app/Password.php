<?php

namespace PenguinPass;

class Password
{
    public static function generate()
    {
        return (new Generator)->make();
    }
}
