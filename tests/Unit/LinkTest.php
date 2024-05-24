<?php

namespace Tests\Unit;

use App\Models\Link;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class LinkTest extends TestCase
{
    public function testSetParameter(): void
    {
        $data = Link::setLinkParameter([
            'url' => 'https://www.wikipedia.org/de/test/?v=5678',
            'utm_source' => 'google',
            'utm_medium' => 'cpc',
            'utm_campaign' => 'brand',
            'utm_id' => '123',
            'utm_name' => 'testcase',
            'utm_term' => 'pin',
            'utm_content' => 'cont1',
            'individual_param' => 'ref=test',
        ]);

        $this->assertEquals('?v=5678&utm_source=google&utm_medium=cpc&utm_campaign=brand&utm_id=123&utm_name=testcase&utm_term=pin&utm_content=cont1&ref=test', $data['parameter']);
    }

    public function testGetParameter(): void
    {
        $data = Link::getLinkParameter([
            'url' => 'https://www.wikipedia.org/de/karriere/',
            'parameter' => '?v=5678&utm_source=google&utm_medium=cpc&utm_campaign=brand&utm_id=123&utm_name=testcase&utm_term=pin&utm_content=cont1&ref=test',
        ]);

        $this->assertEquals('google', $data['utm_source']);
        $this->assertEquals('cpc', $data['utm_medium']);
        $this->assertEquals('brand', $data['utm_campaign']);
        $this->assertEquals('123', $data['utm_id']);
        $this->assertEquals('testcase', $data['utm_name']);
        $this->assertEquals('pin', $data['utm_term']);
        $this->assertEquals('cont1', $data['utm_content']);
        $this->assertEquals('v=5678&ref=test', $data['individual_param']);
    }
}
