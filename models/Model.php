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

    public function getPrimaryKey()
    {
        try {
            $stmt = $this->pdo->prepare("SHOW KEYS FROM {$this->table} WHERE Key_name = 'PRIMARY'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['Column_name'];
        } catch (PDOException $e) {
            die("Failed to get primary key: " . $e->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $primaryKey = $this->getPrimaryKey();
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE {$primaryKey} = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Find failed: " . $e->getMessage());
        }
    }



    public function update($id, $data)
    {
        try {
            $primaryKey = $this->getPrimaryKey();
            $setClause = '';
            foreach ($data as $key => $value) {
                $setClause .= "{$key} = ?, ";
            }
            $setClause = rtrim($setClause, ', ');

            $stmt = $this->pdo->prepare("UPDATE {$this->table} SET {$setClause} WHERE {$primaryKey} = ?");
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
            $primaryKey = $this->getPrimaryKey();
            $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE {$primaryKey} = ?");
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

    public function search($conditions = [])
    {
        try {
            $whereClauses = [];
            $values = [];
            foreach ($conditions as $key => $value) {
                if (strpos($key, 'LIKE') !== false) {
                    $value = "%{$value}%";
                }
                $whereClauses[] = $key;
                $values[] = $value;
            }

            $whereClause = implode(' AND ', $whereClauses);
            $sql = "SELECT * FROM {$this->table}";

            if (!empty($whereClause)) {
                $sql .= " WHERE {$whereClause}";
            }
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($values);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Search failed: " . $e->getMessage());
        }
    }

    public function join($firstTableColumns, $secondTableColumns, $firstColumnJoin, $secondColumnJoin, $secondTable, $joinType = 'INNER')
    {
        try {
            // Prepare the column lists for SELECT clause
            $table1Cols = implode(', ', array_map(function ($col) {
                return "{$this->table}.{$col}";
            }, $firstTableColumns));

            $table2Cols = implode(', ', array_map(function ($col) use ($secondTable) {
                return "{$secondTable}.{$col}";
            }, $secondTableColumns));

            // Combine both column lists
            $columns = "{$table1Cols}, {$table2Cols}";

            // Prepare the JOIN query
            $sql = "SELECT {$columns} FROM {$this->table} 
                    {$joinType} JOIN {$secondTable} 
                    ON {$this->table}.{$firstColumnJoin} = {$secondTable}.{$secondColumnJoin}";

            // Execute the query
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Join failed: " . $e->getMessage());
        }
    }
}
