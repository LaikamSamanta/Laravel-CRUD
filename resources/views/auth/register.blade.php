<x-layout title="Reģistrēšanās forma">
    <div class="min-h-screen bg-base-200 flex items-center justify-center px-4">
        
        <div class="card w-full max-w-2xl bg-base-100 shadow-xl border border-base-200">
            <div class="card-body p-8">

                <h1 class="text-3xl font-bold text-center mb-8">
                    Reģistrēšanās forma
                </h1>

                <form method="POST" action="/register" class="space-y-6">
                    @csrf

                    {{-- Vārds --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Vārds</span>
                        </label>
                        <input 
                            id="firstname" 
                            name="firstname" 
                            type="text" 
                            value="{{ old('firstname') }}"
                            placeholder="Tavs vārds"
                            class="input input-bordered w-full @error('firstname') input-error @enderror"
                        />
                        <x-tasks.error name="firstname" />
                    </div>

                     {{-- Uzvārds --}}
                     <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Uzvārds</span>
                        </label>
                        <input 
                            id="lastname" 
                            name="lastname" 
                            type="text"
                            value="{{ old('lastname') }}"
                            placeholder="Tavs uzvārds"
                            class="input input-bordered w-full @error('lastname') input-error @enderror"
                        />
                        <x-tasks.error name="lastname" />
                    </div>

                    {{-- E-pasts --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">E-pasts</span>
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email"
                            value="{{ old('email') }}"
                            placeholder="Tavs e-pasts"
                            class="input input-bordered w-full @error('email') input-error @enderror"
                        />
                        <x-tasks.error name="email" />
                    </div>
                    
                    {{-- Parole --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Parole</span>
                        </label>
                        <input 
                            id="password" 
                            name="password" 
                            type="password"
                            placeholder="Tava parole"
                            class="input input-bordered w-full @error('password') input-error @enderror"    
                        />
                        <x-tasks.error name="password" />   
                    </div>
                    {{-- Submit --}}    
                    <div class="card-actions justify-end pt-4">
                        <button type="submit" class="btn btn-primary px-8">
                            Reģistrēties
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
        </div>
</x-layout>
        