<?php

class IdentityObject
{
    protected ? Field $currentfield = null;
    protected array $fields = [];
    private array $enforce = [];

    // Объект идентичности может быть создан пустым
    // или же с отдельным полем
    public function __construct(? string $field = null, ? array $enforce = null)
    {
        if (!is_null($enforce)) {
            $this->enforce = $enforce;
        }
        if (!is_null($field)) {
            $this->field($field);
        }
    }

    // Имена полей, на которые наложено данное ограничение
    public function getObjectFields(): array
    {
        return $this->enforce;
    }

    // Добавляет новое поле.
    // Генерирует ошибку, если текущее поле неполное
    // (т.е. аде, а не аде > 40).
    // Этот метод возвращает ссылку на текущий об
    public function field(string $fieldname): self
    {
        if (!$this->isVoid() && $this->currentfield->isIncomplete()){
            throw new \Exception("Неполное поле");
        }
        $this->enforceField($fieldname);
        if (isset($this->fields[$fieldname])) {
            $this->currentfield = $this->fields[$fieldname];
        } else {
            $this->currentfield = new Field($fieldname);
            $this->fields[$fieldname] = $this->currentfield;
        }
        return $this;
    }

    // Имеются ли уже какие-нибудь поля
    // у объекта идентичности?
    public function isVoid(): bool
    {
        return empty($this->fields);
    }

    // Допустимо ли заданное имя поля?
    public function enforceField(string $fieldname): void
    {
        if (!in_array($fieldname, $this->enforce) && !empty($this->enforce)) {
            $forcelist = implode(',', $this->enforce);
            throw new \Exception("{$fieldname} не является корректным полем ($forcelist)");
        }
    }

    // Добавляет оператор равенства в текущее поле,
    // т.е. 'аде' превращается в 'аде=40'.
    // Возвращает ссылку на текущий объект через operator()
    public function eq($value): self
    {
        return $this->operator("=", $value);
    }

    // Меньше
    public function lt($value): self
    {
        return $this->operator("<",$value);
    }

    // Больше
    public function gt($value): self
    {
        return $this->operator(">",$value);
    }

    // Выполняет работу, чтобы методы операторов
    // получали текущее поле, и добавляет оператор
    // и проверяемое значение
    private function operator(string $symbol, $value): self
    {
        if ($this->isVoid()) {
            throw new \Exception("Поле объекта не определено");
        }
        $this->currentfield->addTest($symbol, $value);
        return $this;
    }

    // Возвращает все полученные до сих пор результаты
    // сравнения из ассоциативного массива
    public function getComps(): array
    {
        $ret = [];
        foreach ($this->fields as $field)
        {
            $ret = array_merge($ret, $field->getComps());
        }
        return $ret;
    }

}