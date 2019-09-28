<?php

namespace Comm;

/**
 *              通信核心类
 *             @version 1.0
 *             @date 2015-10-24
 *             citybay@163.com
 *  @copyright 软著持有者 Citybay 禁止转载
 */
class Socket {

    public static $instance = NULL;
    protected static $conn;
    protected static $accpt;

// Init
    public static function Init() {
        set_time_limit(0);
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        if ((self::$conn = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
            echo 'Socket Create Error !' . "\r\n";
            usleep(200);
            self::Init();
        }
        // 超时 2s
        socket_set_option(self::$conn, SOL_SOCKET, SO_RCVTIMEO, array("sec" => 2, "usec" => 0));
        socket_set_option(self::$conn, SOL_SOCKET, SO_SNDTIMEO, array("sec" => 2, "usec" => 0));
        return self::$instance;
    }

    /*     * ******************************************************** */

// Listen    
    public static function Listen($ip, $port) {
        if (socket_bind(self::$conn, $ip, $port) == false) {
            echo 'Socket Bind Error ! ' . "\r\n";
            exit();
        }
        if (socket_listen(self::$conn, 4) == false) {
            echo 'Socket Listen Error ! ' . "\r\n";
            exit();
        }
    }

// Accept

    public static function Acpt() {
        self::$accpt = socket_accept(self::$conn);
        if (false == self::$accpt) {
            echo 'Socket Accept Error ! ' . "\r\n";
            exit();
        }
        return 1;
    }

// Read
    public static function Read($len) {
        socket_set_option(self::$accpt, SOL_SOCKET, SO_RCVBUF, strlen($len) + 1);
        $data = @socket_read(self::$accpt, $len, PHP_BINARY_READ);
        return $data;
    }

// Write
    public static function Write($data) {
        socket_set_option(self::$accpt, SOL_SOCKET, SO_SNDBUF, strlen($data) + 1);
        if (socket_write(self::$accpt, $data) == false) {
            echo 'Socket Write Error ! ' . "\r\n";
            sleep(2);
            self::Write($data);
        }
        return 1;
    }

// Close
    public static function Close() {
        socket_close(self::$accpt);
        echo self::$accpt . ' Closed By Server ! ' . "\r\n";
        return 1;
    }

    /*     * ******************************************************** */

// Connect
    public static function Connect($ip, $port) {
        if (socket_connect(self::$conn, $ip, $port) == false) {
            echo 'Socket Conn Error ! ' . "\r\n";
            sleep(2);
            self::Connect($ip, $port);
        }
        return 1;
    }

// Send
    public static function Send($msg) {
        socket_set_option(self::$conn, SOL_SOCKET, SO_SNDBUF, strlen($msg) + 1);
        if (socket_write(self::$conn, $msg) == false) {
            echo 'Socket Send Error ! ' . "\r\n";
            sleep(2);
            self::Send($msg);
        }
        return 1;
    }

// Get Back
    public static function Recv($len) {
        @socket_set_option(self::$conn, SOL_SOCKET, SO_RCVBUF, strlen($len) + 1);
        $data = @socket_read(self::$conn, $len, PHP_BINARY_READ);
        return $data;
    }

// Disconnect
    public static function Discon() {
        socket_close(self::$conn);
        echo 'Disconected ! ' . "\r\n";
        return 1;
    }

}

/**
 * 
  <----------AS Client--------->
       Socket::Init();
       Socket::Connect('127.0.0.1',1234);
       Socket::Send('abcd1234567'."\r\n");
       while($ret = Socket::Recv(1024))
       {
         echo $ret;
		 Socket::Discon();
       }
  #######################################
  <----------AS Server--------->
        Socket::Init();
        Socket::Listen('127.0.0.1', 1234);
        while(Socket::Acpt())
		{
          $ret =1;
          $ret = Socket::Read(1024);
		  echo $ret;
		  echo "\r\n".'Len IS : '.strlen($ret)."\r\n";
		  Socket::Write('UUUUUUUUUUUUUUUUU');
		  Socket::Close();
       }
 
 * 
 * 
 **/