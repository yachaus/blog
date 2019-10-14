<?php

namespace App\Classes\Models;

use App\Classes\Db;

abstract class Model
{
    const TABLE = '';
    public $id;

    /**
     * Метод, возвращающий запись по id из базы данных, в виде обьекта
     * @param $id int
     * @return mixed
     */
    public static function findById($id)
    {
        $db = Db::instance();
        $data = [':id' => $id];
        $recordById = $db->query('SELECT ALL * FROM ' . static::TABLE . ' WHERE id=:id', static::class, $data);
        if (isset($recordById[0])) {
            return $recordById[0];
        } else
            return null;
    }

    public static function count()
    {
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE;
        $db = Db::instance();
        $res = $db->query($sql);
        return $res[0]['count'];
    }

    public static function findByPostId($id)
    {
        $db = Db::instance();
        $data = [':id' => $id];
        $recordById = $db->query('SELECT ALL * FROM ' . static::TABLE . ' WHERE post_id=:id ORDER BY date DESC', static::class, $data);
        return $recordById;
    }

    /**
     * Метод, возвращающий все записи из базы данных, в виде обьекта
     * @return mixed
     */
    public static function findAll($options = null)
    {
        $db = Db::instance();
        $res = $db->queryEach(
            'SELECT * FROM ' . static::TABLE . ' ' . $options,
            static::class
        );
        return $res;
    }

    /**
     * Метод, Active Record, записывает данные в базу данных
     */
    public function insert()
    {
        $db = Db::instance();
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if (('id' == $k) || ('date' == $k)) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }
        $sql = '
        INSERT INTO ' . static::TABLE . '
        (' . implode(',', $columns) . ')
        VALUES
        (' . implode(',', array_keys($values)) . ')
         ';
        $db->execute($sql, $values);
    }

    public function fill($data = [])
    {
        foreach ($this as $k => $v) {
            if (!empty($data[$k])) {
                $this->$k = $data[$k];
            }
        }
    }
}
