<div class="divide-y divide-gray-200">
    <form method="POST" action="{{ route('admin.regoat') }}">

        {{ csrf_field() }}
        <div class="py-4 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="inputName">Name</label>
                    <input type="text" name="name" id="inputName"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') is-invalid @enderror"
                        placeholder="Name">

                    <!-- Way 2: Display Error Message -->
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="nik">NIK</label>
                    <input type="text" name="nik" id="nik"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror"
                        placeholder="nik@hamil">

                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @endif
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="Alamat">Alamat</label>
                        <input type="text" name="alamat" id="Alamat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('alamat') is-invalid @enderror"
                            placeholder="Alamat">

                        <!-- Way 2: Display Error Message -->
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="Notel">Nomor
                            Desa</label>
                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="desa">

                            <option>Desa</option>

                            @foreach ($desas as $desa)
                                <option value="{{ $desa->id }}">
                                    {{ $desa->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="Notel">Nomor
                            Telepon</label>
                        <input type="text" name="notel" id="Notel"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('notel') is-invalid @enderror"
                            placeholder="08123456789">

                        <!-- Way 2: Display Error Message -->
                        @error('notel')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="start">Tanggal
                            Mulai Pengobatan</label>
                        <input type="date" name="start" id="start"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="inputPassword">Password</label>
                    <input type="password" name="password" id="inputPassword"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror"
                        placeholder="Password">

                    <!-- Way 3: Display Error Message -->
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="divide-y divide-gray-200">
                    <div class="py-4 text-base leading-6 space-y-2 text-gray-700 sm:text-sm sm:leading-7">
                        <div class="relative">
                            <button
                                class="transition duration-75 hover:bg-cyan-300 bg-blue-500 text-white rounded-md px-2 py-1">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
