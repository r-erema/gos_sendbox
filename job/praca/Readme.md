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
Authorization: token 0l10gZKkiexZy3PHs4vr1mKCE1q5Q9O3BCxWw0BelkE36FOAQ6y5gaztdK09Yw00 (токен берется из базы: praca-test-api.user_tokens.token, если токена для конкретного юзера нет, то надо авторизоваться на портале)  
**Text**  
>1. Редактирование вакансии:  
`
{"jsonrpc":"2.0","method":"employer.updateVacancy","params":[{
      "__type" : "Praca.Api.Layer0.Objects.Employer.Vacancy",
      "type" : "standardDisposable",
      "id" : 777
 }]}
 `

##Production deploy
`cd /h/pracaby/praca-deployer/ && php deployer.phar deploy production -vv`