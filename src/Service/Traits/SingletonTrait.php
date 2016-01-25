<?php
/**
 * File SingletonTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue36\Service\Traits;

/**
 * Class SingletonTrait
 *
 * @package PHPWeekly\Issue36\Service\Traits
 */
trait SingletonTrait
{
    /**
     * @var static
     */
    private static $instance;

    /**
     * Return singleton instance
     *
     * @return static
     */
    public static function getInstance()
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }
}
