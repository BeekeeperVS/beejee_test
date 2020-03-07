<?php


namespace vendor\components;


abstract class Helper
{

    /**
     * @param $rout
     * @param array $params
     * @return string
     */
    public static function createSortableUrl($rout, array $params): string
    {
        $listSortParams = [
            '-' . $params['sort'] => $params['sort'],
            $params['sort'] => '-' . $params['sort']
        ];

        if (isset($_GET['sort']) && isset($listSortParams[$_GET['sort']])) {
            $params['sort'] = $listSortParams[$_GET['sort']];
        }

        return $rout . '?' . http_build_query($params);
    }

    /**
     * @param $rout
     * @param array $params
     * @return string
     */
    public static function createGetUrl($rout, array $params): string
    {
        $params = array_merge($_GET, $params);
        return $rout . '?' . http_build_query($params);
    }

    /**
     * @param $rout
     * @param array $params
     * @return string
     */
    public static function createUrl($rout, array $params = []): string
    {
        if (isset($params)) {
            return $rout;
        }
        return $rout . '?' . http_build_query($params);
    }
}