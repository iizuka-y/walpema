<?php
require_once(dirname(__FILE__).'/../fn_components/db_connect.php');

class Model{

    protected static $table = 'table';
    protected static $timestamps = true;


    public static function all(){
        $sql = implode(' ', [
            'SELECT * FROM',
            static::$table
        ]);

        $dbh = db_connect()->prepare($sql);
        $dbh->execute();

        return $dbh->fetchAll();
    }

    public static function findById($id){
        $sql = implode(' ', [
            'SELECT * FROM',
            static::$table,
            'WHERE id = ?'
        ]);
        
        $dbh = db_connect()->prepare($sql);
        $dbh->bindValue(1,$id,PDO::PARAM_STR);
        $dbh->execute();

        return $dbh->fetchAll();
    }

    public static function create($params){
        if (static::$timestamps) {
            $now = date('Y-m-d H:i:s');
            foreach (['created_at', 'updated_at'] as $timestamps_key) {
                $params[$timestamps_key] = $now;
            }
        }

        $keys   = array_keys($params);
        $values = array_values($params);

        $sql = implode(' ', [
            'INSERT INTO',
            static::$table,
            '('.implode(', ', $keys).')',
            'VALUES',
            '('.implode(', ', array_pad([], count($values), '?')).')',
        ]);

        $dbh = db_connect()->prepare($sql);

        if (!$dbh->execute($values)) {
            return false;
        }

        return true;

    }
}

?>