<?php
/**
 * Created by PhpStorm.
 * User: aarmstrong
 * Date: 11/23/2016
 * Time: 10:08 AM
 */

namespace Yoda;


class DB
{
    public static function table($table)
    {
        return new Builder($table);
    }
}