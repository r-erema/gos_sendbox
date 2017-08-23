# MODExt
Перевод [данной статьи](#https://docs.modx.com/revolution/2.x/developing-in-modx/advanced-development/custom-manager-pages/modext).

* [Что такое MODExt?](#что-такое-modext)
* [Часто используемые компоненты](#часто-используемые-компоненты)
    * [Больше компонентов MODExt](#больше-компонентов-modext)
        * [xcheckbox](#xcheckbox)
* [Расширение класса MODExt](#расширение-класса-modext)

## Что такое MODExt?

MODExt это расширение [ExtJS3 JavaScript Framework](#http://www.sencha.com/products/extjs), которое обеспечивает дополнительную, настраиваемую для MODx функциональность. MODExt управляет интерфейсом менеджера MODx Revolution, а также доступен разработчикам для использования его в разработке своих Кастомных Страниц Админки(КСА). Разработчику просто нужно использовать ```Ext.extend``` в классе ```MODx. *```, чтобы мгновенно получить преимущество пользовательских компонентов MODExt.

Почему Ext JS? Существует множество библиотек и фреймворков Javascript, и все они позволяют нам манипулировать DOM, но только пара из них предлагает зрелую библиотеку для пользовательского интерфейса (пользовательский интерфейс Yahoo и Ext JS являются крупнейшими игроками в этой области). Ext JS хорошо подходит для создания богатого интернет-приложения, такого как админка MODX.

## Часто используемые компоненты

Есть несколько компонентов, которые используются во всем MODx Manager и, скорее всего, будут использоваться в КСА:

* MODExt MODx Object
* MODExt Tutorials
    1. Ext JS Tutorial - Message Boxes
    2. Ext JS Tutorial - Ajax Include
    3. Ext JS Tutorial - Animation
    4. Ext JS Tutorial - Manipulating Nodes
    5. Ext JS Tutorial - Panels
    7. Ext JS Tutorial - Advanced Grid
    8. Ext JS Tutorial - Inside a CMP
* MODx.combo.ComboBox
* MODx.Console
* MODx.FormPanel
* MODx.grid.Grid
* MODx.grid.LocalGrid
* MODx.msg
* MODx.tree.Tree
* MODx.Window

### Больше компонентов MODExt

Конечно, в вашем распоряжении есть ещё больше компонентов MODExt. Для полного списка (и исходного кода для изучения) перейдите в каталог **manager/assets/modext/widgets/core/** вашего MODx.

#### xcheckbox

Xtype xcheckbox является расширением флажка ExtJS, добавленного в MODX 2.1, который, если флажок не установлен, отправит значение «0» вместо пустой строки по сравнению с исходным вводом формы флажка.

## Расширение класса MODExt

Расширять компоненты MODExt на самом деле довольно просто. Давайте расширим класс MODx.grid.Grid, чтобы создать собственную собственную сетку, в комплекте с пользовательской панелью инструментов.

Сначала создайте новый JavaScript-файл и поместите следующий код:

```
MyComponent.grid.MyGrid = function( config ) {
    /* Class parent constructor */
    MyComponent.grid.MyGrid.superclass.constructor.call( this, config );
};
Ext.extend( MyComponent.grid.MyGrid, MODx.grid.Grid, {
    /* Class members will go here */
} );
/* Register "mycomponent-grid-mygrid" as an xtype */
Ext.reg( "mycomponent-grid-mygrid", MyComponent.grid.MyGrid );
```

Здесь мы создали собственный класс (```MyComponent.grid.MyGrid```), который расширяет ```MODx.grid.Grid```. Мы также зарегистрировали «mycomponent-grid-mygrid» как Ext xtype, который можно использовать для отображения этой сетки в FormPanel или другом компоненте. У него нет дополнительной функциональности, но это пока.

Теперь давайте добавим некоторые параметры:

```
MyComponent.grid.MyGrid = function( config ) {
    config = config || {};

    /* Grid configuration options */
    Ext.applyIf( config, {
        id : "mycomponent-grid-mygrid",
        title : _( "my_grid" ),
        url : MyComponent.config.connectors_url + "list.php",
        baseParams : {
            action : "getlist"
        },
        paging : true,
        autosave : true,
        remoteSort : true,
        /* Store field list */
        fields : [ {
            name : "id",
            type : "int"
        }, {
            name : "name",
            type : "string"
        }, {
            name : "menu"
        } ],
        /* Grid ColumnModel */
        columns : [ {
            header : _( "id" ),
            dataIndex : "id",
            sortable : true
        }, {
            header : _( "name" ),
            dataIndex : "name",
            sortable : true
        } ],
        /* Top toolbar */
        tbar : [ {
            xtype : "button",
            text : _( "create" ),
            handler : {
                xtype : "mycomponent-window-create",
                blankValues : true
            },
            scope : this
        } ]
    } );

    /* Class parent constructor */
    MyComponent.grid.MyGrid.superclass.constructor.call( this, config );
};

Ext.extend( MyComponent.grid.MyGrid, MODx.grid.Grid, {
    /* Class members will go here */
} );

/* Register "mycomponent-grid-mygrid" as an xtype */
Ext.reg( "mycomponent-grid-mygrid", MyComponent.grid.MyGrid );
```

Наша базовая конфигурация устанавливает сетку для работы с коннектором «list», используя параметр действия «getlist». Он также настраивает пейджинг, сортировку и позволяет использовать функцию «автосохранения», чтобы всякий раз, когда запись была изменена, она автоматически обновляется в базе данных.

Затем мы настраиваем наши поля (id, name и menu) и нашу ColumnModel, которая ссылается на поля в нашем хранилище.

Наконец, мы создаем верхнюю панель инструментов, состоящую из кнопки. Обработчик создает окно, используемое для создания записи для добавления в нашу базу данных.
