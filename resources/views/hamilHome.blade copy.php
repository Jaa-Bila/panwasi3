@extends('layouts.userApp')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="flex items-center justify-center mb-4 mt-6">
            @if ($message = Session::get('success'))
                <div class="text-center py-2">
                    <div class="p-2 bg-blue-600 items-center text-blue-100 leading-none lg:rounded-full flex lg:inline-flex"
                        role="alert">
                        <span onclick="closeAlert(event)"
                            class="flex rounded-full bg-amber-500 uppercase px-2 py-1 text-xs font-bold
                    mr-3">New</span>
                        <button onclick="closeAlert(event)"" class="font-semibold mr-2 text-left flex-auto">
                            {{ $message }}</button>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            <form method="POST" action="{{ route('hamil.attd') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="flex items-center justify-center">
                    <label for="form-file"
                        class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                            <path fill-rule="evenodd"
                                d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                clip-rule="evenodd" />
                        </svg>
                        Ambil Gambar</label>
                    <input id="form-file" class="hidden" type="file" name="image" accept="image/*" capture>
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 mr-2 mb-2"
                        style="margin-top:10px">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            @if (is_null($latestimg))
                <p>Belum ada Data</P>
            @else
                <div class="flex items-center justify-center">
                    {{ $latestimg->created_at }}
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('/public/storage/camera/' . $latestimg->image) }}" class="img-fluid img-thumbnail"
                        style="border: 1px solid #ddd;
                                                    border-radius: 4px;
                                                    padding: 5px;
                                                    width: 80vh;">
                </div>
            @endif
        </div>
    </div>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            <div class="grid grid-cols-6 gap-4 mb-4">
                @for ($i = 1; $i <= $days; $i++)
                    @if ($absens[$i] == false)
                        <div class="flex items-center justify-center rounded bg-red-600 h-12">
                            <a class="text-2xl text-gray-400 dark:text-gray-500">{{ $i }}</a>
                        </div>
                    @else
                        <div class="flex items-center justify-center rounded bg-lime-300 h-12">
                            <a class="text-2xl text-gray-400 dark:text-gray-500">{{ $i }}</a>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
    </div>
    <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>
        </div>
    </div>
    </div>
    </div>
@endsection
