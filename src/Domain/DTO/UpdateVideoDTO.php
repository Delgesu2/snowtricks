<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 07/08/18
 * Time: 19:52
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\UpdateVideoDTOInterface;

class UpdateVideoDTO implements UpdateVideoDTOInterface
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
        $this->url = $url;
    }
}