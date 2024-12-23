@extends('admin.master')

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper" id="manage-user-content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link 
                                    @if(!request()->has('tab') || request('tab') == 'freelancers') active @endif ps-0" 
                                    id="home-tab" 
                                    data-bs-toggle="tab" 
                                    href="#freelancers"
                                    role="tab" 
                                    aria-controls="overview" 
                                    aria-selected="{{ $currentTab == 'freelancers' ? 'true' : 'false' }}">Freelancers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(request('tab') == 'employers') active @endif " 
                                    id="profile-tab" 
                                    data-bs-toggle="tab" 
                                    href="#employers"
                                    role="tab" 
                                    aria-selected="{{ $currentTab == 'employers' ? 'true' : 'false' }}">Employers</a>
                                </li>
                            </ul>

                        </div>
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade @if(!request()->has('tab') || request('tab') == 'freelancers') show active @endif" 
                                id="freelancers" 
                                role="tabpanel"
                                aria-labelledby="freelancers">
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
                                                    placeholder="Search by Name" />
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
                                                    <th class="py-3 px-6 text-center">User ID</th>
                                                    <th class="py-3 px-6 text-center">Name</th>
                                                    <th class="py-3 px-6 text-center">
                                                        <div
                                                            style="
                                                        display: flex;
                                                        flex-direction: row;
                                                        justify-content: center;">
                                                            Status
                                                            <div class="dropdown">
                                                                <select id="status-filter" class="form-select"
                                                                    style="">
                                                                    <option value="all" selected>All</option>
                                                                    <option value="active">Active</option>
                                                                    <option value="banned">Banned</option>
                                                                </select>
                                                                <i class="fa-solid fa-caret-down"
                                                                    style="position: absolute;top: 2px;left: 10px; z-index:0;"></i>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th class="py-3 px-6 text-center" style="width: 20%;">
                                                        <div
                                                            style="
                                                            padding-top:10px;
                                                            display: flex;
                                                            flex-direction: row;
                                                            justify-content: center;">
                                                            User Since
                                                            <div class="dropdown d-inline-block" data-table="freelancer">
                                                                <button class="btn p-0 border-0 bg-transparent"
                                                                    type="button" id="sortDropdown"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    {{-- <i class="fas fa-sort"></i> --}}
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
                                                    </th>
                                                    <th class="py-3 px-6 text-center">Avatar</th>
                                                    <th class="py-3 px-6 text-center" colspan="2">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-md font-light" id="freelancerTableBody">
                                                @foreach ($freelancers as $freelancer)
                                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                        <td class="py-3 px-6 text-center">{{ $freelancer->user->id }}</td>
                                                        <td class="py-3 px-6 text-center">
                                                            {{ $freelancer->user->firstname }}
                                                            {{ $freelancer->user->lastname }}
                                                        </td>
                                                        <td class="py-3 px-6 text-center">
                                                            {{-- Thêm ID cho phần tử hiển thị status --}}
                                                            <div>
                                                                <span id="status-{{ $freelancer->user->id }}"
                                                                    class="status-label {{ $freelancer->user->status === 'banned' ? 'blocked-bg' : 'active-bg' }}">
                                                                    {{ $freelancer->user->status }}
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td class="py-3 px-6 text-center">
                                                            {{ \Carbon\Carbon::parse($freelancer->created_at)->format('d-m-Y') }}
                                                        </td>
                                                        <td class="py-3 px-6 text-center">
                                                            <img src="{{ asset($freelancer->avatar) }}" alt="Avatar"
                                                                class="w-14 h-14 mx-auto manage-user-avt">
                                                        </td>
                                                        <td class="py-3 px-6 text-block action">
                                                            <a href="{{ route('users.toggle-status', $freelancer->user->id) }}"
                                                                data-id="{{ $freelancer->user->id }}"
                                                                class="toggle-status" style="color:rgb(231, 121, 54);">
                                                                <i class="fa-solid fa-ban"></i>
                                                                {{ $freelancer->user->status === 'active' ? 'Ban' : 'Unban' }}
                                                            </a>
                                                            <a href="{{ route('admin.freelancerProfileforView', $freelancer->user->id) }}"
                                                                data-id="{{ $freelancer->user->id }}"
                                                                style="color:#A8E0FF); margin-left: 15px">
                                                                <i class="fa-solid fa-eye"></i> View
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="custom-pagination" style="margin-top: 15px">
                                            {{ $freelancers->appends(['tab' => 'freelancers'])->links('pagination::bootstrap-5') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade @if(request('tab') == 'employers') show active @endif" id="employers" role="tabpanel" aria-labelledby="employers">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="statistics-details d-flex align-items-center justify-content-between">
                                            <div class="input-group" style="max-width: 400px;">
                                                <!-- Search by ID -->
                                                <input type="text" id="searchById1" class="form-control"
                                                    placeholder="Search by ID" />
                                                <button class="btn-search" id="searchIdButton1">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                            <div class="input-group" style="max-width: 400px;">
                                                <!-- Search by Name -->
                                                <input type="text" id="searchByName1" class="form-control"
                                                    placeholder="Search by Name" />
                                                <button class="btn-search" id="searchNameButton1">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 d-flex flex-column" style="width: 100%;">
                                        <table
                                            class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg bg-opacity-50">
                                            <thead style="background-color: #a2cdf459;">
                                                <tr class="bg-white text-gray-600 text-md leading-normal bg-opacity-25">
                                                    <th class="py-3 px-6 text-center">User ID</th>
                                                    <th class="py-3 px-6 text-center">Name</th>
                                                    <th class="py-3 px-6 text-center">
                                                        <div
                                                            style="
                                                        display: flex;
                                                        flex-direction: row;
                                                        justify-content: center;">
                                                            Status
                                                            <div class="dropdown">
                                                                <select id="status-filter1" class="form-select"
                                                                    style="">
                                                                    <option value="all" selected>All</option>
                                                                    <option value="active">Active</option>
                                                                    <option value="banned">Banned</option>
                                                                </select>
                                                                <i class="fa-solid fa-caret-down"
                                                                    style="position: absolute;top: 2px;left: 10px; z-index:0;"></i>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th class="py-3 px-6 text-center" style="width: 20%;">
                                                        <div
                                                            style="
                                                            padding-top:10px;
                                                            display: flex;
                                                            flex-direction: row;
                                                            justify-content: center;">
                                                            User Since
                                                            <div class="dropdown d-inline-block" data-table="employer">
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
                                                    </th>
                                                    <th class="py-3 px-6 text-center">Avatar</th>
                                                    <th class="py-3 px-6 text-center" colspan="2">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-md font-light" id="employerTableBody">
                                                @foreach ($employers as $employer)
                                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                        <td class="py-3 px-6 text-center">{{ $employer->user->id }}</td>
                                                        <td class="py-3 px-6 text-center">
                                                            {{ $employer->user->firstname }}
                                                            {{ $employer->user->lastname }}
                                                        </td>
                                                        <td class="py-3 px-6 text-center">
                                                            {{-- Thêm ID cho phần tử hiển thị status --}}
                                                            <div>
                                                                <span id="status-{{ $employer->user->id }}"
                                                                    class="status-label {{ $employer->user->status === 'banned' ? 'blocked-bg' : 'active-bg' }}">
                                                                    {{ $employer->user->status }}
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td class="py-3 px-6 text-center">
                                                            {{ \Carbon\Carbon::parse($employer->created_at)->format('d-m-Y') }}
                                                        </td>
                                                        <td class="py-3 px-6 text-center">
                                                            <img src="{{ asset($employer->company_logo) }}"
                                                                alt="Avatar" class="w-14 h-14 mx-auto manage-user-avt">
                                                        </td>
                                                        <td class="py-3 px-6 text-block action">
                                                            <a href="{{ route('users.toggle-status', $employer->user->id) }}"
                                                                data-id="{{ $employer->user->id }}"
                                                                class="toggle-status1" style="color:rgb(231, 121, 54);">
                                                                <i class="fa-solid fa-ban"></i>
                                                                {{ $employer->user->status === 'active' ? 'Ban' : 'Unban' }}
                                                            </a>
                                                            <a href="{{ route('admin.employerProfileforView', $employer->user->id) }}"
                                                                data-id="{{ $employer->user->id }}" 
                                                                style="color:#A8E0FF); margin-left: 15px">
                                                                <i class="fa-solid fa-eye"></i> View
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="custom-pagination" style="margin-top: 15px">
                                            {{ $employers->appends(['tab' => 'employers'])->links('pagination::bootstrap-5') }}
                                        </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            //sort by Created at
            document.querySelectorAll('.sort-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const sortType = this.getAttribute('data-sort'); // "latest" hoặc "oldest"
                    const table = this.closest('.dropdown').getAttribute(
                        'data-table');
                    // Gửi yêu cầu đến server để lấy dữ liệu đã sắp xếp
                    fetch(`/freelancers/sort?order=${sortType}`, {
                            method: 'GET',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const tbody = document.querySelector('#freelancerTableBody');

                                if (!tbody) {
                                    console.error(`Table body with ID "${tbodyId}" not found.`);
                                    return;
                                }
                                tbody.innerHTML = ''; // Xóa nội dung cũ

                                // Lặp qua danh sách freelancer được sắp xếp
                                data.freelancers.forEach(freelancer => {
                                    const row = `
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">${freelancer.user.id}</td>
                            <td class="py-3 px-6 text-center">${freelancer.user.firstname} ${freelancer.user.lastname}</td>
                            <td class="py-3 px-6 text-center">
                                <span id="status-${freelancer.user.id}" 
                                      class="status-label ${freelancer.user.status === 'banned' ? 'blocked-bg' : 'active-bg'}">
                                    ${freelancer.user.status}
                                </span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                ${freelancer.formatted_date}
                            </td>
                            <td class="py-3 px-6 text-center">
                                <img src="{{ asset($freelancer->avatar) }}" alt="Avatar" class="w-14 h-14 mx-auto manage-user-avt">
                            </td>
                            <td class="py-3 px-6 text-block action">
                                <a href="/users/toggle-status/${freelancer.user.id}" 
                                   class="toggle-status" data-id="${freelancer.user.id}"
                                   style="color:rgb(231, 121, 54);">
                                    <i class="fa-solid fa-ban"></i> 
                                    ${freelancer.user.status === 'active' ? 'Ban' : 'Unban'}
                                </a>
                            </td>
                            
                        </tr>`;
                                    tbody.innerHTML += row;
                                });

                            } else {
                                alert('Failed to sort freelancers.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
        //filter status
        document.addEventListener('DOMContentLoaded', function() {
            const statusFilter = document.getElementById('status-filter');
            const tableRows = document.querySelectorAll('#freelancerTableBody tr');

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
        //block/unblock
        document.querySelector('#freelancerTableBody').addEventListener('click', function(e) {
            const target = e.target.closest('.toggle-status');
            if (target) {
                e.preventDefault();
                const userId = target.getAttribute('data-id');

                if (confirm('Are you sure to ban/unban this user?')) {
                    const currentStatus = document.querySelector(`#status-${userId}`).textContent
                        .trim();
                    let reason = null;
                    // Nếu trạng thái hiện tại là 'active', hiển thị cửa sổ nhập lý do
                    if (currentStatus === 'active') {
                        reason = prompt('Please enter the reason for banning this user:');
                        if (!reason) {
                            alert('Ban reason is required.');
                            return;
                        }
                    }
                    fetch(`/admin/users/toggle-status/${userId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            body: JSON.stringify({
                                reason: reason
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const statusSpan = document.querySelector(`#status-${userId}`);
                                statusSpan.textContent = data.new_status;

                                target.innerHTML = data.new_status === 'active' ?
                                    '<i class="fa-solid fa-ban"></i> Ban' :
                                    '<i class="fa-solid fa-ban"></i> Unban';

                                statusSpan.classList.remove('blocked-bg', 'active-bg');
                                if (data.new_status === 'banned') {
                                    statusSpan.classList.add('blocked-bg');
                                } else if (data.new_status === 'active') {
                                    statusSpan.classList.add('active-bg');
                                }
                            } else {
                                alert('Failed to update user status.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            }
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sort by Created at
            document.querySelectorAll('.sort-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const table = this.closest('.dropdown').getAttribute(
                        'data-table'); // "freelancer" hoặc "employer"
                    const sortType = this.getAttribute('data-sort'); // "latest" hoặc "oldest"

                    fetch(`/employers/sort?order=${sortType}`, {
                            method: 'GET',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const tbody = document.querySelector('#employerTableBody');
                                console.log(tbody, "huhuhu")
                                if (!tbody) {
                                    console.error(`Table body with ID "${tbodyId}" not found.`);
                                    return;
                                }

                                tbody.innerHTML = '';

                                data.employers.forEach(employer => {
                                    const avatarUrl = employer.company_logo;
                                    console.log(avatarUrl);
                                    console.log("huhu");
                                    const row = `
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">${employer.user.id}</td>
                            <td class="py-3 px-6 text-center">${employer.user.firstname} ${employer.user.lastname}</td>
                            <td class="py-3 px-6 text-center">
                                <span id="status-${employer.user.id}" 
                                      class="status-label ${employer.user.status === 'banned' ? 'blocked-bg' : 'active-bg'}">
                                    ${employer.user.status}
                                </span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                ${employer.formatted_date}
                            </td>
                            <td class="py-3 px-6 text-center">
                                <img src="{{ asset($employer->company_logo) }}" alt="Avatar" class="w-14 h-14 mx-auto manage-user-avt">
                            </td>
                            
                            <td class="py-3 px-6 text-block action">
                                <a href="/users/toggle-status/${employer.user.id}" 
                                   class="toggle-status" data-id="${employer.user.id}"
                                   style="color:rgb(231, 121, 54);">
                                    <i class="fa-solid fa-ban"></i> 
                                    ${employer.user.status === 'active' ? 'Ban' : 'Unban'}
                                </a>
                            </td>
                        </tr>`;
                                    tbody.innerHTML += row;
                                });
                            } else {
                                alert('Failed to sort employers.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            // Filter by status
            document.getElementById('status-filter1').addEventListener('change', function() {
                const selectedStatus = this.value;
                const tableRows = document.querySelectorAll('#employerTableBody tr');

                tableRows.forEach(row => {
                    const statusCell = row.querySelector('span[id^="status-"]');
                    const status = statusCell ? statusCell.textContent.trim().toLowerCase() : '';

                    if (selectedStatus === 'all' || status === selectedStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Block/Unblock employer
            document.querySelector('#employerTableBody').addEventListener('click', function(e) {
                const target = e.target.closest('.toggle-status1');
                if (target) {
                    e.preventDefault();
                    const userId = target.getAttribute('data-id');
                    if (confirm('Are you sure to ban/unban this user?')) {
                        const currentStatus = document.querySelector(`#status-${userId}`).textContent
                            .trim();
                        let reason = null;
                        // Nếu trạng thái hiện tại là 'active', hiển thị cửa sổ nhập lý do
                        if (currentStatus === 'active') {
                            reason = prompt('Please enter the reason for banning this user:');
                            if (!reason) {
                                alert('Ban reason is required.');
                                return;
                            }
                        }

                        fetch(`/admin/users/toggle-status/${userId}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .content,
                                },
                                body: JSON.stringify({
                                    reason: reason
                                }), // Gửi lý do nếu có
                            })

                            // console.log(reason)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    const statusSpan = document.querySelector(`#status-${userId}`);
                                    statusSpan.textContent = data.new_status;

                                    target.innerHTML = data.new_status === 'active' ?
                                        '<i class="fa-solid fa-ban"></i> Ban' :
                                        '<i class="fa-solid fa-ban"></i> Unban';

                                    statusSpan.classList.remove('blocked-bg', 'active-bg');
                                    if (data.new_status === 'banned') {
                                        statusSpan.classList.add('blocked-bg');
                                    } else if (data.new_status === 'active') {
                                        statusSpan.classList.add('active-bg');
                                    }
                                } else {
                                    alert('Failed to update user status.');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    }
                }
            });

            // Search by ID
            document.getElementById('searchIdButton1').addEventListener('click', function() {
                const searchId = document.getElementById('searchById1').value.trim();
                const rows = document.querySelectorAll('#employerTableBody tr');

                rows.forEach(row => {
                    const idCell = row.querySelector('td:nth-child(1)').innerText;
                    row.style.display = idCell.includes(searchId) ? '' : 'none';
                });
            });

            // Search by Name
            document.getElementById('searchNameButton1').addEventListener('click', function() {
                const searchName = document.getElementById('searchByName1').value.trim().toLowerCase();
                const rows = document.querySelectorAll('#employerTableBody tr');

                rows.forEach(row => {
                    const nameCell = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
                    row.style.display = nameCell.includes(searchName) ? '' : 'none';
                });
            });
        });
    </script>
@endsection
