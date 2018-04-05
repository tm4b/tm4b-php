<?php

namespace Tm4bTest\Hydrator;

use Tm4b\Hydrator\ObjectHydrator;
use Tm4b\Model\Response\Account;

/**
 * Class ObjectHydratorTest
 * @package Tm4bTest\Hydrator
 */
class ObjectHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test Hydrate
     */
    public function testHydrate()
    {
        $data = [
            'balance'        => 0,
            'auto_purchase' => true
        ];

        $hydrator = new ObjectHydrator();
        $account = new Account();
        $account = $hydrator->hydrate($data, $account);

        $this->assertTrue(($account->getBalance() === 0));
        $this->assertTrue(($account->isAutoPurchase() === true));
    }
}
