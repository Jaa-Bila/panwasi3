@extends('layouts.arvApp')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="flex items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <div class="col-span-full bg-white shadow-lg rounded-sm border border-slate-200">
                    <header class="px-5 py-4 border-b border-slate-100">
                        <h2 class="font-semibold text-slate-800">{{ $partch->name }}</h2>
                    </header>
                    <div class="p-12">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-180 justify-center">
                                <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm flex justify-center">
                                    <tr>
                                        <th class="p-4">
                                            <div class="font-semibold text-left">Profile</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm font-medium divide-y divide-slate-100 content-center">
                                    <tr>
                                        <td class="p-4 flex justify-center">
                                            <div class="text-slate-800 font-bold">Nama </div>
                                        </td>
                                        <td class="p-4 flex justify-center">
                                            <div class="text-slate-800">{{ $partch->name }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-4 flex justify-center">
                                            <div class="text-slate-800 font-bold">NIK</div>
                                        </td>
                                        <td class="p-4 flex justify-center">
                                            <div class="text-slate-800">{{ $partch->email }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-4 flex justify-center">
                                            <div class="text-slate-800 font-bold">Alamat</div>
                                        </td>
                                        <td class="p-4 flex justify-center">
                                            <div class="text-slate-800">{{ $partch->alamat }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-4 flex justify-center">
                                            <div class="text-slate-800 font-bold">Nomor Telepon</div>
                                        </td>
                                        <td class="p-4 flex justify-center">
                                            <a href="https://wa.me/{{ $partch->notel }}"
                                                target="_blank">{{ $partch->notel }}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            <div class="grid grid-cols-6 gap-4 mb-4">
                @for ($i = 1; $i <= $days; $i++)
                    @if ($list_hari[$i] == false)
                        <div class="flex items-center justify-center rounded bg-red-600 h-12">
                            <a class="text-2xl text-gray-400 dark:text-gray-500">{{ $i }}</a>
                        </div>
                    @elseif ($list_hari[$i] == true)
                        <div class="flex items-center justify-center rounded bg-lime-500 h-12">
                            <a href="/admin/arv/attd/show/{{ $user_id }}/{{ $i }}"
                                class="text-2xl text-white">{{ $i }}</a>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
@endsection
