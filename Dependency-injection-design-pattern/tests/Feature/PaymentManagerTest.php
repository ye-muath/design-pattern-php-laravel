<?php

namespace Tests\Feature;

use App\Contracts\PaymentGatewayInterface;
use App\Managers\PaymentManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentManagerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testProcessPayment(): void {
        $mockGateway = $this->createMock(PaymentGatewayInterface::class);

        $mockGateway->expects($this->once())
                    ->method('pay')
                    ->with(100.0);

        $manager = new PaymentManager($mockGateway);
        $manager->processPayment(100.0);
    }
}
