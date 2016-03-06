<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Poll Coniguration Options
|--------------------------------------------------------------------------
*/
// allow user to vote multiple times in the same poll
$config['poll']['allow_multiple_votes'] = FALSE;
// set this to 0 if you want no limit amount of votes user can make
$config['poll']['interval_between_votes'] = 10;
// maximum number of options poll can be created with
$config['poll']['max_poll_options'] = 5;
// minimum number of options poll can be created with
$config['poll']['min_poll_options'] = 2;

/* End of file Poll.php */
/* Location: ./application/config/Poll.php */