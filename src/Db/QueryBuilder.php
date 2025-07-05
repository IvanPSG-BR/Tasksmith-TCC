<?php

namespace App\Db;
use PDO;
use PDOException;

class QueryBuilder {
    private $database;

    public function __construct($table) {
        $this->set_conn();
    }

    private function set_conn(): PDO {
        require_once __DIR__ . "/../../database/conn.php";
        $this->database = $conn;
        return $this->database;
    }

    public function select(array $values, string $table, array $extra_keywords = null, string $distinct_value = null, string $condition = null, string $order_value = null, string $search_pattern = null) {
        $query = "SELECT ";
        $bindings = [];

        if ($distinct_value) {
            $query .= "DISTINCT " . $distinct_value . " ";
        }

        $query .= implode(", ", $values) . " FROM " . $table;

        if ($search_pattern) {
            if ($condition) {
                $query .= " WHERE " . $condition . " LIKE ?";
                $bindings[] = "%" . $search_pattern . "%";
            } else {
                error_log("Erro: search_pattern fornecido sem uma coluna para a condição LIKE.");
                return false;
            }
        } else if ($condition) {
            $query .= " WHERE " . $condition;
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

        try {
            $stmt = $this->database->prepare($query);
            $stmt->execute($bindings);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao Realizar a consulta: " . $e->getMessage());
            return false;
        }
    }
}
