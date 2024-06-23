<!-- Main Navigation -->
<header class="tw-sticky tw-top-0 tw-z-50">
    <!-- Navbar -->
    <nav class="tw-flex-no-wrap tw-relative tw-flex w-full tw-items-center tw-justify-between tw-bg-[#f7f6f6] tw-py-2 tw-shadow-md tw-shadow-black/5 tw-dark:bg-neutral-600 tw-dark:tw-shadow-black/10 lg:tw-flex-wrap lg:tw-justify-start lg:tw-py-4">
        <div class="tw-flex w-full tw-flex-wrap tw-items-center tw-justify-between tw-px-3">
            <!-- Hamburger button for mobile view -->
            <button class="tw-block tw-border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden" type="button" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation" onclick="document.getElementById('navbarSupportedContent1').classList.toggle('tw-hidden');">
                <!-- Hamburger icon -->
                <span class="[&>svg]:w-7">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
                        <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                    </svg>
                </span>
            </button>

            <!-- Collapsible navigation container -->
            <div class="tw-hidden tw-flex-grow tw-basis-[100%] tw-items-center lg:!tw-flex lg:tw-basis-auto tw-transition tw-duration-10000" id="navbarSupportedContent1" style="transition: max-height 0.3s ease-out;">
                <!-- Logo -->
                <a class="tw-mb-4 tw-me-5 tw-ms-2 tw-mt-3 tw-flex tw-items-center tw-text-neutral-900 tw-hover:text-neutral-900 tw-focus:text-neutral-900 tw-dark:text-neutral-200 tw-dark:hover:text-neutral-400 tw-dark:focus:text-neutral-400 lg:tw-mb-0 lg:tw-mt-0" href="#">
                    <img src="{{asset('my_logo.jpeg')}}" class="tw-rounded-full" style="height: 30px" alt="TE Logo" loading="lazy" />
                </a>
                <!-- Left navigation links -->
                <ul class="tw-list-style-none tw-me-auto tw-flex tw-flex-col tw-ps-0 lg:tw-flex-row">
                    <li class="tw-mb-4 lg:tw-mb-0 lg:tw-pe-2">
                        <a class="tw-text-neutral-500 tw-transition tw-duration-200 tw-hover:text-neutral-700 tw-ease-in-out tw-focus:text-neutral-700 tw-disabled:text-black/30 tw-motion-reduce:tw-transition-none tw-dark:text-neutral-200 tw-dark:hover:text-neutral-300 tw-dark:focus:text-neutral-300 lg:tw-px-2 [&.tw-active]:text-black/90 tw-dark:[&.tw-active]:text-zinc-400" href="/">
                            Home
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Right elements -->
            <div class="tw-relative tw-flex tw-items-center">
                <div class="tw-relative" data-te-dropdown-ref data-te-dropdown-alignment="end">
                    <!-- Second dropdown trigger -->
                    <a class="tw-hidden-arrow tw-flex tw-items-center tw-whitespace-nowrap tw-transition tw-duration-150 tw-ease-in-out tw-motion-reduce:tw-transition-none" href="/login" id="dropdownMenuButton2" role="button" data-te-dropdown-toggle-ref aria-expanded="false">
                        <!-- User avatar -->
                        <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" class="tw-rounded-full" style="height: 25px; width: 25px" alt="" loading="lazy" />
                    </a>
                    <!-- Second dropdown menu -->
                    <ul class="tw-absolute tw-z-[1000] tw-float-left tw-m-0 tw-hidden tw-min-w-max tw-list-none tw-overflow-hidden tw-rounded-lg tw-border-none tw-bg-white tw-bg-clip-padding tw-text-left tw-text-base tw-shadow-lg tw-data-[te-dropdown-show]:block tw-dark:bg-neutral-700" aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                        <!-- Second dropdown menu items -->
                        <li>
                            <a class="tw-block tw-w-full tw-whitespace-nowrap tw-bg-transparent tw-px-4 tw-py-2 tw-text-sm tw-font-normal tw-text-neutral-700 tw-hover:bg-neutral-100 tw-active:text-neutral-800 tw-active:no-underline tw-disabled:pointer-events-none tw-disabled:bg-transparent tw-disabled:text-neutral-400 tw-dark:text-neutral-200 tw-dark:hover:bg-white/30" href="#" data-te-dropdown-item-ref>Action</a>
                        </li>
                        <li>
                            <a class="tw-block tw-w-full tw-whitespace-nowrap tw-bg-transparent tw-px-4 tw-py-2 tw-text-sm tw-font-normal tw-text-neutral-700 tw-hover:bg-neutral-100 tw-active:text-neutral-800 tw-active:no-underline tw-disabled:pointer-events-none tw-disabled:bg-transparent tw-disabled:text-neutral-400 tw-dark:text-neutral-200 tw-dark:hover:bg-white/30" href="#" data-te-dropdown-item-ref>Another action</a>
                        </li>
                        <li>
                            <a class="tw-block tw-w-full tw-whitespace-nowrap tw-bg-transparent tw-px-4 tw-py-2 tw-text-sm tw-font-normal tw-text-neutral-700 tw-hover:bg-neutral-100 tw-active:text-neutral-800 tw-active:no-underline tw-disabled:pointer-events-none tw-disabled:bg-transparent tw-disabled:text-neutral-400 tw-dark:text-neutral-200 tw-dark:hover:bg-white/30" href="#" data-te-dropdown-item-ref>Something else here</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
</header>
