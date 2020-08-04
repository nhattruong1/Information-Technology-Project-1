<?php
defined('BASEPATH') or exit('No direct script access allowed');

//API lấy thông tin quốc gia: api/v1/nations/1
$route['api/v1/nations/(:num)'] = '/api/address/API_A_1/get/$1';
//API lấy danh sách thông tin quốc gia: api/v1/nations
$route['api/v1/nations']['get']= '/api/address/API_A_1/getList';

//API lấy danh sách tỉnh theo quốc gia: api/v1/provinces/234
$route['api/v1/provinces/(:num)'] = '/api/address/API_A_2/getList/$1';

//API lấy danh sách quận theo tỉnh: api/v1/district/56
$route['api/v1/district/(:num)'] = '/api/address/API_A_3/getList/$1';

//API lấy danh sách phường theo quận: api/v1/wards/622
$route['api/v1/wards/(:num)'] = '/api/address/API_A_4/getList/$1';
