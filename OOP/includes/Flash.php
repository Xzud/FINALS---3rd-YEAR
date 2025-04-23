<?php

class Flash {
    public static function set($key, $message){
        $_SESSION['flash'][$key] = $message;
    }

    public static function get($key) {
        if (isset($_SESSION['flash'][$key])) {
            $msg = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $msg;
        }
    }

    public static function display($key, $class = 'success') {
        $msg = self::get($key);
        if ($msg) {
            echo "<div class='alert alert-$class alert-dismissible fade show' role='alert'>
                    $msg
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }
    } 
}