<?php

function create_form_input($name, $type, $label = '', $errors = array(), $options = array()) {
    $value = false;
    if (isset($_POST[$name])) $value = $_POST[$name];
    if ($value && get_magic_quotes_gpc()) $value = stripslashes($value);
    echo '<div class ="form-group row';
    if (array_key_exists($name, $errors)) echo ' has-error';
    echo '">';
    if (!empty($label)) echo '<label for="' . $name . '" class="control-label four columns">' . $label . '</label>';
    echo '<input type="' . $type . '" name="' . $name . '" id="' . $name . '" class="form-control four columns"';
    if ($value) echo ' value="' . htmlspecialchars($value) . '"';
    if (!empty($options) && is_array($options)) {

        foreach ($options as $k => $v) {
         
           echo " $k=\"$v\"";
         
        }
         
    }
    echo '></row>';
    if (array_key_exists($name, $errors)) echo '<div class="row"><span class="help-block twelve columns">' . $errors[$name] . '</span></div>';

    echo '</div>';
}