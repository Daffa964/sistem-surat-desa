@props(['headers', 'rows', 'actions' => true])

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <x-table>
                    <x-table.header>
                        @foreach($headers as $header)
                            <x-table.heading>{{ $header }}</x-table.heading>
                        @endforeach
                        @if($actions)
                            <x-table.heading class="text-right">Actions</x-table.heading>
                        @endif
                    </x-table.header>
                    <x-table.body>
                        @forelse($rows as $row)
                            <x-table.row>
                                @foreach($row as $cell)
                                    <x-table.cell>{{ $cell }}</x-table.cell>
                                @endforeach
                                @if($actions)
                                    <x-table.cell class="text-right">
                                        {{ $actions }}
                                    </x-table.cell>
                                @endif
                            </x-table.row>
                        @empty
                            <x-table.row>
                                <x-table.cell colspan="{{ count($headers) + ($actions ? 1 : 0) }}" class="text-center">
                                    No data available
                                </x-table.cell>
                            </x-table.row>
                        @endforelse
                    </x-table.body>
                </x-table>
            </div>
        </div>
    </div>
</div>