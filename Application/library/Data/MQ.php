<?php

namespace Data;

/*
 * 纯静态的消息队列操作CLASS，通过类名调用
 * 保证在while期间不会生成新对象，防止吃空内存
 * ------*** Citybay Copy Right ***------
 *        软著持有人Citybay禁止转载
 */

class MQ {

    private static $send_key;
    private static $send_ex;
    private static $send_qu;
    private static $recv_key;
    private static $recv_ex;
    private static $recv_qu;
    private static $channel;
    private static $conn;

    /**
     * 初始化队列参数
     * @return array
     * CityBay
     */
//正式函数
    public static function mconn() {
        self::$send_key = 'rt_o3_to_crm3';
        self::$send_ex = 'exch_o3_to_crm3';
        self::$send_qu = 'q_o3_to_crm';

        self::$recv_key = 'rt_crm3_to_o3';
        self::$recv_ex = 'exch_crm3_to_o3';
        self::$recv_qu = 'q_crm3_to_o3';

        $conn_args = array('host' => '10.173.55.194', 'port' => '5672', 'login' => 'o3user', 'password' => 'DKUwwa2u', 'vhost' => 'crm3');
        try {
            self::$conn = new AMQPConnection($conn_args);
            self::$conn->connect();
            self::$channel = new AMQPChannel(self::$conn);
        } catch (Exception $e) {
            echo date('Y-m-d H:i:s') . ' : Message Queue Connect Error!!!' . "\r\n";
            sleep(1);
            self::mconn();
        }
    }

    /*
      //测试函数
      public static function test_mconn()
      {
      self::$send_key = 'rt_test_to_offline';
      self::$send_ex = 'exch_test_to_offline';
      self::$send_qu = 'q_test_to_offline';

      self::$recv_key = 'rt_test_to_online';
      self::$recv_ex  = 'exch_test_to_online';
      self::$recv_qu  = 'q_test_to_online';

      $conn_args = array('host'=>'123.57.95.46' , 'port'=> '5672', 'login'=>'o3user' , 'password'=> 'DKUwwa2u','vhost' =>'test');
      try
      {
      self::$conn = new AMQPConnection($conn_args);
      self::$conn->connect();
      self::$channel = new AMQPChannel(self::$conn);
      }
      catch(Exception $e)
      {
      echo date('Y-m-d H:i:s').' : Message Queue Connect Error!!!'."\r\n";
      sleep(1);
      self::mconn();
      }
      }
     */

    /**
     * 生成随机uuid
     * @return str
     * CityBay
     */
    private static function guid() {
        $charid = strtoupper(md5(uniqid(mt_rand(), true)));
        $hyphen = chr(45);
        $uuid = substr($charid, 0, 8) . $hyphen
                . substr($charid, 8, 4) . $hyphen
                . substr($charid, 12, 4) . $hyphen
                . substr($charid, 16, 4) . $hyphen
                . substr($charid, 20, 12);
        return $uuid;
    }

    /**
     * O3数据封装
     * @return array
     * CityBay
     */
    public static function deal_o3($data) {
        $queueData = array(
            'head' => array(
                'appSys' => 'O3',
                'business' => $data['business'],
                'requestTime' => date('Y-m-d H:i:s', time()),
                'version' => '1.0',
                'UniqueidentifierID' => self::guid(),
            ),
            'body' => array(
                'dataDesc' => array(
                    'zipCode' => 0,
                    'encryptCode' => 0,
                    'codeType' => 'UTF-8'
                ),
                'signDesc' => array(
                    'signCode' => 0
                )
            )
        );
        $queueData ['body']['content'] = $data;
        return $queueData;
    }

    /**
     * o3队列发送机制
     * @return int
     * CityBay
     */
    public static function send_o3($data) {
        $data = self::deal_o3($data);
        echo "------> SEND REQUEST CRM    <------\r\n";
        //print_r($data);
        echo $data['head']['business'];
        echo "\r\n<------------------------------->\r\n";

        $message ['mongoTable'] = 'rt_o3_to_crm3';
        MG::conn();
        $mongoId = MG::insert($message ['mongoTable'], $data);
        $message ['mongoId'] = $mongoId;
        MG::disconn();
        $sdata = json_encode($data);

        $ex = new AMQPExchange(self::$channel);
        $ex->setName(self::$send_ex);
        $ex->setType(AMQP_EX_TYPE_DIRECT);
        $ex->setFlags(AMQP_DURABLE);
        self::$channel->startTransaction();
        $ret = $ex->publish($sdata, self::$send_key);
        self::$channel->commitTransaction();
        return $ret;
    }

    /**
     * CRM数据封装
     * @return array
     * CityBay
     */
    public static function deal_crm($head, $data) {
        $guid = empty($head['guid']) ? self::guid() : $head['guid'];

        $queueData = array(
            'head' => array(
                'responseTime' => date('Y-m-d H:i:s', time()),
                'returnCode' => $head['retcode'],
                'returnMsg' => $head['retmsg'],
                'appSys' => 'O3',
                'business' => $head['business'],
                'requestTime' => $head['reqtime'],
                'version' => '1.0',
                'UniqueidentifierID' => $guid,
            ),
            'body' => array(
                'dataDesc' => array(
                    'zipCode' => 0,
                    'encryptCode' => 0,
                    'codeType' => 'UTF-8'
                ),
                'signDesc' => array(
                    'signCode' => 0
                )
            )
        );
        $queueData ['body']['content'] = $data;
        return $queueData;
    }

    /**
     * CRM队列发送机制
     * @return int
     * CityBay
     */
    public static function send_crm($head, $data) {

        if ($head['retcode'] == '200') {
            $flag = 'OK';
            $head['retmsg'] = 'Submit Success';
        } elseif ($head['retcode'] == '404') {
            $flag = 'ERROR Not Found';
            $head['retmsg'] = 'Not Found';
        } elseif ($head['retcode'] == '900') {
            $flag = 'ERROR Buss Error';
            $head['retmsg'] = 'Buss Error';
        } elseif ($head['retcode'] == '500') {
            $flag = 'ERROR Lost Data';
            $head['retmsg'] = 'Lost Data';
        } elseif ($head['retcode'] == '902') {
            $flag = 'ERROR Save Error';
            $head['retmsg'] = 'Save Error';
        }
        $datas = self::deal_crm($head, $data);
        //print_r($datas);
        $sdata = json_encode($datas);

        MG::conn();
        $mongoId = MG::insert('rt_o3_to_crm3', $datas);
        MG::disconn();

        if ($head['retcode'] != '200') {
            echo "---!!!---> RESPONSE CRM  $flag  <---!!!---\r\n";
            print_r($datas);
            echo "<------     !!!!!!!!!!!!!!!!!!!!!!      ------>\r\n\r\n";

            // $fil = './logs/ebuss_log_'.date('Y-m-d').'.log';
            // $fp = fopen($fil,'a+');
            // fputs($fp, 'Send '.$head['business'].' Error : '.$sdata.'  :'.date('Y-m-d H:i:s')."\r\n");
            // fclose($fp);
        } else {
            echo '^.^.^.^--- ' . $head['business'] . '---> [OK] ^.^.^.^' . "\r\n\r\n";
        }
        $ex = new AMQPExchange(self::$channel);
        $ex->setName(self::$send_ex);
        $ex->setType(AMQP_EX_TYPE_DIRECT);
        $ex->setFlags(AMQP_DURABLE);
        self::$channel->startTransaction();
        $ret = $ex->publish($sdata, self::$send_key);
        self::$channel->commitTransaction();
        return $ret;
    }

    /**
     * 队列回取机制
     * @return int
     * CityBay
     */
    public static function get() {
        $ex = new AMQPExchange(self::$channel);
        $ex->setName(self::$recv_ex);
        $ex->setType(AMQP_EX_TYPE_DIRECT);
        $ex->setFlags(AMQP_DURABLE);
        $q = new AMQPQueue(self::$channel);
        $q->setName(self::$recv_qu);
        $q->setFlags(AMQP_DURABLE);
        $q->bind($ex->getName(), self::$recv_key);
        $messages = $q->get();
        if ($messages) {
            $ret = json_decode($messages->getBody(), true);
        }
        $q->ack($messages->getDeliveryTag());
        return $ret;
    }

    //自动销毁机制
    public function __destruct() {
        self::$conn->disconnect();
    }

    //自动销毁机制
    public static function dismconn() {
        self::$conn->disconnect();
    }

}
