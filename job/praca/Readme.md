#Praca temp crib

##run tests

`APPLICATION_ENV=development vendor/bin/phpunit backend/tests/Api/BadEmailsTest.php --bootstrap backend/cli/phpunit.php --debug`

##run supervisor
`supervisorctl restart all`

##api call
![img](api_call.png)

**Example**:  
>**Host/port**: https://api.praca.ryaroma.web:8443  
**Path**: /api-json-rpc/  
**Headers**  
Accept: \*/\*  
Cache-Control: no-cache  
XDEBUG_SESSION: PHPSTORM  
Content-Type: application/json  
Keep-Alive: timeout=120000  
Authorization: Token 0l10gZKkiexZy3PHs4vr1mKCE1q5Q9O3BCxWw0BelkE36FOAQ6y5gaztdK09Yw00 (токен берется из базы: praca-test-api.user_tokens.token, если токена для конкретного юзера нет, то надо авторизоваться на портале)  
**Text**  
>1. Редактирование вакансии:  
`
{"jsonrpc":"2.0","method":"employer.updateVacancy","params":[{
      "__type" : "Praca.Api.Layer0.Objects.Employer.Vacancy",
      "type" : "standardDisposable",
      "id" : 777,
      "incrementViewsCount" : true
 }]}
 `
 
 2. Регистрация соискателя:
 `
 {"jsonrpc":"2.0","method":"applicant.registerApplicant","params":[{"__type":"Praca.Api.Layer0.Objects.Applicant.Applicant","email":"re-applicant.android2@fwd.commontools.net","nameLast":"Android","nameFirst":"Applicant","nameMiddle":"","rawPassword":"mmm_beer11"},[],{"__type":"Praca.Api.Layer0.Objects.Applicant.Contact","type":"phone","identifier":"298616649","isPublic":true,"isPrimary":true},[],{"__type":"Praca.Api.Layer0.Objects.DataObjects.UserNotificationMapData","notificationMap":{"proposals":{"sms":false}}}],"id":12}
 `
 
 **Чтобы перехатить json-запроса:**
 1. На каком-либо тестовом сервере в файле backend/lib/Praca/Api/Pub/Adapter/HttpJsonRpc.php::getNextRequest(), после `$requestArray = $this->getRequestArray();` вставить строку `file_put_contents(PRACA_API_LOG_FILE_PATH, json_encode($requestArray));`
 2. Открыть девайс с мобильным приложением, на экране входа тапнуть 5 раз в правом верхнем углу, ввести дату в формате ГГГГММДД (без точек/дефисов), выбрать тестовый сервер. И делать то что надо.

##Production deploy
`cd /h/pracaby/praca-deployer/ && php deployer.phar deploy production -vv`


##Spinx indexing
`
cd ~/code/current/backend
APPLICATION_ENV=development ./cli/index-all.sh`

`cd ~/code/current/
APPLICATION_ENV=development php vendor/pgby/query-correction/dictionaries/insert.php`,

#Proposals expiring
Set creation_time of proposal to NOW() - 30 days
`APPLICATION_ENV=development php backend/cli/cli-no-auth.php praca-api:expire-proposals`


