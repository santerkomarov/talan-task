<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Talan task</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">
</head>

<body>
   <h1 class="text-center py-3 bg-light shadow mb-4">Тестовое задание для PHP backend - разработчика</h1>
   <div class="wrapper mb-5">
      <h4 class="text-center mb-4">Вводная</h4>
      <div class="mb-4">
         Вы можете отправить свой пример кода реализации конкретной задачи, по которой можно
         будет оценить качество кода и архитектурное решение, реализованный именно вами или
         выполнить тестовое задание ниже (желательно).
         Вы также можете выполнить только часть тестового задания, если считаете что полная
         реализация займет слишком много времени.
         Если вы не готовы выполнить тестовое задание, отправьте, пожалуйста, оценку тестового
         задания с комментарием-обоснованием вашей позиции.
      </div>
      <h4 class="text-center">
         Цель
      </h4>
      <div class="mb-4">
         Необходимо реализовать справочник пользователей с возможностью хранения данных в
         разных источниках (БД, кэш, json-файл, xlsx-файл), чтобы данные мог вносить только
         авторизованный пользователь.
         Нужно реализовать публичный api для выполнения этих операций.
      </div>
      <h4 class="text-center">
         Что нужно сделать
      </h4>
      <div>
         <ol>
            <li>
               Оценить временные рамки, необходимые вам для выполнения указанного задания и перед выполнением направить
               их куратору, направившему задание.
            </li>
            <li>
               Реализовать API или часть API на языке PHP для:
               <ul>
                  <li>
                     сохранения записей в указанный источник данных (только для авторизованного пользователя)
                  </li>
                  <li>
                     получения всех записей из указанного источника данных. Допускается использовать любой фреймворк,
                     любую БД (предпочтительнее MySQL), кэш.
                  </li>

               </ul>
            </li>
            <li>
               При необходимости вместе с выполненным тестовым заданием направить комментарии по времени, способу и
               используемым при выполнении данного задания средствам. Данные пользователя для хранения:
               <ul>
                  <li>
                     ФИО (уникальное значение)
                  </li>
                  <li>
                     e-mail
                  </li>
                  <li>
                     телефон
                  </li>
               </ul>
            </li>
         </ol>
         <p>
            <b>ВАЖНО!</b> Оценивается прежде всего внутренняя реализация, поэтому рекомендуем уделить внимание качеству
            кода и используемым архитектурным решениям.
         </p>
      </div>
   </div>

   <h2 class="text-center py-4 bg-light shadow mb-4 border-top">Реализация</h2>
   <div class="wrapper mb-5">
      <p class="bg-warning p-3">
         На этой странице не было уделено внимание адаптивной вёрстке, так как задача состояла в другом.
      </p>
      <p class="mb-4">
         Для реализации тестового задания я воспользуюсь фреймворком Laravel v.8, покрывающий почти весь спектр задач
         стоящих перед бекэнд разработчиком.
      </p>
      <h5 class="text-center mb-3">
         Общая схема приложения
      </h5>
      <div>
         <img src="{{ asset('images/Talan.svg') }}" alt="diagram" id="diagram">
      </div>

      <div class="my-5">
         Ниже представлена таблица с роутами используемые в проекте.
      </div>
      <div class="d-flex justify-content-center mb-5">
         <div class="p-3 rounded"
            style="font-family: 'JetBrains Mono'; font-size: 12px; text-align: center; text-indent: 0px; margin: 0;background-color: #282C34;width:760px;">
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #63B978; background-color: #282C34; ">GET</span><span
               style="color: #EBEBEB; background-color: #282C34; ">|</span><span
               style="color: #A6B2C0; background-color: #282C34; ">HEAD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">/</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;...........................................................
            </span><span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #CC66CC; background-color: #282C34; ">POST</span><span
               style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">api/login</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp....................................................
            </span><span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #CC66CC; background-color: #282C34; ">POST</span><span
               style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">api/register</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;................................................
            </span><span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #63B978; background-color: #282C34; ">GET</span><span
               style="color: #EBEBEB; background-color: #282C34; ">|</span><span
               style="color: #A6B2C0; background-color: #282C34; ">HEAD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">api/search/</span><span
               style="color: #CC9933; background-color: #282C34; ">{search?}</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;........................................
            </span><span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #CC66CC; background-color: #282C34; ">POST</span><span
               style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">api/users-catalog</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;....................... </span><span
               style="color: #A6B2C0; background-color: #282C34; ">users-catalog.store &nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #63B978; background-color: #282C34; ">GET</span><span
               style="color: #EBEBEB; background-color: #282C34; ">|</span><span
               style="color: #A6B2C0; background-color: #282C34; ">HEAD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">api/users-catalog</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;....................... </span><span
               style="color: #A6B2C0; background-color: #282C34; ">users-catalog.index &nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #CC3333; background-color: #282C34; ">DELETE</span><span
               style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">api/users-catalog/</span><span
               style="color: #CC9933; background-color: #282C34; ">{users_catalog}</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;..... </span><span
               style="color: #A6B2C0; background-color: #282C34; ">users-catalog.destroy &nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #63B978; background-color: #282C34; ">GET</span><span
               style="color: #EBEBEB; background-color: #282C34; ">|</span><span
               style="color: #A6B2C0; background-color: #282C34; ">HEAD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">api/users-catalog/</span><span
               style="color: #CC9933; background-color: #282C34; ">{users_catalog}</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;........ </span><span
               style="color: #A6B2C0; background-color: #282C34; ">users-catalog.show &nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #CC9933; background-color: #282C34; ">PUT</span><span
               style="color: #EBEBEB; background-color: #282C34; ">|</span><span
               style="color: #CC9933; background-color: #282C34; ">PATCH</span><span
               style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">api/users-catalog/</span><span
               style="color: #CC9933; background-color: #282C34; ">{users_catalog}</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;...... </span><span
               style="color: #A6B2C0; background-color: #282C34; ">users-catalog.update &nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #63B978; background-color: #282C34; ">GET</span><span
               style="color: #EBEBEB; background-color: #282C34; ">|</span><span
               style="color: #A6B2C0; background-color: #282C34; ">HEAD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">api/</span><span
               style="color: #CC9933; background-color: #282C34; ">{fallbackPlaceholder}</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;...................................
            </span><span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #63B978; background-color: #282C34; ">GET</span><span
               style="color: #EBEBEB; background-color: #282C34; ">|</span><span
               style="color: #A6B2C0; background-color: #282C34; ">HEAD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">export</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;.................................................
            </span><span style="color: #A6B2C0; background-color: #282C34; ">xlsx &nbsp;</span><br>
            <span style="color: #A6B2C0; background-color: #282C34; ">&nbsp;&nbsp;</span><span
               style="color: #63B978; background-color: #282C34; ">GET</span><span
               style="color: #EBEBEB; background-color: #282C34; ">|</span><span
               style="color: #A6B2C0; background-color: #282C34; ">HEAD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
               style="color: #EBEBEB; background-color: #282C34; ">json</span><span
               style="color: #4875C8; background-color: #282C34; ">&nbsp;...................................................
            </span><span style="color: #A6B2C0; background-color: #282C34; ">json &nbsp;</span><br>
         </div>

      </div>
      <p>
         Получение данных из справочника пользователей возможен только при наличии токена, который генерируется при
         регистрации или при входе.
      </p>
      <p>
         <i>Дополнительно: GET api/search/{search} осуществляет поиск по всем трём
            столбцам в базе данных.</i>
      </p>
   </div>

   <div class="d-flex flex-column justify-content-center wrapper">
      <h5 class="text-center mb-3">
         База данных
      </h5>
      <div class="mb-5">
         <p>
            База данных - MySQL. На роуты GET <b>/api/users-catalog</b> | GET <b>/api/users-catalog/{id}</b> настроен
         кеш с настрйкой driver - file.
         </p>
         <p>
            Данные сохраняются в кеше 24 часа (настраивается).
            При добавлении новых данных в каталог пользователей происходит обновление содержимого кеш с использованием App\Observers\<b>UsersCatalogObserver</b> в App\Providers\<b>EventServiceProvider</b>. 
         </p>
         
      </div>
      
      <div class="d-flex flex-column mb-5 justify-content-left">
         <h5 class="text-center mb-3">
            Сохранение данных в разных форматах
         </h5>
         <div class="mb-4">
            <p>
               Дополнительный способ сохранения данных помимо MySQL это json-файл. В данном случае происходит запрос в БД с последующей конвертацией в json массив в цикле. 
            </p>
            <a href="{{ route('json') }}" class="btn btn-secondary">Загрузить данные в формате json</a>
         </div>
         <div>
            <p>
               Другой способ дублирования данных это хранение в xslx формате с включением в Laravel дополнительного модуля maatwebsite/excel, который производит операции экспорт/импорт в формате Excel.
            </p>
            <a href="{{ route('xlsx') }}" class="btn btn-secondary">Загрузить данные в формате xlsx</a>
         </div>
      </div>
      <div class="mb-5">
         <h5 class="text-center">
            Тестирование
         </h5>
         <div class="d-flex justify-content-left align-items-center">
            <img src="{{ asset('images/postman.svg')}}" alt="postman" class="me-5">
            <p class="pt-4">
               Тестирование проводилось при помощи Postman.
            </p>
         </div>
         <p class="bg-orange p-2"><b>!</b> Не забываем установить в <b>Authorization->Type->Bearer Token : authToken</b>, полученный при регистрации токен, а в <b>Headers->Accept : application/json</b>
         </p>
         <p>
            <b>Регистрация</b>: &nbsp;&nbsp;&nbsp; http://santerdg.beget.tech/talan/api/register<br>
            <b>Вход</b>: &nbsp;&nbsp;&nbsp; http://santerdg.beget.tech/talan/api/login<br>
            <b>Последующие запросы</b>: &nbsp;&nbsp;&nbsp; http://santerdg.beget.tech/talan/api/users-catalog...
         </p>
      </div>

      <div class="d-flex justify-content-left align-items-center flex-column mb-5">
         <h5 class="text-center mb-4">
            Просмотр кода
         </h5>
         <p class="pt-4">
            <a href="http://santerdg.beget.tech/talan"><img src="{{ asset('images/github.png')}}" alt="github" class="me-4" id="github"></a>
         </p>
      </div>

   </div>
   <footer class="d-flex justify-content-center align-items-center bg-secondary text-white">
      <div>
         <p>
            Created by BERGAN
         </p>
      </div>
   </footer>
</body>

</html>