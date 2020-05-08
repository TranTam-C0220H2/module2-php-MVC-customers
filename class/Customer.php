<?php
namespace Library;

class Customer
{
    protected $customerNumber;
    protected $customerName;
    protected $customerPhone;
    protected $customerCity;

    public function __construct($customerNumber,$customerName,$customerPhone,$customerCity)
    {
        $this->customerNumber = $customerNumber;
        $this->customerName = $customerName;
        $this->customerPhone = $customerPhone;
        $this->customerCity = $customerCity;
    }

    /**
     * @return mixed
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * @return mixed
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @return mixed
     */
    public function getCustomerPhone()
    {
        return $this->customerPhone;
    }

    /**
     * @return mixed
     */
    public function getCustomerCity()
    {
        return $this->customerCity;
    }
}