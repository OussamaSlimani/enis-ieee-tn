<?php
require_once 'config/EnvLoader.php';

class Model
{
    private static $instance = null;
    protected $pdo;
    protected $table;

    private function __construct()
    {
        try {
            $loader = new EnvLoader();
            $loader->loadEnv('config/.env');

            $dsn = 'mysql:host=' . $loader->getEnv('DB_HOST') . ';dbname=' . $loader->getEnv('DB_DATABASE');
            $username = $loader->getEnv('DB_USER');
            $password = $loader->getEnv('DB_PASSWORD');

            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function create($data)
    {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = implode(', ', array_fill(0, count($data), '?'));
            $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array_values($data));
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            die("Create failed: " . $e->getMessage());
        }
    }

    public function all()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->table}");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Find failed: " . $e->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Find failed: " . $e->getMessage());
        }
    }

    public function update($id, $data)
    {
        try {
            $setClause = '';
            foreach ($data as $key => $value) {
                $setClause .= "{$key} = ?, ";
            }
            $setClause = rtrim($setClause, ', ');

            $stmt = $this->pdo->prepare("UPDATE {$this->table} SET {$setClause} WHERE id = ?");
            $values = array_values($data);
            $values[] = $id;
            $stmt->execute($values);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            die("Update failed: " . $e->getMessage());
        }
    }


    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
            $stmt->execute([$id]);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            die("Delete failed: " . $e->getMessage());
        }
    }

    public function deleteAll()
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM {$this->table}");
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            die("Delete failed: " . $e->getMessage());
        }
    }

    public function findBy($conditions = [])
    {
        try {
            $whereClause = '';
            $values = [];
            foreach ($conditions as $key => $value) {
                $whereClause .= "{$key} = ? AND ";
                $values[] = $value;
            }
            $whereClause = rtrim($whereClause, ' AND ');
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE {$whereClause}");
            $stmt->execute($values);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Find by condition failed: " . $e->getMessage());
        }
    }
}
