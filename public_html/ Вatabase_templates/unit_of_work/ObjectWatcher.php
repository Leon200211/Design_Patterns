<?php

class ObjectWatcher
{
    private array $all = [];
    private array $dirty = [];
    private array $new = [];
    private array $delete = []; // В данном примере не используется
    private static ? ObjectWatcher $instance = null;

    public static function addDelete(DomainObject $obj): void
    {
        $inst = self::instance();
        $inst->delete[$inst->globalKey($obj)] = $obj;
    }

    public static function addDirty(DomainObject $obj): void
    {
        $inst = self::instance();
        if (! in_array($obj, $inst->new, true)) {
            $inst->dirty[$inst->globalKey($obj)] = $obj;
        }
    }

    public static function addNew(DomainObject $obj): void
    {
        $inst = self::instance();
        // Пока что у нас нет id
        $inst->new[] = $obj;
    }

    public static function addClean(DomainObject $obj): void
    {
        $inst = self::instance();
        unset($inst->delete[$inst->globalKey($obj)]);
        unset($inst->dirty[$inst->globalKey($obj)]);
        $inst->new = array_filter(
            $inst->new,
            function($a) use($obj)
            {
                return !($a === $obj);
            }
        );
    }

    public function performOperations(): void
    {
        foreach ($this->dirty as $key => $obj) {
            $obj->getFinder()->update($obj);
        }

        foreach ($this->new as $key => $obj) {
            $obj->getFinder()->insert($obj);
            print "Вставка " . $obj->getName() . "\n";
        }

        $this->dirty = [];
        $this->new = [];
    }
}