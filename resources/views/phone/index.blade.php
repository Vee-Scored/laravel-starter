<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div>


        <div class="relative overflow-x-auto max-w-4xl mx-auto px-3 sm:px-0">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone Number
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Person
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody class="counterParent">

                    @foreach ($phones as $phone)

                    <tr class="bg-white   border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 counter py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                         </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{$phone->Phone_Number}}
                        </th>

                        <td class="px-6 py-4">
                           {{$phone->people->Name}}
                        </td>
                        <td class="px-6 py-4 flex gap-3">

                            <a href="{{route('phone.edit',$phone->id)}}">
                                <button class="bg-blue-600 rounded px-2 py-1 text-white" type="submit">Edit</button>

                            </a>
                            <form method="POST" action="{{route("phone.destroy",$phone->id)}}">
                                @method("delete")
                                @csrf
                                <button class="bg-red-600 px-2 py-1 text-white rounded" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</body>
</html>
