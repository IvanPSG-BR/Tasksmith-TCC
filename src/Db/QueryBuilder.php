<?php

namespace App\Db;
use PDO;
use PDOException;
use PDOStatement;

class QueryBuilder {
    private PDO $database;
    private $table;

    public function __construct(PDO $database, string $table) {
        self::$database = $database;
        self::$table = $table;
    }

    private static function execute(string $query, array $params = []): PDOStatement | bool {
        try {
            $stmt = self::$database->prepare($query);
            if ($stmt->execute($params)) {
                return $stmt; // Retorna o PDOStatement em caso de sucesso
            }
            return false; // Retorna false se a execução falhar
        } catch (PDOException $e) {
            error_log("Erro ao Realizar a consulta: " . $e->getMessage());
            return false;
        }
    }

    public static function db_select(array $values, string $distinct_value = null, string $condition = null, array $condition_values = [], string $search_pattern = null, array $extra_keywords = null, string $order_value = null) {
        $query = "SELECT ";
        $bindings = [];

        if ($distinct_value) {
            $query .= "DISTINCT " . $distinct_value . " ";
        }

        $query .= implode(", ", $values) . " FROM " . self::$table;

        if ($condition) {
            $query .= " WHERE " . $condition;
            $bindings = array_merge($bindings, $condition_values);
        }

        if ($search_pattern) {
            if ($condition) {
                // Adiciona LIKE à condição existente
                $query .= " LIKE ?";
                $bindings[] = "%" . $search_pattern . "%";
            } else {
                error_log("Erro: search_pattern fornecido sem uma coluna para a condição LIKE.");
                return false;
            }
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

        $stmt = self::execute($query, $bindings);

        if ($stmt instanceof PDOStatement) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public static function db_insert(array $fields, array $values) {
        $query = "INSERT INTO self::table ";
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
        $result = self::execute($query, $values);

        if ($result) {
            return self::$database->lastInsertId();
        }
        return false;
    }

    public static function db_update(array $fields, array $values, string $condition, array $condition_values) {
        $query = "UPDATE self::table SET ";
        $set_parts = [];

        if (count($fields) != count($values)) {
            error_log("Erro: Número de campos passados diferente do número de valores");
            return false;
        }
        if (!array_is_list($fields) || !array_is_list($values)) {
            error_log("Erro: Campos e valores devem ser arrays unidimensionais");
            return false;
        }

        foreach ($fields as $field) {
            $set_parts[] = "$field = ?";
        }
        $query .= implode(", ", $set_parts);
        $query .= " WHERE ($condition);";

        $all_values = array_merge($values, $condition_values);
        $result = self::execute($query, $all_values);

        if ($result) {
            return true;
        }
        return false;
    }

    public static function db_delete(string $condition, array $condition_values) {
        $query = "DELETE FROM " . self::$table . " WHERE ($condition);";

        $result = self::execute($query, $condition_values);

        if ($result) {
            return true;
        }
        return false;
    }
}
