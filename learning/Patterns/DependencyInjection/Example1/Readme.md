#Dependency Injection

Source:  
http://designpatternsphp.readthedocs.io/ru/latest/Structural/DependencyInjection/README.html?highlight=Dependency%20Injection

## Назначение
Для реализации слабосвязанной архитектуры. Чтобы получить более тестируемый, сопровождаемый и расширяемый код.

## Примеры
* The Doctrine2 ORM использует Внедрение Зависимости например для конфигурации, которая внедряется в объект Connection. Для целей тестирования, можно легко создать макет объекта конфигурации и внедрить его в объект Connection, подменив оригинальный.
* Symfony и Zend Framework 2 уже содержат контейнеры для DI, которые создают объекты с помощью массива из конфигурации, и внедряют их в случае необходимости (т.е. в Контроллерах).

##UML Диаграмма
![uml](http://designpatternsphp.readthedocs.io/ru/latest/_images/uml30.png)