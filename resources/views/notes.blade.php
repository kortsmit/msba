<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MSBA - Workshop Notes</title>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>

<nav class="flex items-center justify-between flex-wrap bg-grey-darkest p-6">
    <div class="flex items-center flex-no-shrink text-white mr-8">
        <span class="font-semibold text-xl tracking-tight">MSBA GitHub Workshop</span>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <a href="/" class="block mt-4 lg:inline-block lg:mt-0 no-underline text-grey-lighter hover:underline hover:text-white mr-4">
                Home
            </a>
            <a href="/notes" class="block mt-4 lg:inline-block lg:mt-0 text-blue-lighter hover:underline hover:text-white mr-4">
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
        <p class="p-1" style="max-width: 28rem;margin:0 auto;text-align: center">Master of Science in Business Analytics</p>
        <p class="p-2" style="max-width: 28rem;margin:0 auto;text-align: center">GitHub Workshop</p>
        <div class="line"></div>

        <p class="p-3" style="text-align: center">
            Below is absolutely everything we went through during our GitHub Workshop.
        </p>

        <div class="handler">
            <div class="block markdown-body">
                {!! $notes !!}
            </div>
        </div>
    </div>
</div>

</body>
</html>