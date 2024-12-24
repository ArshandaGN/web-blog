<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Tulisan
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Edit Data Tulisan
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Silakan melakukan perubahan data
                            </p>
                        </header>

                        <form method="post" action="" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div>
                                <x-input-label for="title" value="Title" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title',$data->title) }}"/>
                            </div>
                            
                            <div>
                                <x-input-label for="decription" value="Description" />
                                <x-text-input id="decription" name="decription" type="text" class="mt-1 block w-full" value="{{ old('decription',$data->decription)/>
                            </div>
                            
                            <div>
                                <x-input-label for="file-input" value="Thumbnail" />
                                <input type="file" class="w-full border border-gray-300 rounded-sm">    
                            </div>
                            <div>
                                    <input id="x" type="hidden" value="{!! old('content',$data->content) !!}" name="content">
                                    <trix-editor input="x" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm min-h-80 "></trix-editor>
                            </div>
                            
                            <div>
                                <select name="status">
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm
                                    <option value="draft" {{ (old('status',$data->status)=='draft')?'selected':''  }}>Simpan Sebagai Draft</option>
                                    <option value="publish" {{ (old('status',$data->status)=='publish')?'selected':''  }}>Publish</option>
                                
                                </select>
                            </div>
                            <div class="flex items-center gap-4">
                                <a href="{{ route('member.blogs.index') }}">
                                    <x-secondary-button>Kembali</x-secondary-button>
                                </a>
                                <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>