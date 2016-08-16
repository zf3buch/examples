<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Book;

/**
 * Trait SerializeTrait
 *
 * @package Book
 */
trait SerializeTrait
{
    /**
     * @return string
     */
    public function serializeProperties()
    {
        return serialize(get_object_vars($this));
    }
}
