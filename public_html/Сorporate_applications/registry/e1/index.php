<?php
class Registry
{
    private static $_storage = array();

    /**
     * Установка значения.
     */
    public static function set($key, $value)
    {
        return self::$_storage[$key] = $value;
    }

    /**
     * Получение значения.
     */
    public static function get($key, $default = null)
    {
        return (isset(self::$_storage[$key])) ? self::$_storage[$key] : $default;
    }

    /**
     * Удаление.
     */
    public static function remove($key)
    {
        unset(self::$_storage[$key]);
        return true;
    }

    /**
     * Очистка.
     */
    public static function clean()
    {
        self::$_storage = array();
        return true;
    }
}

Registry::set('sid', 'xxxxxx');
echo Registry::get('sid');