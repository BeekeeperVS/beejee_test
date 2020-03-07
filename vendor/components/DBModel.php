<?php


namespace vendor\components;


class DBModel
{
    /**
     * @return DBQuery
     */
    public static function query(): DBQuery
    {
        return new DBQuery(
            get_called_class(),
            get_called_class()::tableName()
        );
    }

    /**
     * @return string
     */
    public static function tableName(): string
    {
        $tableNameUpperCase = end(explode("\\", get_called_class()));
        $listSplit = preg_split('/(?=[A-Z])/u', $tableNameUpperCase);
        if (count($listSplit) > 1) {
            $tableName = '';
            foreach ($listSplit as $listItem) {
                $tableName .= (($tableName ? '_' : '') . strtolower($listItem));
            }
            return $tableName;
        }
        $tableName = strtolower($tableNameUpperCase);
        return $tableName;
    }

    public function save()
    {
        $objectVars = get_object_vars($this);
//        print_r($objectVars); die;
        if ($objectVars['id']){
            self::query()->update($objectVars);
        } else {
            self::query()->create($objectVars);
        }
    }
}