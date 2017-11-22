#Observer

Source:  
http://designpatternsphp.readthedocs.io/ru/latest/Behavioral/Observer/README.html?highlight=Observer

## Назначение
Для реализации публикации/подписки на поведение объекта, всякий раз, когда объект «Subject» меняет свое состояние, прикрепленные объекты «Observers» будут уведомлены. Паттерн используется, чтобы сократить количество связанных напрямую объектов и вместо этого использует слабую связь (loose coupling).

## Примеры
Система очереди сообщений наблюдает за очередями, чтобы отображать прогресс в GUI

## Примечание
PHP предоставляет два стандартных интерфейса, которые могут помочь реализовать этот шаблон: SplObserver и SplSubject.

##UML Диаграмма
![uml](http://designpatternsphp.readthedocs.io/ru/latest/_images/uml6.png)