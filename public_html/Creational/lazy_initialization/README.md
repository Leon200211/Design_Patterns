# Lazy initialization

Отложенная (линивая) иннициализация - прием в программировании, когда некоторая
ресурсоёмкая операция (создание объектов, вычисление значения) выполняется
непосредственно перед тем, как будет использован её результат. Таким образом,
инициализация выполняется по требованию, а не заблаговременно. Аналогичная идея
находит применение в самых разных областях: например, компиляция на лету и логистическая
концепция "Точно в срок"

Частный случай ленивой инициализации - создание объектов в момент обращения к нему
является одним из порождающих шаблонов проектрирования. Как правило, он используется
в сочетании с такими шаблонами как Фабричный метод, Одиночка и Заместитель

