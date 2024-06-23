<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  @vite('resources/css/app.css')
  <style>
/* styles.css */

/* Hide scrollbar arrows in WebKit-based browsers */
.custom-scrollbar::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background:#f1f1f1;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 50px;
}

/* Hover state for scrollbar thumb */
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* Hide scrollbar arrows */
.custom-scrollbar::-webkit-scrollbar-button {
    display: none;
}

/* Firefox scrollbar styles */
.custom-scrollbar {
    scrollbar-width: thin;
    scrollbar-color: #888 #f1f1f1;
}

  </style>
</head>
<body class="hold-transition register-page">
  <section class="tw-bg-gray-50 tw-dark:tw-bg-gray-900 tw-h-screen">
    <div class="tw-flex tw-flex-col tw-items-center tw-justify-center tw-px-6 tw-py-8 tw-mx-auto tw-max-w-lg tw-h-screen tw-lg:tw-py-0">
        <a href="#" class="tw-flex tw-items-center tw-mb-6 tw-text-2xl tw-font-semibold tw-text-gray-900 tw-dark:tw-text-white">
            <img class="tw-w-8 tw-h-8 tw-mr-2 tw-rounded-full" src="{{asset('my_logo.jpeg')}}" alt="logo">
            Vynews.com    
        </a>
        <div class="tw-w-full tw-bg-white tw-rounded-lg tw-shadow tw-dark:tw-border tw-md:tw-mt-0 tw-sm:tw-max-w-md tw-xl:tw-p-0 tw-dark:tw-bg-gray-800 tw-dark:tw-border-gray-700 tw-h-full tw-overflow-y-auto custom-scrollbar">
            <div class="tw-p-6 tw-space-y-4 tw-md:tw-space-y-6 tw-sm:tw-p-8">
                <h1 class="tw-text-xl tw-font-bold tw-leading-tight tw-tracking-tight tw-text-gray-900 tw-md:tw-text-2xl tw-dark:tw-text-white">
                    Create an account
                </h1>
                  <form class="tw-space-y-4 tw-md:tw-space-y-6" action="/register/proses" method="POST">
                    @csrf
                      <div>
                          <label for="email" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 tw-dark:tw-text-white">Your email</label>
                          <input type="email" value="{{ old('email')}}" name="email" id="email" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-sm:tw-text-sm tw-rounded-lg tw-focus:tw-ring-primary-600 tw-focus:tw-border-primary-600 tw-block tw-w-full tw-p-2.5 tw-dark:tw-bg-gray-700 tw-dark:tw-border-gray-600 tw-dark:tw-placeholder-gray-400 tw-dark:tw-text-white tw-dark:tw-focus:tw-ring-blue-500 tw-dark:tw-focus:tw-border-blue-500" placeholder="name@company.com" required="">
                      </div>
                      <div>
                          <label for="username" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 tw-dark:tw-text-white">Username</label>
                          <input type="text" value="{{ old('username')}}" name="username" id="username" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-sm:tw-text-sm tw-rounded-lg tw-focus:tw-ring-primary-600 tw-focus:tw-border-primary-600 tw-block tw-w-full tw-p-2.5 tw-dark:tw-bg-gray-700 tw-dark:tw-border-gray-600 tw-dark:tw-placeholder-gray-400 tw-dark:tw-text-white tw-dark:tw-focus:tw-ring-blue-500 tw-dark:tw-focus:tw-border-blue-500" required="">
                      </div>
                      <div>
                          <label for="fullname" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 tw-dark:tw-text-white">Fullname</label>
                          <input type="text" value="{{ old('fullname')}}" name="fullname" id="fullname" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-sm:tw-text-sm tw-rounded-lg tw-focus:tw-ring-primary-600 tw-focus:tw-border-primary-600 tw-block tw-w-full tw-p-2.5 tw-dark:tw-bg-gray-700 tw-dark:tw-border-gray-600 tw-dark:tw-placeholder-gray-400 tw-dark:tw-text-white tw-dark:tw-focus:tw-ring-blue-500 tw-dark:tw-focus:tw-border-blue-500" required="">
                      </div>
                      <div>
                          <label for="password" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 tw-dark:tw-text-white">Password</label>
                          <input type="password" name="password" id="password" placeholder="••••••••" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-sm:tw-text-sm tw-rounded-lg tw-focus:tw-ring-primary-600 tw-focus:tw-border-primary-600 tw-block tw-w-full tw-p-2.5 tw-dark:tw-bg-gray-700 tw-dark:tw-border-gray-600 tw-dark:tw-placeholder-gray-400 tw-dark:tw-text-white tw-dark:tw-focus:tw-ring-blue-500 tw-dark:tw-focus:tw-border-blue-500" required="">
                          @error('password')
                          <div class="tw-text-red-500 tw-text-sm tw-mt-2">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                      <div>
                          <label for="password_confirmation" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 tw-dark:tw-text-white">Confirm password</label>
                          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-sm:tw-text-sm tw-rounded-lg tw-focus:tw-ring-primary-600 tw-focus:tw-border-primary-600 tw-block tw-w-full tw-p-2.5 tw-dark:tw-bg-gray-700 tw-dark:tw-border-gray-600 tw-dark:tw-placeholder-gray-400 tw-dark:tw-text-white tw-dark:tw-focus:tw-ring-blue-500 tw-dark:tw-focus:tw-border-blue-500" required="">
                      </div>
                      <div class="tw-flex tw-items-start">
                          <div class="tw-flex tw-items-center tw-h-5">
                              <input id="terms" aria-describedby="terms" type="checkbox" class="tw-w-4 tw-h-4 tw-border tw-border-gray-300 tw-rounded tw-bg-gray-50 tw-focus:tw-ring-3 tw-focus:tw-ring-primary-300 tw-dark:tw-bg-gray-700 tw-dark:tw-border-gray-600 tw-dark:tw-focus:tw-ring-primary-600 tw-dark:tw-ring-offset-gray-800" required="">
                          </div>
                          <div class="tw-ml-3 tw-text-sm">
                              <label for="terms" class="tw-font-light tw-text-gray-500 tw-dark:tw-text-gray-300">I accept the <a class="tw-font-medium tw-text-sky-950 tw-hover:tw-underline tw-dark:tw-text-primary-500" href="#">Terms and Conditions</a></label>
                          </div>
                      </div>
                      <button type="submit" class="tw-w-full tw-text-white tw-bg-sky-950 tw-hover:tw-bg-primary-700 tw-focus:tw-ring-4 tw-focus:tw-outline-none tw-focus:tw-ring-primary-300 tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-text-center tw-dark:tw-bg-primary-600 tw-dark:tw-hover:tw-bg-primary-700 tw-dark:tw-focus:tw-ring-primary-800">Create an account</button>
                      <p class="tw-text-sm tw-font-light tw-text-gray-500 tw-dark:tw-text-gray-400">
                          Already have an account? <a href="/login" class="tw-font-medium tw-text-primary-600 tw-hover:tw-underline tw-dark:tw-text-primary-500">Login here</a>
                      </p>
                  </form>
            </div>
        </div>
    </div>
</section>


</body>
</html>
