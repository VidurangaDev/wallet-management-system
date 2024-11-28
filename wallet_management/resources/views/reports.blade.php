<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('REPORTS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-4">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2 class=" mb-4">Summary Report</h2>
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Total Debits</th>
                                        <th>Total Credits</th>
                                        <th>Remaining Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $totalDebits }}</td>
                                        <td>{{ $totalCredits }}</td>
                                        <td>{{ $remainingBalance }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="{{ route('reports.export.pdf') }}" class="btn btn-primary">Download as PDF</a>
                            <a href="{{ route('reports.export.csv') }}" class="btn btn-secondary">Download as CSV</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
