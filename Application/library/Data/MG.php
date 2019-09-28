<?php

namespace Data;

/*
 * 纯静态的数据库操作CLASS，通过类名调用
 * 保证在while期间不会生成新对象，防止吃空内存
 * ------*** Citybay Copy Right ***------
 *        软著持有人Citybay禁止转载
 */

class MG {

    // Mongodb连接
    public static $mongo;
    public static $dbname;

    public static function conn($dbname = 'queue') {
        $host = '127.0.0.1';
        $port = '27017';
        self::$dbname = $dbname;
        $mongo_server = $host . ':' . $port;
        try {
            self::$mongo = new MongoClient($mongo_server, array('connect' => true));
        } catch (MongoConnectionException $e) {
            echo date('Y-m-d H:i:s') . ' : MongoDB CONNECTED ERROR!!!' . "\r\n";
            sleep(1);
            self::conn($dbname = 'queue');
        }
    }

    /**
     * 创建索引：如索引已存在，则返回。
     * 成功：true
     * 失败：false
     */
    public static function ensureIndex($table_name, $index, $index_param = array()) {
        $db = self::$dbname;
        $index_param ['w'] = 1;
        try {
            self::$mongo->$db->$table_name->ensureIndex($index, $index_param);
            return true;
        } catch (MongoCursorException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * 插入记录
     * 返回值：
     * 成功：true
     * 失败：false
     */
    public static function insert($table_name, $record) {
        $db = self::$dbname;
        try {
            self::$mongo->$db->$table_name->insert($record);
            return $record['_id'];
        } catch (MongoCursorException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * 查询表的记录数
     *
     * 返回值：表的记录数
     */
    public static function count($table_name) {
        $db = self::$dbname;
        return self::$mongo->$db->$table_name->count();
    }

    /**
     * 更新记录
     * 返回值：
     * 成功：true
     * 失败：false
     */
    public static function update($table_name, $condition, $newdata, $options = array()) {
        $db = self::$dbname;
        $options ['w'] = 1;
        if (!isset($options ['multiple'])) {
            $options ['multiple'] = 0;
        }
        try {
            self::$mongo->$db->$table_name->update($condition, $newdata, $options);
            return true;
        } catch (MongoCursorException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * 删除记录
     *
     * 返回值：
     * 成功：true
     * 失败：false
     */
    public static function remove($table_name, $condition, $options = array()) {
        $db = self::$dbname;
        $options ['w'] = 1;
        try {
            self::$mongo->$db->$table_name->remove($condition, $options);
            return true;
        } catch (MongoCursorException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * 查找记录
     *
     * 返回值：
     * 成功：记录集
     * 失败：false
     */
    public static function find($table_name, $query_condition, $result_condition = array(), $fields = array()) {

        $db = self::$dbname;
        $cursor = self::$mongo->$db->$table_name->find($query_condition, $fields);
        if (!empty($result_condition ['start'])) {
            $cursor->skip($result_condition ['start']);
        }
        if (!empty($result_condition ['limit'])) {
            $cursor->limit($result_condition ['limit']);
        }
        if (!empty($result_condition ['sort'])) {
            $cursor->sort($result_condition ['sort']);
        }
        $result = array();
        try {
            while ($cursor->hasNext()) {
                $result [] = $cursor->getNext();
            }
        } catch (MongoConnectionException $e) {
            echo $e->getMessage();
            return false;
        } catch (MongoCursorTimeoutException $e) {
            echo $e->getMessage();
            return false;
        }
        return $result;
    }

    /**
     * 查找一条记录
     *
     * 返回值：
     * 成功：一条记录
     * 失败：false
     */
    public static function findOne($table_name, $condition, $fields = array()) {
        $db = self::$dbname;
        return self::$mongo->$db->$table_name->findOne($condition, $fields);
    }

    /**
     * 断开
     */
    public function __destruct() {
        return self::$mongo->close();
    }

    /**
     * 断开
     */
    public static function disconn() {
        return self::$mongo->close();
    }

}
