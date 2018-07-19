<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 18:39
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\NewVideoDTOInterface;

class NewVideoDTO implements NewVideoDTOInterface
{
    /**
     * @var string
     */
    public $title;

    public $url;

    /**
     * NewVideoDTO constructor.
     * @param $title
     * @param $url
     */
    public function __construct(
        $title,
        $url
    )
    {
        $this->title = $title;
        $this->url   = $url;
    }
}
