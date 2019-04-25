<?php

namespace PenguinPass;

use Illuminate\Support\Str;

class Generator
{
    protected $titleWords;
    protected $adjectives;
    protected $minLength;
    protected $useNumbers;
    protected $numbers;
    protected $join;

    private $wordList;

    /**
     * Generator constructor.
     */
    public function __construct($config = [])
    {
        $default = config('passwords');
        $config = array_merge($default, $config);

        foreach ($config as $k => $v) {
            $this->$k = $v;
        }

        $this->wordList = new WordLists();
    }

    public function make()
    {
        $password = [];
        for ($i = 0; $i < $this->adjectives; $i++) {
            $adjective = $this->wordList->randomAdjective();
            $noun = $this->wordList->randomNoun();
            $adjective = $this->titleWords ? Str::title($adjective) : $adjective;
            $noun = $this->titleWords ? Str::title($noun) : $noun;
            $password[] = $adjective.$noun;
            if ($this->useNumbers) {
                $password[] = random_int(10, 99);
            }
        }

        return implode($this->join, $password);
    }

    public function titleWords($enable = true)
    {
        $this->titleWords = $enable;

        return $this;
    }

    public function useNumbers($enable = true)
    {
        $this->useNumbers = $enable;

        return $this;
    }

    public function adjectives($count)
    {
        $this->adjectives = $count;

        return $this;
    }

    public function minLength($minLength)
    {
        $this->minLength = $minLength;

        return $this;
    }

    public function numbers($count)
    {
        $this->numbers = $count;

        return $this;
    }

    public function join($string)
    {
        $this->join = $string;

        return $this;
    }
}
