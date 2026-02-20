<x-layout title="Reģistrēšanās forma">

    <div class="min-h-screen bg-base-200 flex items-center justify-center px-4">
        
        <div class="card w-full max-w-2xl bg-base-100 shadow-xl border border-base-200">
            <div class="card-body p-8">

                <h1 class="text-3xl font-bold text-center mb-8">
                    Izveido jaunu uzdevumu
                </h1>

                <form method="POST" action="/tasks" class="space-y-6">
                    @csrf

                    {{-- Uzdevuma nosaukums --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Uzdevuma nosaukums</span>
                        </label>
                        <input 
                            id="title" 
                            name="title" 
                            type="text" 
                            value="{{ old('title') }}"
                            class="input input-bordered w-full @error('title') input-error @enderror" 
                        />
                        <x-tasks.error name="title" />
                    </div>

                    {{-- Uzdevuma apraksts --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Uzdevuma apraksts</span>
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            class="textarea textarea-bordered w-full @error('description') textarea-error @enderror"
                        >{{ old('description') }}</textarea>
                        <x-tasks.error name="description" />
                    </div>
                            

                    {{-- Submit --}}
                    <div class="card-actions justify-end pt-4">
                        <button type="submit" class="btn btn-primary px-8">
                            Saglabāt uzdevumu
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</x-layout>
