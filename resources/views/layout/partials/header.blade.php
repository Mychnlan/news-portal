<!-- sidenav  -->
<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
      <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700">
        <img src="{{asset('/')}}my_logo.jpeg" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8 tw-rounded-lg" alt="main_logo" />
        <img src="{{asset('/')}}my_logo.jpeg" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8 tw-rounded_lg" alt="main_logo" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand"><strong>{{Auth::user()->role}}</strong></span>
      </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
      <ul class="flex flex-col pl-0 mb-0">
        @php
    $role = Auth::user()->role;
@endphp

<li class="mt-0.5 w-full">
  <a class="dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors py-2.7 {{ (request()->is('admin/dashboard')) ? ' bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}" href="{{ ($role === 'author') ? '/dashboard' : '/admin/dashboard' }}">
    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
      <i class="relative top-0 text-sm leading-normal text-blue-500 fa-solid fa-gauge"></i>
    </div>
    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
  </a>
</li>

@if($role !== 'author')
<li class="mt-0.5 w-full">
  <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ (request()->is('admin/categories')) ? ' bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}" href="/admin/categories">
    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
      <i class="relative top-0 text-sm leading-normal text-orange-500 fa-solid fa-list"></i>
    </div>
    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Category</span>
  </a>
</li>
@endif

<li class="mt-0.5 w-full">
  <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ (request()->is('admin/articles')) ? ' bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}" href="{{ ($role === 'author') ? '/article' : '/admin/articles' }}">
    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
      <i class="relative top-0 text-sm leading-normal text-orange-500 fa-solid fa-newspaper"></i>
    </div>
    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Article</span>
  </a>
</li>

@if($role !== 'author')
<li class="mt-0.5 w-full">
  <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ (request()->is('admin/tags')) ? ' bg-blue-500/13 font-semibold text-slate-700 rounded-lg' : '' }}" href="/admin/tags">
    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
      <i class="relative top-0 text-sm leading-normal text-emerald-500 fa-solid fa-tag"></i>
    </div>
    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Tags</span>
  </a>
</li>

<li class="mt-0.5 w-full">
  <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="/admin/user-control">
    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
      <i class="fa-solid fa-user-group relative top-0 text-sm leading-normal text-cyan-500"></i>
    </div>
    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data User</span>
  </a>
</li>
@endif


        <li class="w-full mt-4">
          <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages</h6>
        </li>

        <li class="mt-0.5 w-full">
          <a id="logoutButton" class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="/logout">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-collection"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Log Out</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <!-- end sidenav -->

  <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    <!-- Navbar -->
    <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
      <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
          <!-- breadcrumb -->
          <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
              <a class="text-white opacity-50" href="javascript:;">Pages</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">{{Request::path()}}</li>
          </ol>
          <h6 class="mb-0 font-bold text-white capitalize">{{Request::path()}}</h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
          <div class="flex items-center md:ml-auto md:pr-4">
          </div>
          <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <li class="flex items-center">
              <a href="./pages/sign-in.html" class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                <i class="fa fa-user sm:mr-1"></i>
                <span class="hidden sm:inline">{{Auth::user()->full_name}}</span>
              </a>
            </li>
            <li class="flex items-center pl-4 xl:hidden">
              <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                <div class="w-4.5 overflow-hidden">
                  <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                </div>
              </a>
            </li>
            <li class="flex items-center px-4">
              <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                <!-- fixed-plugin-button-nav  -->
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- end Navbar -->