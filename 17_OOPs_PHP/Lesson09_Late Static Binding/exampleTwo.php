<?php


/* 

self:: = "Use my own version" (where the method is defined)

static:: = "Use whoever is calling me" (dynamic / late binding)
*/
class ParentClass
{
    public static function who()
    {
        echo __CLASS__;
    }
    public static function test()
    {
        self::who();
    }

    public static function testLateStatic()
    {
        static::who();
    }
}

class ChildClassDerived extends ParentClass
{
    public static function who()
    {
        echo __CLASS__;
    }
}

ChildClassDerived::test();

ChildClassDerived::testLateStatic();