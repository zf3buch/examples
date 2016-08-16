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
 * Class SpecialBook
 *
 * @package Book
 */
class SpecialBook extends Book implements SpecialBookInterface
{
    use SerializeTrait;

    /**
     * @var string
     */
    private $name = 'ZF3 Book';

    /**
     * @return array
     */
    public function summary()
    {
        return [
            'name'      => $this->name,
            'pageCount' => count($this->pages),
        ];
    }
}
