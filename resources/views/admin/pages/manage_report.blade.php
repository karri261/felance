@extends('admin.master')

@section('main-content')
    {{-- <table class="table">
    <thead>
        <tr>
            <th>Report ID</th>
            <th>Reporter</th>
            <th>Reported User</th>
            <th>Reason</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $report)
        <tr>
            <td>{{ $report->id }}</td>
            <td>{{ $report->reporter_id }}</td>
            <td>{{ $report->reported_user_id }}</td>
            <td>{{ $report->reason }}</td>
            <td>
                <form action="{{ route('manage-report', $report->id) }}" method="POST">
                    @csrf
                    <select name="decision" class="form-select">
                        <option value="dismiss">Dismiss</option>
                        <option value="block">Block</option>
                    </select>
                    <button type="submit" class="btn btn-success">Resolve</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> --}}
    <div class="main-panel">
        <div class="content-wrapper" id="manage-user-content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="reports">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="statistics-details d-flex align-items-center justify-content-between">
                                            <div class="input-group" style="max-width: 400px;">
                                                <!-- Search by ID -->
                                                <input type="text" id="searchById" class="form-control"
                                                    placeholder="Search by ID" />
                                                <button class="btn-search" id="searchIdButton">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                            <div class="input-group" style="max-width: 400px;">
                                                <!-- Search by Name -->
                                                <input type="text" id="searchByName" class="form-control"
                                                    placeholder="Search by Title" />
                                                <button class="btn-search" id="searchNameButton">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 d-flex flex-column" style="width: 100%;">
                                        {{-- Bảng freelancer --}}
                                        <table
                                            class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg bg-opacity-50">
                                            <thead style="background-color: #a2cdf459;">
                                                <tr class="bg-white text-gray-600 text-md leading-normal bg-opacity-25">
                                                    <th class="py-3 px-6 text-center" style="width:10%;">Report ID</th>
                                                    <th class="py-3 px-6 text-center" style="width:30%;">Title</th>
                                                    <th class="py-3 px-6 text-center" style="width:10%;">Reporter ID</th>
                                                    <th class="py-3 px-6 text-center" style="width:20%;">Reported User ID
                                                    </th>
                                                    <th class="py-3 px-6 text-center">
                                                        <div
                                                            style="
                                                    display: flex;
                                                    flex-direction: row;
                                                    justify-content: center;
                                                    ">
                                                            Status
                                                            <div class="dropdown">
                                                                <select id="status-filter" class="form-select"
                                                                    style="">
                                                                    <option value="all" selected>All</option>
                                                                    <option value="pending">Pending</option>
                                                                    <option value="resolve">Resolve</option>
                                                                </select>
                                                                <i class="fa-solid fa-caret-down"
                                                                    style="position: absolute;top: 2px;left: 10px; z-index:0;"></i>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    {{-- <th class="py-3 px-6 text-center" style="width: 20%;">
                                                    <div style="
                                                        padding-top:10px;
                                                        display: flex;
                                                        flex-direction: row;
                                                        justify-content: center;">
                                                        Create at
                                                        <div class="dropdown d-inline-block">
                                                            <button class="btn p-0 border-0 bg-transparent"
                                                                type="button" id="sortDropdown"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            </button>
                                                            <i class="fa-solid fa-caret-down"
                                                                style="position: absolute;top: 2px;left: 7px; z-index:0;"></i>
                                                            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                                                <li><a class="dropdown-item sort-link" href="#"
                                                                        data-sort="latest">Latest</a></li>
                                                                <li><a class="dropdown-item sort-link" href="#"
                                                                        data-sort="oldest">Oldest</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </th> --}}
                                                    <th class="py-3 px-6 text-center" colspan="2" style="width:15%;">View
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-md font-light" id="freelancerTableBody">
                                                @foreach ($reports as $report)
                                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                        <td class="py-3 px-6 text-center">{{ $report->id }}</td>
                                                        <td class="py-3 px-6 text-center">{{ $report->title }}</td>
                                                        <td class="py-3 px-6 text-center">{{ $report->reporter_id }}</td>
                                                        <td class="py-3 px-6 text-center">{{ $report->reported_user_id }}
                                                        </td>
                                                        <td class="py-3 px-6 text-center">
                                                            <div>
                                                                <span id="status-{{ $report->id }}"
                                                                    class="status-label {{ $report->status === 'pending' ? 'blocked-bg' : 'active-bg' }}">
                                                                    {{ $report->status }}
                                                                </span>

                                                            </div>
                                                        </td>
                                                        {{-- <td class="py-3 px-6 text-center">
                                                        {{ \Carbon\Carbon::parse($report->created_at)->format('d-m-Y') }}
                                                    </td> --}}
                                                        <td class="py-3 px-6 text-block action">
                                                            <a
                                                                href="{{ route('reportDetail', ['report_id' => $report->id]) }}">
                                                                <i class="fa-solid fa-eye" style="color:black;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <script>
        //filter status
        document.addEventListener('DOMContentLoaded', function() {
            const statusFilter = document.getElementById('status-filter');
            const tableRows = document.querySelectorAll('tbody tr');

            statusFilter.addEventListener('change', function() {
                const selectedStatus = this.value;

                tableRows.forEach(row => {
                    const statusCell = row.querySelector('span[id^="status-"]');
                    const status = statusCell ? statusCell.textContent.trim().toLowerCase() : '';

                    // Lọc theo giá trị trong dropdown
                    if (selectedStatus === 'all' || status === selectedStatus) {
                        row.style.display = ''; // Hiển thị hàng
                    } else {
                        row.style.display = 'none'; // Ẩn hàng
                    }
                });
            });
        });
        //search
        document.getElementById('searchIdButton').addEventListener('click', function() {
            const searchId = document.getElementById('searchById').value.trim();
            const rows = document.querySelectorAll('#freelancerTableBody tr');

            rows.forEach(row => {
                const idCell = row.querySelector('td:nth-child(1)').innerText;
                row.style.display = idCell.includes(searchId) ? '' : 'none';
            });
        });
        document.getElementById('searchNameButton').addEventListener('click', function() {
            const searchName = document.getElementById('searchByName').value.trim().toLowerCase();
            const rows = document.querySelectorAll('#freelancerTableBody tr');

            rows.forEach(row => {
                const nameCell = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
                row.style.display = nameCell.includes(searchName) ? '' : 'none';
            });
        });
    </script>
@endsection
