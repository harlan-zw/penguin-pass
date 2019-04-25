<?php

namespace PenguinPass;

class WordLists
{
    public $adjectiveList;
    public $nounList;

    /**
     * WordLists constructor.
     */
    public function __construct()
    {
        $path = dirname(__DIR__).'/';
        $this->adjectiveList = collect(explode("\n", file_get_contents($path.'resources/adjectives.txt')))->filter(function ($line) {
            return ! empty($line);
        });
        $this->nounList = collect(explode("\n", file_get_contents($path.'resources/nouns.txt')))->filter(function ($line) {
            return ! empty($line);
        });
    }

    public function randomAdjective()
    {
        return $this->adjectiveList->random();
    }

    public function randomNoun()
    {
        return $this->nounList->random();
    }
}
