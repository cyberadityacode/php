<!-- 
You're creating a class with a static method 
that helps you convert a string into a "slug" — 
like turning "Hello World!" into "hello-world". 
-->

<?php

class StringHelper
{
    public static function slugify($text)
    {
        // replace anything that is not a letter, number or dash with a dash

        $text = preg_replace("/[^A-Za-z0-9-]+/", "-", $text);
        // make everything lowercase
        $text = strtolower($text);
        // remove spaces from beginning and end
        return trim($text);
    }

}

echo StringHelper::slugify("Hello World! PHP is Awesome");