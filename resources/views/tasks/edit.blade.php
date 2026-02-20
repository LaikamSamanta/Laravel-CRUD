<x-layout title="Rediģēt uzdevumu">

    <div class="min-h-screen bg-base-200 flex items-center justify-center px-4">
        
        <div class="card w-full max-w-2xl bg-base-100 shadow-xl border border-base-200">
            <div class="card-body p-8">

                <h1 class="text-3xl font-bold text-center mb-8">
                    Rediģēt uzdevumu
                </h1>

                <form method="POST" action="/tasks/{{ $task->id }}" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    {{-- Title --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">
                                Uzdevuma nosaukums
                            </span>
                        </label>
                        <input 
                            id="title"
                            name="title"
                            type="text"
                            value="{{ old('title', $task->title) }}"
                            class="input input-bordered w-full @error('title') input-error @enderror"
                        />
                        @error('title')
                            <span class="text-error text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">
                                Uzdevuma apraksts
                            </span>
                        </label>
                        <textarea 
                            id="description"
                            name="description"
                            rows="4"
                            class="textarea textarea-bordered w-full @error('description') textarea-error @enderror"
                        >{{ old('description', $task->description) }}</textarea>

                        @error('description')
                            <span class="text-error text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Completed Checkbox --}}
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-3">
                            <input 
                                type="checkbox" 
                                name="completed" 
                                value="1"
                                class="checkbox checkbox-primary"
                                {{ old('completed', $task->completed) ? 'checked' : '' }}
                            />
                            <span class="label-text">Atzīmēt kā pabeigtu</span>
                        </label>
                    </div>

                    {{-- Buttons --}}
                    <div class="card-actions justify-end pt-6 gap-3">
                        <a href="{{ route('tasks.index') }}" class="btn btn-ghost">
                            Atcelt
                        </a>

                        <button type="submit" class="btn btn-primary px-8">
                            Saglabāt izmaiņas
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</x-layout>
