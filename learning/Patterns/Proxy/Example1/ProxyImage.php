<?php

namespace learning\Patterns\Proxy\Example1;

final class ProxyImage extends Image
{

    /**
     * @var string
     */
    protected $fileName;

    /**
     * @var Image
     */
    private $image;

    /**
     * @var string
     */
    private $imageResult;

    /**
     * @return bool|string
     */
    public function getImageContents()
    {
        if (! ($this->image instanceof Image)) {
            $this->image = new Image($this->fileName);
        }

        if (!isset($this->imageResult)) {
            $this->imageResult = $this->image->getImageContents();
        }
        return $this->imageResult;
    }

    /**
     * @return int
     */
    public function getLoadsCount(): int
    {
        return $this->image->getLoadsCount();
    }


}