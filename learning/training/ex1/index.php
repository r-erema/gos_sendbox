<?php
    /**
     * Необходимо сделать форму для авторизации на сайте,
     * для этого делаются 3 обязательных поля: login, password, email.
     * Если верно ввели - записываем в куки специальный ключ, при наличии которого выводим человеку кнопку "выйти из сайта".
     * В момент выхода - удалить созданную куку.
     */


const COOKIE_AUTHORIZED_KEY = 'authorized';

$isAuthorized = isset($_COOKIE[COOKIE_AUTHORIZED_KEY]) && $_COOKIE[COOKIE_AUTHORIZED_KEY] == 1 ? true : false;

$formErrors = [];

const ERROR_TYPE_EMPTY_FILED = 'emptyRequiredFields';
const ERROR_TYPE_WRONG_FILED_VALUE = 'wrongValue';

const FORM_FIELD_NAME_KEY = 'name';
const FORM_FIELD_LABEL_KEY = 'label';
const FORM_FIELD_IS_REQUIRED_KEY = 'isRequired';
const FORM_FIELD_VALIDATE_VALUE_KEY = 'validateValue';
const FORM_SUBMIT_VALUE_LOG_IN = 'Log in';
const FORM_SUBMIT_VALUE_LOG_OUT = 'Log out';
const FORM_SUBMIT_ACTION = 'action';

$formFields = [
    [
        FORM_FIELD_NAME_KEY => 'login',
        FORM_FIELD_LABEL_KEY => 'Login',
        FORM_FIELD_IS_REQUIRED_KEY => true,
        FORM_FIELD_VALIDATE_VALUE_KEY => 'user_login'
    ],
    [
        FORM_FIELD_NAME_KEY => 'email',
        FORM_FIELD_LABEL_KEY=> 'E-mail',
        FORM_FIELD_IS_REQUIRED_KEY => true,
        FORM_FIELD_VALIDATE_VALUE_KEY => 'user@email.com'
    ],
    [
        FORM_FIELD_NAME_KEY => 'password',
        FORM_FIELD_LABEL_KEY => 'Password',
        FORM_FIELD_IS_REQUIRED_KEY => true,
        FORM_FIELD_VALIDATE_VALUE_KEY => 'di4_7&K'
    ],
    [
        FORM_FIELD_NAME_KEY => 'phone',
        FORM_FIELD_LABEL_KEY => 'Phone',
        FORM_FIELD_IS_REQUIRED_KEY => false
    ],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST[FORM_SUBMIT_ACTION]) && $_POST[FORM_SUBMIT_ACTION] == FORM_SUBMIT_VALUE_LOG_IN) {
        foreach ($formFields as $field) {
            if ($field[FORM_FIELD_IS_REQUIRED_KEY] && empty($_POST[$field[FORM_FIELD_NAME_KEY]])) {
                $formErrors[ERROR_TYPE_EMPTY_FILED][] = $field[FORM_FIELD_NAME_KEY];
            }
        }

        if (!isset($formErrors[ERROR_TYPE_EMPTY_FILED]) || !count($formErrors[ERROR_TYPE_EMPTY_FILED])) {
            foreach ($formFields as $field) {
                if (
                    isset($field[FORM_FIELD_VALIDATE_VALUE_KEY]) &&
                    $field[FORM_FIELD_VALIDATE_VALUE_KEY] != $_POST[$field[FORM_FIELD_NAME_KEY]]
                ) {
                    $formErrors[ERROR_TYPE_WRONG_FILED_VALUE][] = $field[FORM_FIELD_NAME_KEY];
                }
            }
        }

        if (!count($formErrors)) {
            setcookie(COOKIE_AUTHORIZED_KEY, 1);
            $isAuthorized = true;
        }

    } elseif (isset($_POST[FORM_SUBMIT_ACTION]) && $_POST[FORM_SUBMIT_ACTION] == FORM_SUBMIT_VALUE_LOG_OUT) {
        unset($_COOKIE[COOKIE_AUTHORIZED_KEY]);
        setcookie(COOKIE_AUTHORIZED_KEY, null, -1);
        $isAuthorized = false;
    }
}
?>

<html>
    <head>
        <title>Authorization form</title>
    </head>
    <body>
        <form method="post">
        <?php if(!$isAuthorized): ?>
            <?php foreach($formFields as $field): ?>
                <div style="margin-bottom: 10px;">
                    <label for="<?php echo $field[FORM_FIELD_NAME_KEY]; ?>"><?php echo $field[FORM_FIELD_LABEL_KEY ]; ?><?php if($field[FORM_FIELD_IS_REQUIRED_KEY]):?>*<?php endif; ?></label>
                    <input
                        type="text"
                        id="<?php echo $field[FORM_FIELD_NAME_KEY]; ?>"
                        name="<?php echo $field[FORM_FIELD_NAME_KEY]; ?>"
                        value="<?php if(isset($_POST[$field[FORM_FIELD_NAME_KEY]]) && !empty($_POST[$field[FORM_FIELD_NAME_KEY]])):?><?php echo $_POST[$field[FORM_FIELD_NAME_KEY]]; ?><?php endif; ?>"
                    >
                    <?php if (count($formErrors)): ?>
                        <div style="color: #ff1821; font-size: 0.8em;">
                            <?php if(isset($formErrors[ERROR_TYPE_EMPTY_FILED]) && in_array($field[FORM_FIELD_NAME_KEY], $formErrors[ERROR_TYPE_EMPTY_FILED])): ?>
                                Field '<?php echo $field[FORM_FIELD_NAME_KEY]; ?>' is required and can't be empty
                            <?php elseif (isset($formErrors[ERROR_TYPE_WRONG_FILED_VALUE]) && in_array($field[FORM_FIELD_NAME_KEY], $formErrors[ERROR_TYPE_WRONG_FILED_VALUE])): ?>
                                Field '<?php echo $field[FORM_FIELD_NAME_KEY]; ?>' has wrong value
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
             <?php endforeach; ?>
                <input type="submit" name="<?php echo FORM_SUBMIT_ACTION; ?>" value="<?php echo FORM_SUBMIT_VALUE_LOG_IN; ?>">
        <?php else: ?>
                <input type="submit" name="<?php echo FORM_SUBMIT_ACTION; ?>" value="<?php echo FORM_SUBMIT_VALUE_LOG_OUT; ?>">
        <?php endif; ?>
        </form>
    </body>
</html>
<?php