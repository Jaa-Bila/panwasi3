@extends('layouts.guest')

@section('content')
    <!-- component -->
    @if (Session::has('success_hamil'))
        <div class="text-center py-2">
            <div class="p-2 bg-blue-600 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span onclick="closeAlert(event)"
                    class="flex rounded-full bg-amber-500 uppercase px-2 py-1 text-xs font-bold
                mr-3">New</span>
                <button onclick="closeAlert(event)"" class="font-semibold mr-2 text-left flex-auto">Pendaftaran Peserta Hamil
                    Berhasil !</button>
            </div>
            <script>
                function closeAlert(event) {
                    let element = event.target;
                    while (element.nodeName !== "BUTTON") {
                        element = element.parentNode;
                    }
                    element.parentNode.parentNode.removeChild(element.parentNode);
                }
            </script>
        </div>
    @endif
    @if (Session::has('success_rem'))
        <div class="bg-blue-300 text-center py-2">
            <div class="p-2 bg-blue-600 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span onclick="closeAlert(event)"
                    class="flex rounded-full bg-amber-500 uppercase px-2 py-1 text-xs font-bold
                mr-3">New</span>
                <span onclick="closeAlert(event)"" class="font-semibold mr-2 text-left flex-auto">Pendaftaran Peserta Remaja
                    Berhasil !</span>
            </div>
            <script>
                function closeAlert(event) {
                    let element = event.target;
                    while (element.nodeName !== "BUTTON") {
                        element = element.parentNode;
                    }
                    element.parentNode.parentNode.removeChild(element.parentNode);
                }
            </script>
        </div>
    @endif
    @if (Session::has('success_oat'))
        <div class="bg-blue-300 text-center py-2">
            <div class="p-2 bg-blue-600 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span onclick="closeAlert(event)"
                    class="flex rounded-full bg-amber-500 uppercase px-2 py-1 text-xs font-bold
                mr-3">New</span>
                <span onclick="closeAlert(event)"" class="font-semibold mr-2 text-left flex-auto">Pendaftaran Peserta OAT
                    Berhasil !</span>
            </div>
            <script>
                function closeAlert(event) {
                    let element = event.target;
                    while (element.nodeName !== "BUTTON") {
                        element = element.parentNode;
                    }
                    element.parentNode.parentNode.removeChild(element.parentNode);
                }
            </script>
        </div>
    @endif
    @if (Session::has('success_arv'))
        <div class="bg-blue-300 text-center py-2">
            <div class="p-2 bg-blue-600 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span onclick="closeAlert(event)"
                    class="flex rounded-full bg-amber-500 uppercase px-2 py-1 text-xs font-bold
                mr-3">New</span>
                <span onclick="closeAlert(event)"" class="font-semibold mr-2 text-left flex-auto">Pendaftaran Peserta ARV
                    Berhasil !</span>
            </div>
            <script>
                function closeAlert(event) {
                    let element = event.target;
                    while (element.nodeName !== "BUTTON") {
                        element = element.parentNode;
                    }
                    element.parentNode.parentNode.removeChild(element.parentNode);
                }
            </script>
        </div>
    @endif

    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-amber-300 to-amber-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">REGISTER PANWASI</h1>
                        <br>
                        <hr>
                    </div>

                    <div class="grid mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-xs font-medium text-center" id="myTab"
                            data-tabs-toggle="#myTabContent" role="tablist">
                            {{-- <li class="mr-2" role="test">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="test-tab"
                                    data-tabs-target="#test" type="button" role="tab" aria-controls="test"
                                    aria-selected="false">Test</button>
                            </li> --}}
                            <li class="mr-2" role="ibu-hamil">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="ibu-hamil-tab"
                                    data-tabs-target="#ibu-hamil" type="button" role="tab" aria-controls="ibu-hamil"
                                    aria-selected="false">Ibu Hamil</button>
                            </li>
                            <li class="mr-2" role="remaja">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="remaja-tab"
                                    data-tabs-target="#remaja" type="button" role="tab" aria-controls="remaja"
                                    aria-selected="false">Remaja</button>
                            </li>
                            <li class="mr-2" role="oat">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="oat-tab"
                                    data-tabs-target="#oat" type="button" role="tab" aria-controls="oat"
                                    aria-selected="false">OAT</button>
                            </li>
                            <li class="mr-2" role="arv">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="arv-tab"
                                    data-tabs-target="#arv" type="button" role="tab" aria-controls="arv"
                                    aria-selected="false">ARV</button>
                            </li>
                            <li class="mr-2" role="home">
                                <a href="{{ route('admin.home') }}" class="inline-block p-4 border-b-2 rounded-t-lg"
                                    id="arv-tab" data-tabs-target="#arv" type="button" role="tab" aria-controls="arv"
                                    aria-selected="false">Home</a>
                            </li>
                        </ul>
                    </div>

                    <div id="myTabContent">
                        {{-- <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="test" role="tabpanel"
                            aria-labelledby="test-tab">
                            @include('auth.passwords.test')
                        </div> --}}
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="ibu-hamil" role="tabpanel"
                            aria-labelledby="ibu-hamil-tab">
                            @include('auth.passwords.reg_hamil')
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="remaja" role="tabpanel"
                            aria-labelledby="remaja-tab">
                            @include('auth.passwords.reg_rem')
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="oat" role="tabpanel"
                            aria-labelledby="oat-tab">
                            @include('auth.passwords.reg_oat')
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="arv" role="tabpanel"
                            aria-labelledby="arv-tab">
                            @include('auth.passwords.reg_arv')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
