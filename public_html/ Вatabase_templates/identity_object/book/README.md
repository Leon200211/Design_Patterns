# Identity object

Шаблон Identity Object дает программистам клиентского кода возможность 
определять критерии поиска без обращения к запросу к базе данных.
Он также избавляет от необходимости создавать специальные методы запросов 
для различных видов операций поиска, которые могут понадобиться пользователю.

Одна из целей шаблона Identity Object — оградить пользователей от подробностей 
реализации базы данных. Так, если вырабатывается автоматическое решение 
наподобие текучего интерфейса из предыдущего примера, то очень важно,
чтобы используемые метки ясно обозначали объекты
предметной области, а не исходные имена столбцов в таблице базы данных.
И если они не соответствуют друг другу, то придется создавать механизм
для их сопоставления.

Если же применяются специализированные объекты-сущности 
(по одному на каждый объект предметной области), 
рекомендуется воспользоваться абстрактной фабрикой, построенной в 
соответствии с шаблоном
Abstract Factory (например, классом PersistenceFactory, описанным
в предыдущем разделе), чтобы обслуживать их вместе с другими объектами, 
связанными с текущим объектом предметной области