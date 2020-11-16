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

        $results = $dbh->fetchAll();

        $array = array();
        foreach($results as $result){
            $values = array_values($result);
            $array[] = new static(...$values);
        }
        
        return $array;
    }

    // idで取得
    public static function findById($id){
        $sql = implode(' ', [
            'SELECT * FROM',
            static::$table,
            'WHERE id = ?'
        ]);
        
        $dbh = db_connect()->prepare($sql);
        $dbh->bindValue(1,$id,PDO::PARAM_STR);
        $dbh->execute();
        $result = $dbh->fetch();
        // var_dump($result);
        
        if(!$result){
            return null;
        }

        $values = array_values($result);
        return new static(...$values);
    }

    // 条件に合うレコードを１軒取得
    public static function find($params){
        $keys   = array_keys($params);
        $values = array_values($params);
        
        $sql = implode(' ',[
            'SELECT * FROM',
            static::$table,
            'WHERE',
            implode(' = ? AND ', $keys).' = ?'
        ]);
        // print $sql;

        $dbh = db_connect()->prepare($sql);
        $dbh->execute($values);
        $result = $dbh->fetch();

        if(!$result){
            return null;
        }
        
        $values = array_values($result);

        return new static(...$values);
    }


    // 条件に合うレコードを複数件取得
    public static function where($params){
        $keys   = array_keys($params);
        $values = array_values($params);
        
        $sql = implode(' ',[
            'SELECT * FROM',
            static::$table,
            'WHERE',
            implode(' = ? AND ', $keys).' = ?'
        ]);
        // print $sql;

        $dbh = db_connect()->prepare($sql);
        $dbh->execute($values);
        $results = $dbh->fetchAll();
        // var_dump($results);
        
        $array = array();
        foreach($results as $result){
            $values = array_values($result);
            $array[] = new static(...$values);
        }
        
        return $array;
    }


    public static function create($params){
        if(static::$timestamps) {
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

    public static function update($params){
        $id = $params['id'];
        unset($params['id']); // idを取り出し$params上からは削除

        $keys   = array_keys($params);
        $values = array_values($params);

        $sql = implode(' ',[
            'UPDATE',
            static::$table,
            'SET',
            implode(' = ?,',$keys).' = ?',
            'WHERE',
            'id = ?'
        ]);
        
        print $sql;

        $dbh = db_connect()->prepare($sql);
        
        $i = 1;
        foreach($values as $value){
            $dbh->bindValue($i,$value,PDO::PARAM_STR);
            $i ++;
        }
        $dbh->bindValue($i,$id,PDO::PARAM_STR);

        if (!$dbh->execute()) {
            return false;
        }

        return true;

    }
}

?>