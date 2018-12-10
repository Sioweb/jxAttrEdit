<?php

namespace Job963\Oxid\AttrEdit\Core;

use OxidEsales\Eshop\Core\DatabaseProvider;

class Events
{

    public static function onActivate()
    {
        $Database = DatabaseProvider::getDb();
        $hasColumn = $Database->select("
            SELECT * FROM information_schema.COLUMNS WHERE
            TABLE_NAME = ? AND COLUMN_NAME = ?;
        ", ['oxattribute', 'jxattredit_fastedit'])->fetchAll();

        if (empty($hasColumn)) {
            $Database->execute("
                ALTER TABLE `oxattribute` ADD `jxattredit_fastedit` int( 1 ) NOT NULL DEFAULT '0'
            ");
        }
    }

    public static function onDeactivate()
    {
    }
}
