# Active Record

Этот шаблон говорит о том, что сущность (объекты класса статьи или пользователя)
сами должны управлять работой с базой данных. 
То есть весь остальной код, который эти сущности использует,
не должен знать о базе данных. Наши контроллеры не должны работать с 
базой данных, получая данные и заполняя ими сущности. Они должны знать
только о сущностях. Сущность сама должна позаботиться о работе с базой данных.


Для начала нужно вообще понять, как стоит работать с сущностями при помощи
такой концепции. Самое простое, что мы можем реализовать – это чтение из базы
данных. И мы должны сделать это, обращаясь напрямую к сущностям-объектам. 
То есть мы должны сказать: «Эй, Article, дай мне все статьи». 
Но согласитесь, глупо будет для этого создать сущности,
а после этого попросить чтобы они заполнили себя данными из базы. 
Нам нужно сделать это как-то по другому. Например, обратиться к сущности,
не создавая её, но чтобы она при этом вернула нам созданные сущности.
Вспоминаем статические методы – их ведь можно вызывать, не создавая объекта.
То, что нам нужно! Давайте добавим в Article статический метод,
возвращающий нам все статьи.

/Models/Articles/Article.php


