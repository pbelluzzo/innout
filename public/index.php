<?php

require_once(dirname(__FILE__,2) . '/source/config/config.php');

Database::getConnection();

require_once((VIEW_PATH) . '/login-view.php');