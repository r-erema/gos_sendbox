<?php

declare(strict_types=1);

namespace learning\Patterns\ChainOfResponsibilities\Example1;

use Psr\Http\Message\RequestInterface;

class HttpInMemoryCacheHandler extends Handler
{
    private $data;

    public function __construct(array $data, Handler $successor =null)
    {
        parent::__construct($successor);
        $this->data = $data;
    }


    protected function processing(RequestInterface $request)
    {
        $key = sprintf('%s?%s', $request->getUri()->getPath(), $request->getUri()->getQuery());

        if (isset($this->data[$key]) && $request->getMethod() === 'GET') {
            return $this->data[$key];
        }

        return null;
    }
}
