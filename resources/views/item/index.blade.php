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
            <div class="py-3 flex gap-3 items-center justify-center px-1 rounded">
                <form method="GET" action="{{route("item.search")}}" >

                    <div class="flex">
                        <input name="query" class="rounded ring-0 focus:ring-0 rounded-r-none" type="search">
                        <button type="submit" class="bg-blue-600 rounded rounded-l-none text-white text-sm px-2">Search</button>
                    </div>

                </form>
                <form method="GET" action="{{route("item.index")}}" >

                    <button type="submit" class="bg-yellow-600 py-3 rounded  text-white text-sm px-3">Back</button>

                </form>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody class="counterParent">

                    @foreach ($items as $item)

                    <tr class="bg-white   border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 counter py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                         </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{$item->Name}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->Stock}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->Price}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->Description}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->category->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->status}}
                        </td>
                        <td class="px-6 py-4 flex gap-3">
                            <form method="post" action="{{route("item.edit",$item->id)}}">

                                @method('get')
                                <button class="bg-blue-600 rounded px-2 py-1 text-white" type="submit">Edit</button>
                            </form>

                            <form method="POST" action="{{route("item.destroy",$item->id)}}">
                                @method("delete")
                                @csrf
                                <button class="bg-red-600 px-2 py-1 text-white rounded" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>

            <div>
                {{$items->links("pagination::tailwind")}}
            </div>
        </div>

    </div>
</body>
</html>
