<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" style="border-radius: 10px;" href="{{asset('my_logo.jpeg')}}" />
    <link rel="icon" type="image/png" href="{{asset('my_logo.jpeg')}}" style="border-radius: 10px; />
    <title>Dashboard</title>
  @include('layout.partials.link')
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    @include('layout.partials.header')
    @include('message.alert')
      <!-- cards -->
      @yield('content')
      <!-- end cards -->
     
  @include('layout.partials.footer')
  </body>
  @include('layout.partials.script')
</html>
