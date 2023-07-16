# Multiton

Мультитон - порождающий шаблон проектирования, который обощает шаблон "Одиночка".
В то время, как "Одиночка" разрешает создание лишь одного экземпляра класса, мультитон
позволяет создавать несколько экземпляров класса, которые управляются через
ассоциативный массив. Создается лишь один экземпляр для каждого из ключей
ассоциативного массива, что позволяет контрольровать уникальность объекта по
какому-либо признаку.