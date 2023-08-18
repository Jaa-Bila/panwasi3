@extends('layouts.arvApp')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            @if (is_null($image))
                <p>Belum ada Data</P>
            @else
                <div class="flex items-center justify-center">
                    {{ $image->created_at }}
                </div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('/public/storage/camera/' . $image->image) }}" class="img-fluid img-thumbnail"
                        style="border: 1px solid #ddd;
                                                    border-radius: 4px;
                                                    padding: 5px;
                                                    width: 80vh;">
                </div>
            @endif
        </div>
    </div>
@endsection
