
<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg:gray-800 overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <input wire:model.live.debounce.300ms="search" type="text" class="bg-gray-50 border-gray-300" placeholder="search" required="">
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase">
                            <tr>
                                <th wire:click="doSort('name')" class="flex items-center px-4 py-3">
                                    <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="name"/>
                                </th>
                                <th wire:click="doSort('domain')" class="px-4 py-3">
                                    <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="domain"/>
                                </th>
                                <th wire:click="doSort('language')" class="px-4 py-3">
                                    <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="language"/>
                                </th>
                                <th wire:click="doSort('country')" class="px-4 py-3">
                                    <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="country"/>
                                </th>
                                <th  class="px-4 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr wire:key='{{$project->id}}' class="border-b dark:border-gray-700">
                                <th class="px-4 py-3">{{$project->name}}</th>
                                <th class="px-4 py-3">{{$project->domain}}</th>
                                <th class="px-4 py-3">{{$project->language}}</th>
                                <th class="px-4 py-3">{{$project->country}}</th>
                                <th class="px-4 py-3">
                                    <button
                                    type="button"
                                    title = "Delete"
                                    wire:click="deleteProject({{$project->id}})"
                                    wire:confirm="You are about to delete {{$project->name}}. Are you sure?"
                                    >
                                    <x-eos-delete class="w-4 h-4" />
                                    </button>

                                    <button
                                    type="button"
                                    title="Edit"
                                    wire:click="editProject({{$project->id}})"
                                    >
                                    <x-eos-edit />
                                    </button>

                                </th>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="py-4 px-3">
                    <div class="flex">
                        <div class="flex space-x-4 itmes-center mb-3">
                            <label for="">Per page</label>
                            <select name="" id="" wire:model.live="perPage">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>
                    {{$projects->links()}}
                </div>
            </div>
        </div>
    </section>
</div>
