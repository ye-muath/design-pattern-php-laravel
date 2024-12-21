<?php
namespace App\Orders;
use App\Models\Order as OrderModel;

abstract class Order
{
    protected $customer;
    protected $items = [];
    protected $payment;
    protected $shipping;

    public abstract function setCustomer(string $customer): self;

    public abstract function addItem(array $item): self;

    public abstract function setPayment(string $payment): self;

    public abstract function setShipping(string $shipping): self;

    public abstract function build(): OrderModel;
}
