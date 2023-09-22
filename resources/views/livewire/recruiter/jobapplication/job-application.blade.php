<div>

    <div class="mt-2 mb-4">
        @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold text-xs">{{ session('message') }}</p>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
            <p class="font-bold text-xs">{{ session('error') }}</p>
        </div>
        @endif
    </div>

    <div class="flex">
        <div class="w-full shadow-md rounded my-6">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Applicant Name</th>
                        <th class="py-3 px-6 text-left">Applicant Email</th>
                        <th class="py-3 px-6 text-left">Applicant Contact No.</th>
                        <th class="py-3 px-6 text-left">Application Status</th>
                        <th class="py-3 px-6 text-center"></th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 bg-white text-sm font-light">
                    @if($jobapplications)
                    @foreach($jobapplications as $jobapplication)
                    <tr class="border-b border-gray-200 hover:bg-gray-100" wire:key="{{$jobapplication->id}}">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{$jobapplication->user->name}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{$jobapplication->user->email ?? '-'}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span>{{$jobapplication->user->contact_number ?? '-'}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center font-bold">
                                <span>{{$jobapplication->application_status ?? '-'}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="/recruiter/job/{{$jobapplication->id}}/applications/view" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>No book found</td>
                    </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>





</div>