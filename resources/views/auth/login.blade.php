<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Dashboard</title>

    <link rel="stylesheet" href="{{ asset('assets/css/theme-dashboard.css') }}" />
</head>
<body>
    <main>
        <!-- Main Content -->
        <div class="flex flex-col w-full  overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">

            <div class="justify-center items-center w-full card lg:flex max-w-md ">
                <div class=" w-full card-body">
                    <!-- form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- username -->
                        <div class="mb-4">
                            <label for="forEmail" class="block text-sm mb-2 text-gray-400">Email</label>
                            <input type="text" id="forEmail" name="email" class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text" autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                        </div>
                        <!-- password -->
                        <div class="mb-6">
                            <label for="forPassword" class="block text-sm  mb-2 text-gray-400">Password</label>
                            <input type="password" name="password" id="forPassword" class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text" required autocomplete="current-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                        </div>
                            <!-- button -->
                            <div class="grid my-6">
                                <button type="submit" class="btn py-[10px] text-base text-white font-medium hover:bg-blue-700">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
