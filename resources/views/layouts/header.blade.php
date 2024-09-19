



<?php 			
// Define page titles and corresponding include files in an associative array
$pageActions = array(
    'asset_list.php' => array(
        'title' => 'Asset List',
        'include_file' => 'asset_list.php'
    ),
    'asset_list_add.php' => array(
        'title' => 'Add Asset List',
        'include_file' => 'asset_list_add.php'
    ),
    'grading_ruberic.php' => array(
        'title' => 'Grading Ruberic',
        'include_file' => 'grading_ruberic.php'
    ),
    'admin_dashboards.php' => array(
        'title' => 'Admin Dashboards',
        'include_file' => 'admin_dashboards.php'
    ),
    'announcement.php' => array(
        'title' => 'Announcement',
        'include_file' => 'announcement.php'
    ),
    'team_management.php' => array(
        'title' => 'Team Management',
        'include_file' => 'team_management.php'
    ),
    'manage_team.php' => array(
        'title' => 'Manage Team',
        'include_file' => 'manage_team.php'
    ),
    'create_team.php' => array(
        'title' => 'Create Team',
        'include_file' => 'create_team.php'
    ),
    'add_a_team.php' => array(
        'title' => 'Add a Team',
        'include_file' => 'add_a_team.php'
    ),
    'system_group_management.php' => array(
        'title' => 'System Group Management',
        'include_file' => 'system_group_management.php'
    ),
    'system_management.php' => array(
        'title' => 'System Management',
        'include_file' => 'system_management.php'
    ),
    'user_management.php' => array(
        'title' => 'User Management',
        'include_file' => 'user_management.php'
    ),
    'add_a_user.php' => array(
        'title' => 'Add a User',
        'include_file' => 'add_a_user.php'
    ),
    'api_management.php' => array(
        'title' => 'API Management',
        'include_file' => 'api_management.php'
    ),
    'ruberic_management.php' => array(
        'title' => 'Ruberic Management',
        'include_file' => 'ruberic_management.php'
    ),
    'quiz_management.php' => array(
        'title' => 'Quiz Management',
        'include_file' => 'quiz_management.php'
    ),
    'knowledge_base.php' => array(
        'title' => 'Knowledge Base',
        'include_file' => 'knowledge_base.php'
    ),
    'ticket_management.php' => array(
        'title' => 'Ticket Management',
        'include_file' => 'ticket_management.php'
    ),
    'range_settings.php' => array(
        'title' => 'Range Settings',
        'include_file' => 'range_settings.php'
    ),
    'range_administration.php' => array(
        'title' => 'Range Administration',
        'include_file' => 'range_administration.php'
    ),
    'log_administration.php' => array(
        'title' => 'Log Administration',
        'include_file' => 'log_administration.php'
    ),
    'statistics.php' => array(
        'title' => 'Statistics',
        'include_file' => 'statistics.php'
    ),
    'login.php' => array(
        'title' => 'Login',
        'include_file' => 'login.php'
    ),
    'dashboard.php' => array(
        'title' => 'Dashboard',
        'include_file' => 'dashboard.php'
    ),
    'courses.php' => array(
        'title' => 'Courses',
        'include_file' => 'courses.php'
    )
);

	// Default to the dashboard
$title = 'Dashboard';
$bodyClass = 'dashboard';

// Determine the base URL dynamically
$baseURL = '/cyberrange';

// Check if the 'page' parameter is set in the URL
if (isset($_GET['page'])) {
    // Get the value of the 'page' parameter
    $page = $_GET['page'];

    // Check if the page key exists in the array
    if (array_key_exists($page, $pageActions)) {
        $bodyClass = str_replace('.php', '', $page); // Derive a class name from the page name
    } else {
        echo "Page not found in pageActions array.<br>";
        $title = '404';
        $bodyClass = 'page-404';
    }
} elseif (basename($_SERVER['PHP_SELF']) === 'index.php') {
    // If the current script is index.php, use a specific class or leave it empty
    $bodyClass = '';
} elseif (basename($_SERVER['PHP_SELF']) === 'courses.php') {
    // If the current script is index.php, use a specific class or leave it empty
    $bodyClass = 'courses';
    $baseURL = '/cyberrange';
} 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>LMS</title>

    <link href="{{ URL::to('css/bootstrap.min.css') }}">
    <link href="{{ URL::to('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/jquery-steps.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::to('vendor/jQuery-TE/jquery-te-1.4.0.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/multiform.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css" />
        
    <!-- Custom styles for this template -->
    <link href="{{ URL::to('css/dashboard.css') }}" rel="stylesheet">

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Google Analytics opt-out snippet added by Site Kit -->
    <script type="text/javascript">
    window["ga-disable-UA-118287266-1"] = true;
    </script>
    <script type="text/javascript">
    window["ga-disable-G-JE49KMQSTV"] = true;

    var baseUrl = "{{ url('/') }}";
    </script>
</head>

