<?php

namespace App\Models;
use App\Db\QueryBuilder;

class Task {
    private $user_id;
    private $created_at;
    private $task_name;
    private $task_description;
    private $task_difficulty;
    private $timeout;
    private $finished;
    private $xp_reward;
    private $gold_reward;

    public function __construct(array $data = []) {

        if (!empty($data)) {
            // Aqui o array dos dados é validado através do método interno validate()
            $validated_data = $this->validate($data);
            
            $this->user_id = $validated_data["user_id"];
            $this->task_name = $validated_data["task_name"];
            $this->task_description = $validated_data["task_description"];
            $this->task_difficulty = $validated_data["task_difficulty"];
            $this->timeout = $validated_data["timeout"];
        }

        // Valores padrão e calculados
        $this->created_at = date('Y-m-d H:i:s');
        $this->finished = false;
        
        $rewards = $this->calculateRewards($this->task_difficulty ?? 1);
        $this->xp_reward = $rewards['xp'];
        $this->gold_reward = $rewards['gold'];
    }

    private function validate(array $data): array {
        
        // Array associativo para utilizar o valor associado como função
        $required_fields = [
            'user_id' => 'is_int',
            'task_name' => 'is_string',
            'task_description' => 'is_string',
            'task_difficulty' => 'is_int',
            'timeout' => 'is_string'
        ];

        // Iteração que passa por cada item do array, separando em campo (chave) e checagem de tipo (valor)
        foreach ($required_fields as $field => $type_check) {

            // Lança exceção se estiver faltando um campo
            if (!isset($data[$field])) {
                throw new \InvalidArgumentException("O campo '$field' é obrigatório.");
            }

            // Lança exceção se o tipo for diferente do predeterminado
            if (!$type_check($data[$field])) {
                throw new \InvalidArgumentException("O campo '$field' possui um tipo inválido.");
            }

            // Validação individual de cada campo
            switch ($field) {
                case "user_id":
                    if ($field !== $_SESSION['user_id']) {
                        throw new \InvalidArgumentException("Você não tem permissão para executar essa ação.");
                    }
                    break;

                case "task_name":
                    if (strlen($field) > 50) {
                        throw new \InvalidArgumentException("O nome da tarefa deve ter no máximo 50 caracteres.");
                    }
                    break;

                case "task_description":
                    if (strlen($field) > 255) {
                        throw new \InvalidArgumentException("A descrição da tarefa deve ter no máximo 255 caracteres.");
                    }
                    break;

                case "task_difficulty":
                    if (!in_array($field, [1, 2, 3])) {
                        throw new \InvalidArgumentException("A dificuldade da tarefa deve ser um inteiro entre 1 e 3.");
                    }
                    break;
                
                case "timeout":
                    if (strlen($field) > 10) {
                        throw new \InvalidArgumentException("O tempo de execução da tarefa deve ter no máximo 10 caracteres.");
                    }
                    break;
            }
        }
        
        // Se passar por tudo isso, retorna a mesma lista
        return $data;
    }

    private function calculateRewards(int $difficulty): array {
        // TODO: Mover esta lógica para um Service de Gamificação no futuro.
        return match ($difficulty) {
            1 => ['xp' => 10, 'gold' => 5],
            2 => ['xp' => 25, 'gold' => 15],
            3 => ['xp' => 50, 'gold' => 30]
        };
    }

    public function get_user_id(): int|false {
        return $this->user_id;
    }

    public function get_created_at(): string|false {
        return $this->created_at;
    }

    public function get_task_name(): string|false {
        return $this->task_name;
    }

    public function set_task_name(string $task_name) {
        return $this->task_name = $task_name;
    }

    public function get_task_description(): string|false {
        return $this->task_description;
    }

    public function set_task_description(string $task_description) {
        return $this->task_description = $task_description;
    }

    public function get_task_difficulty(): int|false {
        return $this->task_difficulty;
    }

    public function set_task_difficulty(int $task_difficulty) {
        return $this->task_difficulty = $task_difficulty;
    }

    public function get_timeout(): string|false {
        return $this->timeout;
    }

    public function set_timeout(string $timeout) {
        return $this->timeout = $timeout;
    }

    public function get_finished(): bool {
        return $this->finished;
    }

    public function set_finished(bool $finished) {
        return $this->finished = $finished;
    }

    public function get_xp_reward(): int|false {
        return $this->xp_reward;
    }

    public function get_gold_reward(): int|false {
        return $this->gold_reward;
    }

    public function to_array(): array {
        return [
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'task_name' => $this->task_name,
            'task_description' => $this->task_description,
            'task_difficulty' => $this->task_difficulty,
            'timeout' => $this->timeout,
            'finished' => $this->finished,
            'xp_reward' => $this->xp_reward,
            'gold_reward' => $this->gold_reward
        ];
    }

    public static function findtask(int $id) {
        return QueryBuilder::db_select(values: ["*"], condition: "id = ?", condition_values: [$id]);
    }

    public static function find_by_timestamp(int $user_id, string $timestamp) {
        return QueryBuilder::db_select(values: ["*"], condition: "user_id = ?, created_at = ?", condition_values: [$user_id, $timestamp]);
    }

    public static function find_from(int $user_id) {
        return QueryBuilder::db_select(values: ["*"], condition: "user_id = ?", condition_values: [$user_id]);
    }

    public static function all() {
        return QueryBuilder::db_select(values: ["*"]);
    }

    public static function save(array $task_data) {
        return QueryBuilder::db_insert(
            [
                "user_id", "created_at", "task_name", "task_description",
                "task_difficulty", "timeout", "finished", "xp_reward", "gold_reward"
            ],
            [
                $task_data['user_id'], $task_data['created_at'], $task_data['task_name'],
                $task_data['task_description'], $task_data['task_difficulty'], $task_data['timeout'],
                $task_data['finished'], $task_data['xp_reward'], $task_data['gold_reward']
            ]
        );
    }

    public static function update(int $id, array $data) {
        return QueryBuilder::db_update(
            ["task_name", "task_description", "task_difficulty", "timeout"],
            [$data["task_name"], $data["task_description"], $data["task_difficulty"], $data["timeout"]],
            "id = ?",
            [$id]
        );
    }

    public static function complete(int $id, bool $is_finished) {
        return QueryBuilder::db_update(
            ["finished"],
            [$is_finished],
            "id = ?",
            [$id]
        );
    }

    public static function delete(int $id) {
        return QueryBuilder::db_delete("id = ?", [$id]);
    }
}