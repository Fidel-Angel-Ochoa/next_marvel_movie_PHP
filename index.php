<?php

/*to import a file with modules, functions, data, etc, you could use 
  1.'require':this allow to import all the content, but this could make a failure
  be cause this allow to duplicate the code, as calling two times the same function.
  2.'require_once': this avoid to repeat the code and call it more than one time. 
  another cons is when is require a file that doesn't exist, causes a fatal error and the app crash.
  3. 'include': call the file as same as 'require' but instead to crash if the file is missing this only gives a warning.
  4. 'include_once': as 'require_once' but insted to crash if the file is missing this only gives a warning.
  In general you should use 'include' or 'include_once' to implement in pure code and crucial things, but if is optional content, 

   */
require_once 'consts.php';
require_once 'functions.php'; 
require_once 'classes/NextMovie.php';

$next_movie = NextMovie::fetch_and_create_movie(API_URL);
$next_movie_data = $next_movie->get_data();

// $data = get_data(API_URL);
// $until_message = get_until_message($next_movie["days_until"]);
?>

<?php render_template('head',$next_movie_data); ?>

<?php render_template('main', array_merge(
    $next_movie_data,
    ["until_message" => $next_movie->get_until_message()]
    )) ?>

<?php render_template('styles') ?>