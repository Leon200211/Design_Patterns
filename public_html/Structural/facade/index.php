<?php



function autoloadMainClasses($class_name){

    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){  // знак @ игнорирует ошибки вызванные в условии
        throw new Exception('Не верное имя файла для подключения - ' . $class_name);
    }

}


spl_autoload_register('autoloadMainClasses');



// Так делать не надо
function saveOrder(\http\Env\Request $request)
{
    $order = new Order();

    if($request->has('client')) {
        $order->client = $request->get('client');
    }

    if($request->has('recipient')) {
        $order->recipient = $request->get('recipient');
    }

    if($request->has('deliveryDt')) {
        $order->delivery = $request->get('deliveryDt');
    }

    $order->save();

}


// Так делать не надо
function saveOrder2(\http\Env\Request $request)
{
    $order = new Order();

    (new OrderSaveProducts($order, $request))->run();
    (new OrderSaveDates($order, $request))->run();
    (new OrderSaveUsers($order, $request))->run();

    $order->save();
}


function Facade()
{
    $order = new Order();

    $data = request()->all();

    (new OrderSaveFacade())->save($order, $data);

    $order->save();

}

