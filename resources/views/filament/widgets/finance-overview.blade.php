<x-filament::card>
    <div class="grid grid-cols-3 gap-4">
        <div class="text-center">
            <h3 class="text-lg font-semibold">Pemasukan</h3>
            <p class="text-green-500 text-2xl font-bold">{{ $income }}</p>
        </div>
        <div class="text-center">
            <h3 class="text-lg font-semibold">Pengeluaran</h3>
            <p class="text-red-500 text-2xl font-bold">{{ $expense }}</p>
        </div>
        <div class="text-center">
            <h3 class="text-lg font-semibold">Saldo</h3>
            <p class="text-blue-500 text-2xl font-bold">{{ $balance }}</p>
        </div>
    </div>
</x-filament::card>
