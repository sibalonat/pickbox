<div>
    <div class="flex flex-wrap items-center justify-between mb-4">

        <div class="flex-grow order-3 mt-4 md:mr-3 md:mt-0 md:order-1">

            <input type="search" placeholder="search files" class="w-full h-12 px-3 border-2 rounded-lg"
                wire:model="query">

        </div>
        <div class="order-2">
            <div>
                <button class="h-12 px-6 mr-2 bg-gray-200 rounded-lg" wire:click="$set('creatingNewFolder', true)">
                    New Folder
                </button>
                <button class="h-12 px-6 mr-2 font-bold text-white bg-blue-600 rounded-lg"
                    wire:click="$set('showingFileUpload', true)">
                    Upload Files
                </button>
            </div>
        </div>
    </div>

    <div class="border-2 border-gray-200 rounded-lg">
        <div class="px-3 py-2">
            <div class="flex items-center">
                @if ($this->query)
                <div class="font-bold text-gray-400">
                    Found {{$this->query->results->count()}} {{Str::plural('result', $this->results->count())}}. <button class="font-bold text-blue-700" wire:click="$set('query', null)" href="">Clear Search</button>
                </div>
                @else
                    @foreach ($ancestors as $ancestor)
                        <a href="{{ route('files', ['uuid' => $ancestor->uuid]) }}"
                            class="font-bold text-gray-400">{{ $ancestor->objectable->name }}</a>
                        @if (!$loop->last)
                            <svg class="w-5 h-5 mx-1 text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

        <div class="overflow-auto">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-3 py-2 text-left">Name</th>
                        <th class="w-2/12 px-3 py-2 text-left">Size</th>
                        <th class="w-2/12 px-3 py-2 text-left">Created At</th>
                        <th class="w-2/12 p-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($creatingNewFolder)
                        <tr class="border-b-2 border-gray-100 hover:bg-gray-100">
                            <td class="p-3">
                                <form class="flex items-center" wire:submit.prevent="createFolder">
                                    <input type="text" class="w-full h-10 px-3 mr-2 border-2 border-gray-200 rounded-lg"
                                        wire:model="newFolderState.name">
                                    <button type="submit"
                                        class="h-10 px-6 mr-2 text-white bg-blue-600 rounded-lg">Create</button>
                                    <button wire:click="$set('creatingNewFolder', false)"
                                        class="h-10 px-6 mr-2 bg-gray-200 rounded-lg">Cancel</button>
                                </form>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                    @foreach ($this->results as $child)
                        <tr class="border-gray-100 @if (!$loop->last) border-b-2 @endif hover:bg-gray-100">
                            <td class="flex items-center px-3 py-2">
                                @if ($child->objectable_type === 'file')
                                    <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                @endif

                                @if ($child->objectable_type === 'folder')
                                    <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                        </path>
                                    </svg>
                                @endif

                                @if ($renamingObject === $child->id)
                                    <form class="flex items-center flex-grow ml-2" wire:submit.prevent="renameObject">
                                        <input type="text"
                                            class="w-full h-10 px-3 mr-2 border-2 border-gray-200 rounded-lg"
                                            wire:model="renamingObjectState.name">
                                        <button type="submit"
                                            class="h-10 px-6 mr-2 text-white bg-blue-600 rounded-lg">Rename</button>
                                        <button wire:click="$set('renamingObject', null)"
                                            class="h-10 px-6 mr-2 bg-gray-200 rounded-lg">Cancel</button>
                                    </form>

                                @else
                                    @if ($child->objectable_type === 'file')
                                        <a href="{{route('file.download', $child->objectable)}}" class="flex-grow p-2 font-bold text-blue-700">
                                            {{ $child->objectable->name }}
                                        </a>
                                    @endif
                                    @if ($child->objectable_type === 'folder')
                                        <a href="{{ route('files', ['uuid' => $child->uuid]) }}"
                                            class="flex-grow p-2 font-bold text-blue-700">
                                            {{ $child->objectable->name }}
                                        </a>
                                    @endif

                                @endif

                            </td>
                            <td class="px-3 py-2">
                                @if ($child->objectable_type === 'file')
                                    {{ $child->objectable->sizeForHumans() }}
                                @else
                                    &mdash;
                                @endif
                            </td>
                            <td class="px-3 py-2">{{ $child->created_at }}</td>
                            <td class="px-3 py-2">
                                <div class="flex items-center justify-end">
                                    <ul class="flex items-center">
                                        <li class="mr-4">
                                            <button class="font-bold text-gray-400"
                                                wire:click="$set('renamingObject', {{ $child->id }})">Rename</button>
                                        </li>
                                        <li>
                                            {{ $confirmingObjectDeletion }}
                                            <button class="font-bold text-red-400"
                                                wire:click="$set('confirmingObjectDeletion', {{ $child->id }})">Delete</button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($this->results->count() === 0)
            <div class="p-3 text-gray-700">This Folder is Empty</div>
        @endif
    </div>

    <x-jet-dialog-modal wire:model="confirmingObjectDeletion">
        <x-slot name="title">
            {{ __('Delete') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Are you sure you want to delete this?') }}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingObjectDeletion', null)" wire:loading.attr="disabled">
                {{ __('Never Mind') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" wire:click="deleteObject">
                {{ __('Delete') }}
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>

    <x-jet-modal wire:model="showingFileUpload">
        <div wire:ignore class="m-3 border-2 border-dashed" x-data="{
            initFilepond() {
                const pond = FilePond.create(this.$refs.filepond, {
                    onprocessfile: (error, file) => {
                        pond.removeFile(file.id)
                        if (pond.getFiles().length === 0) {
                            @this.set('showingFileUpload', false)
                        }
                    },
                    server: {
                        process: (fieldName, file, metdata, load, error, progress, abort, transfer, options) => {
                            @this.upload('upload', file, load, error, progress)
                        }
                    }
                })
            }
        }" x-init="initFilepond">
            <div>
                <input type="file" x-ref="filepond" multiple>
            </div>
        </div>
    </x-jet-modal>
</div>
