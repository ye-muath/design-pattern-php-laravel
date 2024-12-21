<?php
namespace App\Orders;
use App\Models\Order as OrderModel;
class OrderBuilder extends Order
{
    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    public function addItem(array $item): self
    {
        $this->items[] = $item;
        return $this;
    }

    public function setPayment(string $payment): self
    {
        $this->payment = $payment;
        return $this;
    }

    public function setShipping(string $shipping): self
    {
        $this->shipping = $shipping;
        return $this;
    }

    public function build(): OrderModel
    {
        return OrderModel::create([
            'customer' => $this->customer,
            'items' => json_encode($this->items),
            'payment' => $this->payment,
            'shipping' => $this->shipping,
        ]);
    }
}
