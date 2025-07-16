<thead class="bg-gray-50">
    <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sekolah</th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
    </tr>
</thead>
<tbody class="bg-white divide-y divide-gray-200">
    @forelse ($students as $student)
    <tr class="hover:bg-gray-50 transition duration-150">
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">
                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                        {{ substr($student->name, 0, 1) }}
                    </div>
                </div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">{{ $student->name }}</div>
                    <div class="text-sm text-gray-500">{{ $student->grade }}</div>
                </div>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->email }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->phone }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->school }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                {{ $student->grade }}
            </span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <div class="flex justify-end space-x-2">
                <a href="{{ route('students.show', $student->id) }}" 
                    class="text-blue-600 hover:text-blue-900 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="{{ route('students.edit', $student->id) }}" 
                    class="text-yellow-600 hover:text-yellow-900 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                        class="text-red-600 hover:text-red-900"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
            Tidak ada data siswa yang ditemukan.
        </td>
    </tr>
    @endforelse
</tbody>