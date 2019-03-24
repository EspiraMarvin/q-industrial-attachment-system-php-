<?php
session_start();

require_once 'class.user.php';

$user = new USER();

// if user session is not active(not loggedin) this page will help 'index.php' to redirect to user login page
// put this file within secured pages that users (users can't access without login)

if(!$user->is_orgloggedin())
{
    // session no set redirects to login page

    $user->redirect('index.php');

}
