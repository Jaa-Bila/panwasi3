@extends('layouts.app')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="flex p-4 items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <livewire:oat-list />
            </div>
        </div>
    </div>
@endsection
