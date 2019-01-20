<meta charset="utf-8">
<meta name="description" content="{{ settings()->site_description }}">
<meta name="keywords" content="{{ settings()->site_keywords }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title', config('app.name', 'Laravel'))</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">

<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
<style type="text/css">	
#main-menu {
  box-shadow: 0 0 30px 0 #df003a;
  background-color: #df003a;
}
</style>
