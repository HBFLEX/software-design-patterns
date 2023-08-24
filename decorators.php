<?php

    interface DeliveryService{
        function getCost();
    }

    class DeliverPizza implements DeliveryService{
        protected $total_price = 20;

        function getCost(){
            return $this->total_price;
        }
    }

    class WithDrinks implements DeliveryService{
        protected $total_price;

        public function __construct(DeliveryService $service){
            $this->total_price = $service->getCost();
        }

        function getCost(){
            return $this->total_price + 10;
        }
    }

    class WithASpecialMeal implements DeliveryService{
        protected $total_price;

        public function __construct(DeliveryService $service){
            $this->total_price = $service->getCost();
        }

        function getCost(){
            return $this->total_price + 15;
        }
    }

    echo (new WithASpecialMeal(new WithDrinks(new DeliverPizza())))->getCost();

?>