# Dependency Injection

В большей части рассматриваемого здесь кода требуется обращение к
фабрикам. И, как было показано ранее, именно такая модель называется
шаблоном Service Locator, в соответствии с которым метод делегирует поставщику, которому он вполне доверяет, обязанность найти и обслужить
требующийся тип данных. Совсем иначе дело обстоит в примере применения шаблона Prototype, в котором просто ожидается, что во время вызова
в коде получения экземпляра будут предоставлены соответствующие реализации. И в этом нет ничего необычного, поскольку нужно лишь указать
необходимые типы данных в сигнатуре конструктора вместо того, 
чтобы создавать их в самом методе. А иначе можно предоставить 
методы установки, чтобы клиенты смогли передать объекты, 
прежде чем вызывать метод, в котором они применяются.

Итак, мы добились искомой гибкости благодаря тому, что класс
AppointmentMaker2 вернул управление, — объект типа BloggsAppt
Encoder в нем больше не создается. Но каким же образом действует логика
создания объектов и где находятся внушающие трепет операторы new? Для
выполнения этих обязанностей потребуется компонент-сборщик. Обычная 
стратегия применяет файл конфигурации, в котором определяются
конкретные реализации для получения экземпляров. И хотя здесь можно
было бы воспользоваться вспомогательными инструментальными средствами,
данная книга посвящена способам выхода из подобных затруднительных 
положений самостоятельно. Поэтому попробуем сначала создать
весьма прямолинейную реализацию, начав с незамысловатого файла 
конфигурации формата XML, в котором описываются отношения между
абстрактными классами и их предпочтительными реализациями:

<objects>

    <class name="рорр\chO9\batchOб\ApptEncoder">
        cinstance inst="popp\ch09\batch06\BloggsApptEncoder" />
    </class>

</objects>
