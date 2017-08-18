# MODExt MODx Object

* [MODx JS объект](#modx-js-объект)
* [Пользовательские переменные класса](#пользовательские-переменные-класса)
    * [MODx.request](#modxrequest)
    * [MODx.config](#modxrequest)
        * [Другие переменные](#другие-переменные)
    * [MODx.action](#modxaction)
    * [MODx.user](#modxuser)
    * [MODx.perm](#modxperm)
* [Пользовательские методы](#пользовательские-методы)
    * [MODx.load](#modxload)
    * [MODx.clearCache](#modxclearcache)
    * [MODx.releaseLock](#modxreleaselock)
    * [MODx.sleep](#modxsleep)
    * [MODx.logout](#modxlogout)
    * [MODx.loadHelpPane](#modxloadhelppane)
    * [MODx.preview](#modxpreview)
    * [MODx.isEmpty](#modxisempty)
    * [MODx.debug](#modxdebug)

## MODx JS объект

MODExt поставляется с глобальным объектом MODx JS на каждой странице менеджера. Этот объект имеет несколько настраиваемых методов, которые могут быть выполнены с любой страницы админки с помощью MODExt, а также настраиваются некоторые опции и опции по умолчанию.

## Пользовательские переменные класса

Следующие переменные доступны из объекта MODx JS:

### MODx.request
Это объект JS, содержащий все текущие get-параметры для страницы. Пример:
```var id = MODx.request.id;```

### MODx.config
Этот объект содержит все активные системные настройки в MODX по ключу:
```var tpl = MODx.config.default_template;```

#### Другие переменные
В объекте MODx.config есть несколько других переменных, которые не являются [системными настройками](#https://docs.modx.com/revolution/2.x/administering-your-site/settings/system-settings) :

 Ключ | Описание
------|----------
base_url | Основной URL-адрес сайта MODX и/или активного контекста.
connectors_url | URL-адрес каталога коннекторов.
manager_url | URL-адрес менеджера.
http_host | Переменная хоста HTTP для активного контекста.
site_url | Полный URL сайта для активного контекста.
custom_resource_classes | Массив пользовательских классов ресурсов, извлеченных из настройки системы custom_resource_classes

### MODx.action
Этот объект содержит карту всех объектов modAction (или контроллеров админки MODX), отображаемых их контроллером на их ID:
```var actionId = MODx.action['resource/create'];```

Начиная с версии MODX 2.2, действия не из ядра имеют префикс их пространства имен. До 2.2 это был просто контроллер действия. Например, действие "controllers/index" в пространстве имен «mycomponent» выглядело бы в ерсии 2.2 и выше:
`var actionId = MODx.action['mycomponent:controllers/index'];`

### MODx.version
Содержит информацию о версии MODX со следующими атрибутами:

 Ключ | Пример
------|----------
version | 2
major_version | 1
minor_version | 0
patch_level | pl
code_name | Revolution
distro | (traditional)
full_version | 2.1.0-pl
full_appname | MODX Revolution 2.1.0-pl (traditional)

Пример:
```var fv = MODx.version.full_version;```

### MODx.user
Этот объект будет содержать следующие два свойства для текущего пользователя, входившего в систему:

 Ключ | Описание
------|----------
MODx.user.id | ID пользователя.
MODx.user.username | Имя пользователя.
```var userId = MODx.user.id;```

### MODx.perm
Это будет содержать следующие разрешения, если они будут предоставлены пользователю (они не будут существовать, если у пользователя нет разрешения):

 Ключ | Описание
------|----------
MODx.perm.resource_tree | Возможность просмотреть дерево ресурсов.
MODx.perm.element_tree | Просмотр дерева элементов.
MODx.perm.file_tree | Возможность просмотреть дерево файлов.
MODx.perm.file_upload | Возможность загрузки файлов.
MODx.perm.file_manager | Возможность использовать браузер файлов MODX..
MODx.perm.new_chunk | Возможность создать новый чанк.
MODx.perm.new_plugin | Возможность создать новый плагин.
MODx.perm.new_snippet | Возможность создать новый сниппет.
MODx.perm.new_template | Возможность создать новый шаблон.
MODx.perm.new_tv | Возможность создать новую переменную шаблона.
MODx.perm.directory_create | Возможность создать каталог в файловой системе.

```if (MODx.perm.file_upload) { /* ...code... */ }```

## Пользовательские методы

Для объекта MODx также доступно несколько специальных методов:

### MODx.load
Этот метод создаст новый объект любого заданного типа xtype и передаст его в параметрах конфигурации. Пример:
```
var w = MODx.load({
  xtype: 'modx-window-namespace-create'
  ,blankValues: true
});
w.setValues({ name: 'My Namespace' });
w.show();
```
Любой определенный класс, имеющий зарегистрированный xtype, может быть загружен из этого метода.

### MODx.clearCache
Запускает консоль, которая очищает кеш MODX. Также запускает события «beforeClearCache» и «afterClearCache» на объекте MODx.

### MODx.releaseLock
Это освободит блокировку текущего активного ресурса. Этот метод не должен запускаться на страницах редактирования **не** ресурсов. Он будет запускать события «beforeReleaseLocks» и «afterReleaseLocks» в объекте MODx.

### MODx.sleep
Этот метод заставит JavaScript спать (или останавливаться) в течение определенного количества секунд:
```MODx.sleep(3); /* sleep for 3 seconds */```

### MODx.logout
Этот метод автоматически выйдет из режима активного пользователя-менеджера. Он запускает события «beforeLogout» и «afterLogout» в объекте MODx. Если оба события успешны, он перенаправляет пользователя на экран входа в систему.

### MODx.loadHelpPane
Загружает текущий экран справки для активной страницы. Обычно это устанавливается по умолчанию для записи modAction для страницы, а ее URL-адрес можно найти с помощью свойства MODx.config.help_url.
```
/* show the modx.com site in the Help modal */
MODx.config.help_url = 'http://modx.com/';
MODx.loadHelpPane();
```

### MODx.preview
Загружает текущий сайт MODX для активного Контекста.

### MODx.isEmpty
Проверяет, является ли указанная переменная «пустой» (в смысле PHP). Это означает, что это:
* false, 'false', or 'FALSE'
* 0 or '0'
* '' (пустая строка)
* null
* undefined

### MODx.debug
(только в 2.1+)
Это отправит отладочное сообщение тогда и только тогда, если в системных настройках MODX для параметра ui_debug_mode установлено значение Да/1. Отладочное сообщение будет использовать console.log для вывода на консоль. Это может быть полезно для добавления отладки и утверждений в ваш код, не разбивая его на боевых сайтах (где ui_debug_mode предпочтительно должно быть отключено).
