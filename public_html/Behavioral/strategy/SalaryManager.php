<?php


use Cassandra\Collection;

class SalaryManager
{

    private $salaryStrategy;
    private $period;
    private $users;

    public function __construct(array $period, Collection $users)
    {
        $this->period = $period;
        $this->users = $users;
    }

    public function handle()
    {
        $usersSalary = $this->calculateSalary();
        $this->saveSalaty($usersSalary);

        return $usersSalary;
    }

    private function calculateSalary() : Collection
    {
        $usersSalary = $this->users->map(
            function (User $user) {
                $strategy = $this->getStrategyByUser($user);
                $salary = $this
                    ->setCalculateStrategy($strategy)
                    ->calculateUserSalary($this->period, $user);

                $strategyName = $strategy->getName();
                $userId = $user->id;

                $newItem = compact('userId', 'salary', 'strategyName');

                return $newItem;
            });

        return $usersSalary;

    }

    private function getStrategyByUser(User $user) : SalaryStrategyInterface
    {
        $strategyName = $user->departmentName();
        $strategyClass = __NAMESPACE__ . '\\Strategies\\' . ucwords($strategyName);

        throw_if(!class_exists($strategyClass), Exception::class, "Класс [{$strategyClass} не существует]");

        return new $strategyClass;
    }

    private function setCalculateStrategy(SalartStategyInterface $strategy)
    {
        $this->salaryStrategy = $strategy;

        return $this;
    }

    private function calculateUserSalary($period, $user)
    {
        return $this->salaryStrategy->call($period, $user);
    }


}