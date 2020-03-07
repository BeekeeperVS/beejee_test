<?php


namespace vendor\components;


abstract class BaseQuery
{
    /**
     * @var string
     */
    private $tableName;
    /**
     * @var string
     */
    private $modelName;

    /**
     * DBQuery constructor.
     * @param string $modelName
     * @param string $tableName
     */
    public function __construct(
        string $modelName,
        string $tableName
    )
    {
        $this->setModelName($modelName);
        $this->setTableName($tableName);
    }

    /**
     * @return string
     */
    public function getModelName(): string
    {
        return $this->modelName;
    }

    /**
     * @param string $modelName
     */
    public function setModelName(string $modelName)
    {
        $this->modelName = $modelName;
    }

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }
}