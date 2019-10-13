<?php

namespace App;

class Db
{
    use \App\Singleton;

    protected $dbh;

    protected function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:host=localhost; dbname=blog', 'root', 'root');
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

    public function query($sql, $class = NULL, $params = [])
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