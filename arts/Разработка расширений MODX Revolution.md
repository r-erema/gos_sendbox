#Разработка расширений MODX Revolution

Содержание:
* Часть I: Начало работы и создание сниппета Doodles
* Часть II: Создание нашей кастомной страницы в админке
* Часть III: Упаковка расширения
---
* [Обзор](#Обзор)
* [Настройка каталогов](#Настройка-каталогов)
* [Создание сниппета Doodles](#Создание-сниппета-Doodles)
  * [Создание настроек Magic Path](#Создание-настроек-Magic-Path)
  * [Создание базового класса Doodles](#Создание-базового-класса-Doodles)
  * [Создание модели](#Создание-модели)
  * Скрипт парсинга схемы
  * Статический сниппет
  * Построение запроса
  * Метод getChunk класса Doodles
* Резюме

##Обзор

Это пособие написано в виде всеобъемлющего примера по разработке **компонента** для MODX Revolution 2.3 и более поздних версий, а также для того, как настроить компонент, чтобы он был легко упакован в транспортный пакет, а также мог быть разработан за пределами веб-сайта MODX, например, в репозитории git.

В пособии будет рассмотрен компонент «Doodles», который представляет собой простой компонент, который использует пользовательскую таблицу для хранения объектов под названием «Doodles», которые имеют имя и описание. У нас будет сниппет, который вытаскивает их и отображает список из них, который будет шаблонизирован с помощью чанка, кастомную страницу в админке, использующую ExtJS, для создания сетки CRUD для редактирования, а также сценария сборки для упаковки. И мы сделаем все это i18n-совместимым, чтобы упростить перевод. Это чрезвычайно всеобъемлющий учебник, поэтому, если вам нужны только определенные части, используйте приведенное выше содержание.

> Компонент Doodles можно найти на GitHub, здесь: https://github.com/splittingred/doodles

##Настройка каталогов

Существует много способов начать разработку компонентов - вы можете написать свои плагины, сниппеты и т. д. внутри MODX, а затем упаковать их с помощью упаковочного инструмента, такого как [PackMan](https://docs.modx.com/extras/revo/packman), или вы могли бы разработать свой проект за пределами менеджера MODX и отслеживать ваши файлы через систему контроля версий, такую как Git. Этот учебник использует последний метод по нескольким причинам:
* Это позволяет немедленно разворачивать компонент прямо из вашего репозитория Git
* Это позволяет легко взаимодействовать разработчикаи, поскольку нет файлов копирования или изменения основных файлов - просто разработка в вашей IDE, а затем выполняется некоторая первоначальная настройка путей.
* Позволяет изолировать ваш код от ядра MODX, поэтому, если вам нужно его переместить, вы можете сделать это только в одном месте.

> Возможно, вам придется добавить системную настройку в вашу установку MODX с именем session_cookie_path и присвоить ей значение «/» (без кавычек). Это позволит MODX использовать тот же сеанс, когда вы запускаете по адресу http://localhost/doodles/. Кроме того, дать ему уникальное имя через session_name (например, «modxlocaldevsession») тоже хорошая идея. Это предотвратит конфликты с другими установками MODX на вашей локальной машине. Если вы это сделаете, после этого удалите каталог core /cache/ и переавторизуйтесь.

Здесь у нас будет довольно много каталогов:

![](https://docs.modx.com/download/attachments/7be5a431a826c4c2097f6e6bdd67b307/doodles-dir-structure.png)

Отметим несколько вещей. Основными 3 каталогами являются core/, assets/ и _build/. Как правило, MODX компоненты разделяются на 2 разных каталога при установке: core/components/doodles / и assets/components/doodles/. Зачем? Это позволяет нам отделять веб-специфические ресурсы (файлы JavaScript, CSS, изображения, коннекторы и т.д.) внутри веб-сайта, тогда как все файлы PHP (коннекторы должны оставаться в assets) помещаются в  core/components/ которые могут (и должны) находиться за пределами веб-сайта по соображениям безопасности.

Каталоги разделены так, чтобы имитировать, то как они будут находиться в установке MODX после того, как компонент будет установлен ​​транспортным пакетом.

Каталог _build/ не помещается в zip-файл транспортного пакета. Там находятся строительные леса, для созхдания Транспортного пакета. Подробнее об этом в конце пособия.

Давайте более подробно рассмотрим каждый подкаталог. В каталоге assets/ единственным очевидным файлом является assets/components/doodles/connector.php. Этот файл позволит нам создавать пользовательские процессоры для кстонмной страницы в админке (КСА), которую мы будем писать. Мы узнаем об этом позже.

В каталоге core/components/doodles/ у нас есть несколько каталогов:
* **controllers** - это контроллеры для нашей КСА. Подробнее об этом позже.
* **docs** - содержит только чейнджлоги, файл readme и файл лицензии.
* **elements** - сниппеты, чанки, плагины и т.д.
* **lexicon** - файлы языка i18n, подробнее об этом позже.
* **model** - там, где лежат все наши классы, а также наш файл XML-схемы для наших пользовательских таблиц базы данных.
* **processors** - наши пользовательские процессоры для нашей КСА.

Обратите внимание: хотя этот каталог должен быть доступен в Интернете, он полностью отделен от ядра MODX. Возможно, вы захотите установить MODX в один подкаталог и поместить свой репозиторий в отдельный подкаталог. Например, я установил MODX внутри /www/modx/, и я разрабатываю этот компонент внутри /www/doodles/. Использование отдельных каталогов может помочь вам изолироваться от любых неожиданностей Git или случайно помещтить файлы в неправильный репозиторий. Пока у вас все правильно изолировано, вы можете запустить «git init» и сделать себе репозиторий Git из каталога /www/doodles/ (или из того, котрый вы сделали). И вы можете запушить это, не беспокоясь о ненужных файлах (мы упомянем несколько файлов позже, когда мы поговорим о добавлении файла .gitignore).

Там у нас это есть. Изолированная среда разработки от MODX, чтобы мы могли вести отдельную разработку и подддерживать непрерывную совместимость. Идем дальше.

##Создание сниппета Doodles

Создаем файл для нашего первого сниппета:
`/www/doodles/core/components/doodles/elements/snippets/snippet.doodles.php`

Вам нужно будет создать каталог snippets/, если вы еще этого не сделали. Ваш файл должен быть пустым, но добавим несколько строк кода:

```
<?php
    $dood = $modx->getService('doodles','Doodles',$modx->getOption('doodles.core_path',null,$modx->getOption('core_path').'components/doodles/').'model/doodles/',$scriptProperties);
    if (!($dood instanceof Doodles)) return '';
```

Вау! Что это? Здесь происходит волшебство. Давайте разложим каждую часть. Во-первых, у нас есть вызов getService. Упростим код:
```
<?php
    $defaultDoodlesCorePath = $modx->getOption('core_path').'components/doodles/';
    $doodlesCorePath = $modx->getOption('doodles.core_path',null,$defaultDoodlesCorePath);
    $dood = $modx->getService('doodles','Doodles',$doodlesCorePath.'model/doodles/',$scriptProperties);
```

Итак, во-первых, что такое `$modx->getOption`? Это метод, который захватывает системную настройку с помощью ключа (первый параметр). В первой строке мы захватываем «путь по умолчанию», по которому как мы предполагаем, будет распологаться наш основной путь Doodles. Путем префикса основного пути MODX к нему будет: /www/modx/core/components/doodles/

Затем мы передадим запасное значение для следующего вызова getOption. Передается 3 параметра: ключ с именем «doodles.core_path», null и наш путь по умолчанию, который мы только что назначили. В getOption второй параметр представляет собой массив для поиска ключа (который мы не делаем, поэтому мы можем установить его в null), а третий параметр является значением по умолчанию, если ключ не найден.

Весь этот шум необходим, потому что мы разрабатываем наш код в одном месте, но при его развертывании он будет существовать в другом. Мы не можем просто ссылаться на пути относительно MODX, потому что мы не разрабатываем внутри ядра MODX. Мы объясним это подробнее в следующем разделе.

Итак, на данный момент наша вторая строка вернет /www/modx/core/components/doodles/. Но это не наш основной путь Doodles! (Подсказка: это /www/doodles/core/components/doodles). Мы хотим указать этому коду искать компонент там. Так что же нам делать?

###Создание настроек Magic Path
Мы установили пару системных настроек (которые относятся к нашей среде разработки), которые указывают этому коду, где можно получить наши файлы! Идем дальше и устанавливаем следующие настройки системы:
* doodles.core_path - /www/doodles/core/components/doodles/
* doodles.assets_url - /doodles/assets/components/doodles/

Если вам нужно изменить что-то из этого, чтобы отразить правильные пути, например URL-адрес, это можно сделать. Теперь наша первая строка вернет: /www/doodles/core/components/doodles/, бинго.

Зачем мы это делаем? Почему бы просто не обратиться к /www/doodles/core/components/doodles/ ? Это не сработает в чужом окружении. Скорее всего, в MODXPATH/core/components/doodles/. Наш транспортный пакет (позже) будет обрабатывать все эти материалы динамического пути, но мы хотим добавить переопределение, чтобы позволить нам разрабатывать Doodles вне MODX. И мы это сделали.

Теперь 3 строка выглядит так:
```
$dood = $modx->getService('doodles','Doodles',$doodlesCorePath.'model/doodles/',$scriptProperties);
```

```$modx->getService``` загружает класс и создает экземпляр объекта, если он существует, и устанавливает здесь ```$modx->doodles``` (первый переданный параметр). Подробнее о getService можно найти [здесь](#https://docs.modx.com/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getservice). Но у нас нет класса Doodles.

###Создание базового класса Doodles

Во-первых, вы, вероятно, спрашиваете меня, почему мы делаем этот класс. Ну, это поможет в нескольких случаях: мы можем определить некоторые базовые пути в нем, которые мы будем использовать в нашем компоненте, и также могут предоставить нам некоторые методы приложения, которые мы можем использовать. Поверьте мне, это полезно. Итак, давайте сделаем это в /www/doodles/core/components/doodles/model/doodles/doodles.class.php:

```
<?php
class Doodles {
    public $modx;
    public $config = array();
    public function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;
        $basePath = $this->modx->getOption('doodles.core_path',$config,$this->modx->getOption('core_path').'components/doodles/');
        $assetsUrl = $this->modx->getOption('doodles.assets_url',$config,$this->modx->getOption('assets_url').'components/doodles/');
        $this->config = array_merge(array(
            'basePath' => $basePath,
            'corePath' => $basePath,
            'modelPath' => $basePath.'model/',
            'processorsPath' => $basePath.'processors/',
            'templatesPath' => $basePath.'templates/',
            'chunksPath' => $basePath.'elements/chunks/',
            'jsUrl' => $assetsUrl.'js/',
            'cssUrl' => $assetsUrl.'css/',
            'assetsUrl' => $assetsUrl,
            'connectorUrl' => $assetsUrl.'connector.php',
        ),$config);
    }
}
```

Сейчас всё просто - просто создается объект класса, у которого есть конструктор, который устанавливает ссылку на объект modX в ```$doodles->modx```. Это понадобится позже. Кроме того, он заполняет некоторые базовые пути, которые мы можем воспользоваться позже в массиве ```$doodles->config```, и это делается с помощью нашего причудливого набора настроек системы, чтобы мы могли указать его на наш www/doodles/path!

Теперь вернемся к нашему сниппету. Давайте продолжим и добавим некоторые свойства по умолчанию в наш сниппет:

```
$dood = $modx->getService('doodles','Doodles',$modx->getOption('doodles.core_path',null,$modx->getOption('core_path').'components/doodles/').'model/doodles/',$scriptProperties);
if (!($dood instanceof Doodles)) return '';
/* setup default properties */
$tpl = $modx->getOption('tpl',$scriptProperties,'rowTpl');
$sort = $modx->getOption('sort',$scriptProperties,'name');
$dir = $modx->getOption('dir',$scriptProperties,'ASC');
$output = '';
return $output;
```

Теперь мы должны использовать xPDO для запроса к базе данных, чтобы вытянуть наши записи, но мы пока не сделали для них модель xPDO.

##Создание модели

xPDO служит для ООП-методов-запросов для доступа к базе данных. В настоящее время он начинает поддерживать несколько баз данных, и это происходит путем абстракции запросов БД. Кроме того, он позволяет хранить ваши строки в хороших, чистых классах и делать всевозможные аккуратные вещи в очень коротких строках кода. Но для этого нам нужно добавить xPDO-модель в наш фрагмент (с помощью метода ```$modx->addPackage```). Но сначала мы должны построить эту модель, используя схему xPDO. Есть [большое руководство](#https://docs.modx.com/xpdo/2.x/getting-started/creating-a-model-with-xpdo) о том, как это сделать.

Идем дальше и создаем xml-файл в `/www/doodles/core/components/doodles/model/schema/doodles.mysql.schema.xml`. Поместите это в него:

```
<?xml version="1.0" encoding="UTF-8"?>
<model package="doodles" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" version="1.0">
    <object class="Doodle" table="doodles" extends="xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="255" phptype="string" null="false" default=""/>
        <field key="description" dbtype="text" phptype="string" null="false" default=""/>
        <field key="createdon" dbtype="datetime" phptype="datetime" null="true"/>
        <field key="createdby" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" />
        <field key="editedon" dbtype="datetime" phptype="datetime" null="true"/>
        <field key="editedby" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" />
        <aggregate alias="CreatedBy" class="modUser" local="createdby" foreign="id" cardinality="one" owner="foreign"/>
        <aggregate alias="EditedBy" class="modUser" local="editedby" foreign="id" cardinality="one" owner="foreign"/>
    </object>
</model>

```

Если вы впервые узнали о xPDO и не знакомы с его XML-схемами, вы можете просмотреть дополнительные [примеры](#https://docs.modx.com/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/more-examples-of-xpdo-xml-schema-files). Итак, первая строка:
```
<model package="doodles" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM">
```
Это говорит о том, что наш пакет xPDO называется «doodles». Об этом мы поговорим в нашем вызове ```addPackage()```. Отлично. Он также говорит, что базовый класс для всех объектов, определенных здесь, это «xPDOObject», и эта схема создана для MySQL. Наконец, он определяет движок по умолчанию MyISAM. Далее!

```
<object class="Doodle" table="doodles" extends="xPDOSimpleObject">
```

«Объект» в схеме xPDO представляет собой таблицу базы данных. В этой строке указывается xPDO имя для таблицы с именем '{table_prefix} doodles'. Предполагая, что ваш префикс таблицы «modx», то в итоге получаем «modx_doodles». Затем подрузамевается расширение «xPDOSimpleObject». Что это? Ну, xPDOObject является базовым объектом для любого класса таблицы xPDO. XPDOSimpleObject расширяет его, но добавляет небольшое небольшое поле «id» auto-increment в эту таблицу. Итак, поскольку нам нужно поле «id» на нашей таблице, мы используем xPDOSimpleObject.

```
<field key="name" dbtype="varchar" precision="255" phptype="string" null="false" default=""/>
<field key="description" dbtype="text" phptype="string" null="false" default=""/>
<field key="createdon" dbtype="datetime" phptype="datetime" null="true"/>
<field key="createdby" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" />
<field key="editedon" dbtype="datetime" phptype="datetime" null="true"/>
<field key="editedby" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" />
```

Остальное довольно понятно - это поля в таблице DB. Перейдем к двум последним частям:
```
<aggregate alias="CreatedBy" class="modUser" local="createdby" foreign="id" cardinality="one" owner="foreign"/>
<aggregate alias="EditedBy" class="modUser" local="editedby" foreign="id" cardinality="one" owner="foreign"/>
```

Хорошо, вот где связанные объекты входят в xPDO. Пока что просто знайте, что тут сообщается xPDO, что поле createdby сопоставляется с modUser, а поле editby сопоставляется с другим модулем. Круто? Теперь давайте распарсим этот XML-файл и создадим наши классы и карты.