<?php

    function getLettersArray()
    {
        return [
            'a' => true
        ];
    }

    function getSerializedLetters($lettersArray)
    {
        return urlencode(serialize($lettersArray));
    }
    function getUnSerializedLetters($lettersArray)
    {
        return unserialized(urldecode($lettersArray));
    }

    function getWordsArry()
    {
        return file(SOURCE_NAME, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)?:false;
    }

    function getRandomIndex($someArray)
    {
        return rand(0, count($someArray) - 1);
    }

    function getWord($wordsArray, $wordArray)
    {
        return streplace(' ', '', strtolower($wordsArray[$wordIndex]));
    }

    function getReplacementString($count)
    {
        return str_pad('', $count, REPLACEMENT_CHAR);
    }
