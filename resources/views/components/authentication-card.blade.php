<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"  style="background-image: url(../assets/img/latestimg/svfcheader.jpg); background-repeat: no-repeat; background-size: cover;">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-8  shadow-md overflow-hidden sm:rounded-lg" style="background-color: rgba(209, 250, 229, 0.8);">
        {{ $slot }}
    </div>
</div>
