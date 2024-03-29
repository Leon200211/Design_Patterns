# Identity map

Обеспечивает однократную загрузку объекта, сохраняя данные об
объекте в карте соответствия. При обращении к объектам, ищет их 
в карте соответсвия.

Одна старая пословица постулирует, что человек с двумя часами никогда не знает,
сколько сейчас времени. И если уж двое часов вносят путаницу, 
то с загрузкой объектов из БД может получиться гораздо большая путаница. 
Если разработчик не достаточно аккуратен, может получиться, 
что он загрузит данные из БД в два объекта. Потом, когда он сохранит их,
получится путаница и конкуренция различных данных.

Более того, с этим связаны проблемы производительности. Когда дважды 
загружается одна и та же информация, увеличиваются затраты на передачу данных.
Таким образом, отказ от загрузки одних и тех же данных дважды не только 
обеспечивает корректность информации, но и ускоряет работу приложения.

Паттерн Identity Map (Карта присутствия / Карта соответствия) хранит записи о
всех объектах, которые были считаны из БД за время выполнения одного действия.
Когда происходит обращение к объекту, проверяется карта соответствия
(присутствия), чтобы узнать, загружен ли объект.

Identity Map — это просто объект, предназначенный для слежения за всеми 
остальными объектами в системе и помогающий исключить дублирование тех объектов,
которые должны быть в единственном экземпляре.

До тех пор, пока шаблон Identity Мар применяется во всех контекстах,
в которых объекты формируются из базы данных или добавляются в нее,
вероятность дублирования объектов в ходе процесса практически равна
нулю.

Разумеется, это правило действует только в самом процессе. В разных
процессах будет неизбежно происходить одновременное обращение к
разным версиям одного и того же объекта. И в этом случае важно учитывать возможности искажения данных в результате параллельного (т.е. одновременного) доступа к ним. Если это вызывает серьезные проблемы
в вашей системе, то рекомендуется реализовать стратегию блокировки.
Можно также рассмотреть возможность сохранения объектов в общей
памяти или применения внешней системы кеширования объектов вроде Memcached.