<x-layout>
    <x-slot:header>
        Daftar Kontak
    </x-slot:header>
    <button type="button" onclick="window.location.href='{{ route('kontak.create') }}'" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Kontak</button>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telepon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Lahir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kontaks as $kontak)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->index+1 }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $kontak->nama }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $kontak->alamat }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $kontak->telepon }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $kontak->tgllahir }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($kontak->gender==1)
                            Pria
                        @else
                            Wanita
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex">
                            {{-- <a href="{{ route('kontak.index','id='.$kontak->id) }}" class="flex font-medium text-blue-600 dark:text-blue-500 hover:underline mx-1">Pendidikan</a>|  --}}
                            <a href="{{ route('kontak.edit',$kontak->id) }}" class="flex font-medium text-blue-600 dark:text-blue-500 hover:underline mx-1">Edit</a>| 
                            <form action="{{ route('kontak.destroy',$kontak->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="flex font-medium text-blue-600 dark:text-blue-500 hover:underline ml-1" value="Delete">
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>