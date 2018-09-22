<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 18:39
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\NewVideoDTOInterface;

/**
 * Class NewVideoDTO
 *
 * @package App\Domain\DTO
 */
final class NewVideoDTO implements NewVideoDTOInterface
{
    /**
     * @var string
     */
    public $url;

    /**
     * @inheritdoc
     */
    public function __construct($url)
    {
        $this->url   = $url;
    }
}
