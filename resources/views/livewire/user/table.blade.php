<div>
    <table class="w-full shadow-lg rounded">
        <thead>
        <tr class="text-left bg-green-500 border-b border-green-400 uppercase p-8">
            <th class="text-sm px-3 py-3">Name</th>
            <th class="hidden md:table-cell py-3 text-sm">Mobile</th>
            <th class="hidden md:table-cell py-3 text-sm">Email</th>
            <th class="hidden md:table-cell py-3 text-sm">Status</th>
{{--            <th class="hidden md:table-cell py-3 text-sm">Actions</th>--}}
        </tr>
        </thead>
        <tbody class="bg-green-400">

        @foreach ($users as $user)


            <tr class="accordion border-b border-green-400 hover:bg-green-300">
                <td class="flex inline-flex items-center px-3">
                        <span><img src="{{ $user->profile_photo_url }}" alt="" class="hidden mr-1 md:mr-2 md:inline-block h-8 w-8 rounded-full object-cover"></span>
                        <span class="py-3 w-40">
                            <p class="text-gray-800 text-sm">{{ $user->first_name }} {{ $user->last_name }}</p>
                            <p class="hidden md:table-cell text-xs font-medium">{{ $user->role}}</p>
                        </span>
                </td>
                <td class="hidden md:table-cell"><p class="text-sm font-medium">{{ $user->mobile ?? '' }}</p>
                <td class="hidden md:table-cell"><p class="text-sm font-medium">{{ $user->email ?? '' }}</p></td>
                <td class="hidden md:table-cell"><p class="text-sm font-medium">{{ $user->email_verified_at ? __u('models.user.verified') : __u('models.user.not_verified') }}</p></td>
{{--                <td class="hidden md:table-cell">--}}
{{--                    <a href="" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-blue-500">--}}
{{--                        {{__u('actions.model.edit')}}--}}
{{--                    </a>--}}
{{--                    <a href="" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-red-500">--}}
{{--                        {{__u('actions.model.delete')}}--}}
{{--                    </a>--}}
{{--                </td>--}}
            </tr>

            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
