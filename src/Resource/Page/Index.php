<?php

declare(strict_types=1);

namespace MyVendor\MyProject\Resource\Page;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;

class Index extends ResourceObject
{
    use ResourceInject;

    /** @var array{greeting: string} */
    public $body;

    /** @return static */
    public function onGet(string $name = 'BEAR.Sunday'): static
    {
        $weekday = $this->resource->get('app://foo/weekday?year=2022&month=1&day=1');
        $this->body = [
            'greeting' => 'Hello ' . $name,
            'weekday' => $weekday
        ];

        return $this;
    }
}
