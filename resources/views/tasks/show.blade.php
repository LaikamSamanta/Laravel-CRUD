<x-layout title="Detalizēts Uzdevums">

    <div class="min-h-screen bg-base-200 py-10">
        <div class="max-w-3xl mx-auto px-4">

            <div class="card bg-base-100 shadow-lg border border-base-200">
                <div class="card-body p-8">

                    <h2 class="card-title text-2xl font-bold mb-6">
                        Uzdevuma detaļas
                    </h2>

                    {{-- Details --}}
                    <div class="space-y-4 text-base">

                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold">Uzdevuma nosaukums</span>
                            <span>{{ $task->title }}</span>
                        </div>

                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold">Uzdevuma apraksts</span>
                            <span>{{ $task->description }}</span>
                        </div>

                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold">ID</span>
                            <span class="badge badge-outline">{{ $task->id }}</span>
                        </div>

                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold">Izveidots</span>
                            <span>{{ $task->created_at->format('d.m.Y H:i') }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="font-semibold">Atjaunināts</span>
                            <span>{{ $task->updated_at->format('d.m.Y H:i') }}</span>
                        </div>

                    </div>

                    {{-- Actions --}}
                    <div class="card-actions justify-end mt-8 gap-3">

                        <a href="/tasks/{{ $task->id }}/edit"
                           class="btn btn-success btn-outline">
                            Rediģēt
                        </a>

                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Vai tiešām vēlies dzēst šo ierakstu?')"
                                class="btn btn-error btn-outline">
                                Dzēst
                            </button>
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>

</x-layout>
