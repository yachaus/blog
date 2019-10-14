<?php

namespace App\Classes;

use App\Singleton;

class Db
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $config = Config::instance();
        try {
            $this->dbh = new \PDO(
                'mysql:host=' . $config->data['db']['host'] . '; dbname=' . $config->data['db']['dbname'],
                $config->data['db']['username'], $config->data['db']['passwd']);
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db('Unable to connect to database!');
        }
    }

    public function execute($sql, $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($params);
            return $res;
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db($e->getMessage());
        }
    }

    public function query($sql, $class = null, $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($params);
            if ($res == false) {
                throw new \App\Exceptions\Db('Request Error!');
            }
            if (false !== $res) {
                return $class ? $sth->fetchAll(\PDO::FETCH_CLASS, $class): $sth->fetchAll();
            } else
                return false;
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db($e->getMessage());
        }

    }

    public function queryEach($sql, $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql,[\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
        $res = $sth->execute($params);
        $sth->setFetchMode(8, $class);
        if ($res == false) {
            throw new \App\Exceptions\Db('Request Error!');
        } else {
            while ($fetch = $sth->fetch()) {
                yield $fetch;
            }
        }
    }
}