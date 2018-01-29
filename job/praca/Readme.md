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
Authorization: token 56UFKHfVz1ADRAuWpcexNEzLYZIXF9UWJUXPxVSEPgWRgeaBZ06d2vRFyaXppQ00
**Text**  
`{"jsonrpc":"2.0","method":"applicant.createContacts","params":[[{"__type":"Praca.Api.Layer0.Objects.Applicant.Contact","type":"email","identifier":"#*st@example.com","isPublic":true,"applicant":{"__type":"Praca.Api.Layer0.Objects.Applicant.Applicant","id":1194}}]],"id":33}`
