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
        $this->adjectiveList = collect(explode("\n", file_get_contents('resources/adjectives.txt')))->filter(function ($line) {
            return ! empty($line);
        });
        $this->nounList = collect(explode("\n", file_get_contents('resources/nouns.txt')))->filter(function ($line) {
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
