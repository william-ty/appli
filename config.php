<?php
    define("DS", DIRECTORY_SEPARATOR);
    define('ROOT_DIR', '.'.DS);

    //constantes de dossiers par défault
    define('PUBLIC_DIR', "public".DS);
    define('TEMPLATE_DIR', "template".DS);
    define('CSS_DIR', PUBLIC_DIR."css".DS);
    define('JS_DIR', PUBLIC_DIR."js".DS);

    //constantes coté controleur
    define('DEFAULT_CTRL', "store");
    define('DEFAULT_ACTION', "index");
    