@extends('welcome')


@section('content')

@if (session('success'))

<div role="alert" class="relative block w-full px-4 py-4 my-4 text-base text-white bg-gray-900 rounded-lg font-regular"
    style="opacity: 1;">
    <div class="mr-12 ">{{ session('success') }}&nbsp;
    </div>
</div>


@endif

{{-- table --}}
<div
    class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
    <table class="w-full text-left table-auto min-w-max">
        <thead>
            <tr>

                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p
                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Photo
                    </p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p
                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Name
                    </p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p
                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Job
                    </p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p
                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Employed
                    </p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p
                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees1 as $item)


            <tr class="even:bg-blue-gray-50/50">
                <td class="p-4">
                    <img class="rounded-md w-20" src="images/{{ $item->photo  }}">

                </td>
                <td class="p-4">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        {{ $item->name }}
                    </p>
                </td>
                <td class="p-4">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        {{ $item->job }}
                    </p>
                </td>
                <td class="p-4">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        {{ $item->employed }}
                    </p>
                </td>
                <td class="p-4 flex">
                    <a href="{{ url('read/' . $item->id) }}"
                        class="middle none rounded-lg bg-blue-900 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        data-ripple-light="true">Read</a>
                        &nbsp;
                    <a href="{{ url('edit/' . $item->id) }}"
                        class="middle none rounded-lg bg-yellow-900 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        data-ripple-light="true">Edit</a>
                        &nbsp;
                    <form action="{{ route('employee.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="middle none rounded-lg bg-red-900 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-light="true">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if (count($employees1) == 0)
            <tr>
                <td >
                    <h3 class="text-xl ">
                        NO EMPLOYEE DATA FROM DATABASE
                    </h3>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>


@endsection