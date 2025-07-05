<?php

namespace App\Db;
use PDO;
use PDOException;
use PDOStatement;

class QueryBuilder {
    private PDO $database;
    private $table;

    public function __construct($table) {
        $this->table = $table;
        $this->set_conn();
    }

    private function set_conn(): PDO {
        require_once __DIR__ . "/../../database/conn.php";
        $this->database = $conn;
        return $this->database;
    }

    private function execute(string $query, array $params = []): PDOStatement | bool {
        try {
            $stmt = $this->database->prepare($query);
            if ($stmt->execute($params)) {
                return $stmt; // Retorna o PDOStatement em caso de sucesso
            }
            return false; // Retorna false se a execução falhar
        } catch (PDOException $e) {
            error_log("Erro ao Realizar a consulta: " . $e->getMessage());
            return false;
        }
    }

    public function select(array $values, array $extra_keywords = null, string $distinct_value = null, string $condition = null, string $order_value = null, string $search_pattern = null) {
        $query = "SELECT ";
        $bindings = [];

        if ($distinct_value) {
            $query .= "DISTINCT " . $distinct_value . " ";
        }

        $query .= implode(", ", $values) . " FROM " . $this->table;

        if ($search_pattern) {
            if ($condition) {
                $query .= " WHERE " . "($condition)" . " LIKE ?";
                $bindings[] = "%" . $search_pattern . "%";
            } else {
                error_log("Erro: search_pattern fornecido sem uma coluna para a condição LIKE.");
                return false;
            }
        } else if ($condition) {
            $query .= " WHERE " . "($condition)";
        }

        if ($extra_keywords) {
            foreach ($extra_keywords as $keyword) {
                switch (strtoupper($keyword)) {
                    case "ORDER BY":
                        if ($order_value) {
                            $query .= " ORDER BY " . $order_value;
                        } else {
                            error_log("Erro: ORDER BY especificado sem um valor de ordenação.");
                            return false;
                        }
                        break;
                }
            }
        }

        $stmt = $this->execute($query, $bindings);

        if ($stmt instanceof PDOStatement) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function insert(array $fields, array $values) {
        $query = "INSERT INTO $this->table ";
        $value_bindings = array_pad([], count($values), "?");

        if (count($fields) != count($values)) {
            error_log("Erro: Número de campos passados diferente do número de valores");
            return false;
        }
        if (!array_is_list($fields) || !array_is_list($values)) {
            error_log("Erro: Campos e valores devem ser arrays unidimensionais");
            return false;
        }

        $fields = implode(", ", $fields);
        $query .= "($fields) VALUES (" . implode(", ", $value_bindings) . ");";
        $result = $this->execute($query, $values);

        if ($result) {
            return $this->database->lastInsertId();
        }
        return false;
    }

    public function update(array $fields, array $values, string $condition) {
        $query = "UPDATE $this->table SET ";
        $set_parts = [];

        if (count($fields) != count($values)) {
            error_log("Erro: Número de campos passados diferente do número de valores");
            return false;
        }
        if (!array_is_list($fields) || !array_is_list($values)) {
            error_log("Erro: Campos e valores devem ser arrays unidimensionais");
            return false;
        }

        foreach ($fields as $index => $field) {
            $set_parts[] = "$field = ?";
        }
        $query .= implode(", ", $set_parts);
        $query .= " WHERE ($condition);";

        $result = $this->execute($query, $values);

        if ($result) {
            return true;
        }
        return false;
    }

    public function delete(string $condition) {
        $query = "DELETE FROM " . $this->table . " WHERE ($condition);";

        $result = $this->execute($query);

        if ($result) {
            return true;
        }
        return false;
    }
}
