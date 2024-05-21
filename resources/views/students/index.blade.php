<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-4">
                    <a href="{{ route('students.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create
                    </a>
                </div>

                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-2 px-4 text-center">ID</th>
                            <th class="py-2 px-4 text-center">Name</th>
                            <th class="py-2 px-4 text-center">Age</th>
                            <th class="py-2 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($students as $student)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="border py-2 px-4 text-center">{{ $student->id }}</td>
                            <td class="border py-2 px-4 text-center">{{ $student->name }}</td>
                            <td class="border py-2 px-4 text-center">{{ $student->age }}</td>

                            <td class="border py-2 px-4 text-center">
                                <div class="flex justify-center">
                                    <a href="{{ route('students.edit', $student->id) }}" class="bg-violet-500 dark:dg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 py-2 px-4 rounded mr-2 text-white rounded" >Edit</a>
                                    <button type="button" onclick="confirmDelete('{{ $student->id }}')" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">Eliminar</button>
                                </div>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>

<Script>
    function confirmDelete(id) {
        alertify.confirm("This is a confirm dialog.", function (e) {
            if(e) {
                let form = document.createElement('form')
                form.method = 'POST',
                form.action = ` /students/${id} `,
                form.innerHTML = '@csrf @method("DELETE")'
                document.body.appendChild(form)
                form.submit()
            }else{
                return false
            }
        })

    }
</Script>