<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MSBA') }}</title>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>

<nav class="flex items-center justify-between flex-wrap bg-grey-darkest p-6">
    <div class="flex items-center flex-no-shrink text-white mr-8">
        <span class="font-semibold text-xl tracking-tight">MSBA GitHub Workshop</span>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <a href="/" class="block mt-4 lg:inline-block lg:mt-0 text-blue-lighter text-grey-lighter hover:underline hover:text-white mr-4">
                Home
            </a>
            <a href="/notes" class="block mt-4 lg:inline-block lg:mt-0 no-underline text-grey-lighter hover:underline hover:text-white mr-4">
                Workshop Notes
            </a>
        </div>
        <div>
            <a href="https://github.com/kortsmit/msba" class="inline-block text-sm px-4 py-2 no-underline leading-none border rounded text-white border-white hover:border-transparent hover:text-grey-darkest hover:bg-white mt-4 lg:mt-0">GitHub</a>
        </div>
    </div>
</nav>

<div class="ex-17">
    <div class="upper">
        <p class="p-1 text-center" style="max-width: 28rem;margin:0 auto;">Master of Science in Business Analytics</p>
        <p class="p-2 text-center" style="max-width: 28rem;margin:0 auto;">GitHub Workshop</p>
        <div class="line"></div>

        <p class="p-3" style="text-align: center">
            Please do not hesitate to reach out with any questions!
        </p>

        <div class="handler">
            <div class="block markdown-body">
                <h1>Workshop Notes</h1>
                <p>Take a look at <a href="/notes">all of the workshop notes</a>!</p>

                <h1>Questions</h1>
                <p>Here are a few ways to get reach me:</p>
                <ol>
                    <li>
                        <a href="mailto:tim@kortsmit.com">tim@kortsmit.com</a>
                    </li>
                    <li>
                        <a href="https://github.com/kortsmit">GitHub</a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/kortsmit/">LinkedIn</a>
                    </li>
                    <li>
                        <a href="https://twitter.com/kortsmit">Twitter</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

</body>
</html>