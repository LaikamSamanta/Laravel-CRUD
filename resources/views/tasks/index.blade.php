<x-layout title="Reģistrēšanās forma">

    <div class="min-h-screen bg-base-200 py-10">
        <div class="max-w-6xl mx-auto px-4">

            {{-- Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                <div>
                    <p class="text-base-content/70 mt-1">
                        Kopā ir {{ $tasks->count() }} uzdevumi.
                    </p>
                </div>

                @if ($tasks->count())
                    <a href="/tasks/create" class="btn btn-primary mt-4 sm:mt-0">
                        + Pievienot jaunu
                    </a>
                @endif
            </div>

            @if ($tasks->count())

                {{-- Cards Grid --}}
                <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($tasks as $task)
                        <li>
                            <div
                                class="card bg-base-100 shadow-md hover:shadow-xl transition-all duration-300 border border-base-200">

                                <div class="card-body p-5">

                                    <a href="/tasks/{{ $task->id }}"
                                        class="text-lg font-semibold hover:text-primary transition">
                                       <h1>{{ $task->title }}      @if($task->completed) <span class="text-sm text-success">(Pabeigts)</span> @endif</h1>
      
                                        
                                    </a>
                                
                                    @if($task->completed)
                                    <p class="text-sm line-through">{{ $task->description }}</p>
                                    @else
                                    <p class="text-sm">{{ $task->description }}</p>
                                    @endif

                                    <div class="card-actions justify-end mt-4">
                                        <a href="/tasks/{{ $task->id }}"
                                            class="btn btn-sm btn-outline btn-primary">
                                            Skatīt
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            @else

                {{-- Empty State --}}
                <div class="card bg-base-100 shadow-md border border-base-200">
                    <div class="card-body text-center py-12">
                        <h2 class="text-xl font-semibold mb-2">
                            Nav neviena uzdevuma
                        </h2>
                        <p class="text-base-content/70 mb-6">
                            Izveido savu pirmo uzdevumu.
                        </p>

                        <a href="/tasks/create" class="btn btn-primary">
                            Izveidot jaunu uzdevumu
                        </a>
                    </div>
                </div>

            @endif

        </div>
    </div>

</x-layout>
