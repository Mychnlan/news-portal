
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  @vite('resources/css/app.css')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet"></link>
</head>
<body class="">
  <section class="tw-bg-gray-50 tw-dark:tw-bg-gray-900 tw-h-screen">
    <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-px-6 tw-py-8 tw-mx-auto tw-md:tw-h-screen tw-lg:tw-py-0 tw-max-w-lg">
        <a href="#" class="tw-flex tw-items-center tw-mb-6 tw-text-2xl tw-font-semibold tw-text-gray-900 tw-dark:tw-text-white">
            <img class="tw-w-20 tw-h-20 tw-mr-2" src="{{asset('login.gif')}}" alt="logo">
        </a>
        <div class="tw-w-full tw-bg-white tw-rounded-lg tw-shadow tw-dark:tw-border tw-md:tw-mt-0 tw-sm:tw-max-w-md tw-xl:tw-p-0 tw-dark:tw-bg-gray-800 tw-dark:tw-border-gray-700">
            <div class="tw-p-6 tw-space-y-4 tw-md:tw-space-y-6 tw-sm:tw-p-8">
                <h1 class="tw-text-xl tw-font-bold tw-leading-tight tw-tracking-tight tw-text-gray-900 tw-md:tw-text-2xl tw-dark:tw-text-white">
                    Sign in to your account
                </h1>
                @include('message.alert')
                <form class="tw-space-y-4 tw-md:tw-space-y-6" action="{{ url('login/proses') }}" method="POST">
                  @csrf
                    <div>
                        <label for="username" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 tw-dark:tw-text-white">Your Username</label>
                        <input autofocus type="text" name="username" id="username" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-sm:tw-text-sm tw-rounded-lg tw-focus:tw-ring-primary-600 tw-focus:tw-border-primary-600 tw-block tw-w-full tw-p-2.5 tw-dark:tw-bg-gray-700 tw-dark:tw-border-gray-600 tw-dark:tw-placeholder-gray-400 tw-dark:tw-text-white tw-dark:tw-focus:tw-ring-blue-500 tw-dark:tw-focus:tw-border-blue-500 @error('username')
                        is-invalid
                      @enderror" required="" value="{{ old('username')}}">
                      @error('username')
                      <div class="tw-text-red-500 tw-text-sm tw-mt-2">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div>
                        <label for="password" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 tw-dark:tw-text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-sm:tw-text-sm tw-rounded-lg tw-focus:tw-ring-primary-600 tw-focus:tw-border-primary-600 tw-block tw-w-full tw-p-2.5 tw-dark:tw-bg-gray-700 tw-dark:tw-border-gray-600 tw-dark:tw-placeholder-gray-400 tw-dark:tw-text-white tw-dark:tw-focus:tw-ring-blue-500 tw-dark:tw-focus:tw-border-blue-500 @error('password')
                        is-invalid
                        @enderror" required="">
                        @error('password')
                        <div class="tw-text-red-500 tw-text-sm tw-mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="tw-flex tw-items-center tw-justify-between">
                        <a href="#" class="tw-text-sm tw-font-medium tw-text-sky-600 tw-hover:tw-underline tw-dark:tw-text-sky-500">Forgot password?</a>
                    </div>
                    <button type="submit" class="tw-w-full tw-text-white tw-bg-sky-600 tw-hover:tw-bg-sky-700 tw-focus:tw-ring-4 tw-focus:tw-outline-none tw-focus:tw-ring-sky-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-text-center tw-dark:tw-bg-sky-600 tw-dark:tw-hover:tw-bg-sky-700 tw-dark:tw-focus:tw-ring-sky-800">Sign in</button>
                    <p class="tw-text-sm tw-font-light tw-text-gray-500 tw-dark:tw-text-gray-400">
                        Don’t have an account yet? <a href="/register" class="tw-font-medium tw-text-sky-600 tw-hover:tw-underline tw-dark:tw-text-sky-500">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
