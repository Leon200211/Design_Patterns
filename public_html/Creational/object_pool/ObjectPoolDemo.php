<?php

class ObjectPoolDemo
{
    private $objectPool;

    public function __construct()
    {
        $this->objectPool = ObjectPool::getInstance();

        $user = new User();
        $creditCard = new CreditCard();
        $calculator = new Calculator();

        $this->objectPool
            ->addObject($user)
            ->addObject($creditCard)
            ->addObject($calculator);

    }

    public function run()
    {
        $creditCard = $this->objectPool->getObject(CreditCard::class);
        $creditCard->caradId = '1313131231312';
        $creditCard->cardHolder = 'card holder';
        $creditCard->caedPwd = '123';

        $user = $this->objectPool->getObject(User::class);
        $user->name = 'leon';

        // Ошибка так как пользователь уже занят
        // Или расширение пула, два одинаковых объекта в пуле
        $user2 = $this->objectPool->getObject(User::class);

        $this->objectPool->release($creditCard);
        $this->objectPool->release($user);

        $creditCard = $this->objectPool->getObject(CreditCard::class);
        $creditCard->caradId = '112400000000312';
        $creditCard->cardHolder = 'card 123123';
        $creditCard->caedPwd = '123432';

    }

}