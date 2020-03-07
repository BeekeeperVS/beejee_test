<?php


namespace vendor\components;


use models\db\Tasks;
use PDO;

class DBQuery extends BaseQuery
{
    /**
     * @var string
     */
    private $sql;


    /**
     * @return $this
     */
    public function select(): DBQuery
    {
        $this->sql = "SELECT * FROM {$this->getTableName()}";
        return $this;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function selectById($id)
    {
        $this->sql = "SELECT * FROM {$this->getTableName()} WHERE id=:id";
        $result = Component::$db->prepare($this->sql);
        $result->execute(array(':id' => $id));
        return $result->fetch(PDO::FETCH_OBJ);

    }

    /**
     * @return int
     */
    public function count(): int
    {
        $this->select();
        $sth = Component::$db->prepare($this->sql);
        $sth->execute();
        return $sth->rowCount();
    }

    public function where()
    {

    }

    /**
     * @param int $start
     * @param int|null $end
     * @return DBQuery
     */
    public function limit(int $start, int $end = null): DBQuery
    {
        if (isset($end)) {
            $this->sql .= " LIMIT {$start},{$end}";
        } else {
            $this->sql .= " LIMIT {$start}";
        }
        return $this;
    }

    /**
     * @param int $position
     * @return DBQuery
     */
    public function offset(int $position): DBQuery
    {

        $this->sql .= " OFFSET {$position}";
        return $this;
    }

    /**
     * @param string $column
     * @param string $sortValue
     * @return $this
     */
    public function sort(string $column = 'id', string $sortValue = 'ASC')
    {
        $asc = ($sortValue == 'ASC') ? '-' : '';
        $desc = ($sortValue == 'DESC') ? '-' : '';

        $this->sql .= " ORDER BY {$asc}{$column} DESC, {$desc}{$column} ASC";
        return $this;
    }

    /**
     * @param array $params
     * @return bool
     */
    public function update(array $params): bool
    {
        $lisParametersSql = [];
        foreach ($params as $column => $value) {
            if ($column == 'id') {
                continue;
            }
            $lisParametersSql[] = "$column=:$column";
        }
        $parametersSql = implode(", ", $lisParametersSql);
        $sql = "UPDATE {$this->getTableName()} SET {$parametersSql} WHERE id=:id";

        return Component::$db->prepare($sql)->execute($params);
    }

    /**
     * @param array $params
     * @return bool
     */
    public function create(array $params): bool
    {
        $lisParametersSql = [];
        $listColumnsSql = [];
        foreach ($params as $column => $value) {
            if ($column == 'id') {
                unset($params['id']);
                continue;
            }
            $listColumnsSql[] = "$column";
            $lisParametersSql[] = ":$column";
        }
        $columnsSql = implode(', ', $listColumnsSql);
        $parametersSql = implode(', ', $lisParametersSql);
        $sql = "INSERT INTO {$this->getTableName()} ({$columnsSql}) VALUES ({$parametersSql})";

        return Component::$db->prepare($sql)->execute($params);

    }


    /**
     * @return array
     */
    public function all(): array
    {

        return Component::$db->query($this->sql)->fetchAll(PDO::FETCH_CLASS, $this->getModelName());

    }

}