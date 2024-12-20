@extends('admin.master')

@section('main-content')
    <div class="container my-2 mx-3">
        <div class="card px-4 py-2">
            <div class="report-body">
                <span class="report-title">{{ $report->title }}</span>
                <div class="report-infor">
                    <div class="reporter">
                        <p><strong>Reporter:</strong> {{ $reporter->firstname }} {{ $reporter->lastname }}, ID:
                            {{ $reporter->id }}, Role:
                            @if ($reporter->role_id === 3)
                                employer
                            @else
                                freelancer
                            @endif
                        </p>
                        <p><strong>Reported user:</strong> {{ $reported->firstname }} {{ $reported->lastname }}, ID:
                            {{ $reported->id }}, Role:
                            @if ($reported->role_id === 3)
                                employer
                            @else
                                freelancer
                            @endif
                        </p>
                    </div>
                    <div class="report-datestatus">
                        <p><strong>Date:</strong>
                            {{ \Carbon\Carbon::parse($report->created_at)->format('d-m-Y') }}
                        </p>
                        <p><strong>Status:</strong>
                            <span
                                @if ($report->status === 'resolved') style="color: rgb(21, 149, 43);" 
                                @else 
                                    class="text-warning" @endif>
                                {{ $report->status }}
                            </span>
                        </p>
                    </div>
                </div>
                <div class="report-content">
                    <p><strong>Detail reason:</strong></p>
                    <p>{{ $report->detail }}</p>
                </div>
                @if ($report->status === 'pending')
                    <div class="report-buttons">
                        <button class="btn btn-primary" id="no-action">No action</button>
                        <span> or </span>
                        <button class="btn btn-warning" id="ban-user">Ban User</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    <script>
        document.getElementById("no-action").addEventListener("click", function() {
            if (confirm("Are you sure you want to take no action?")) {
                alert("The report has been resolved and an email has been sent to the reporter in 5 seconds!");
                fetch('/admin/manage-report/no-action', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            report_id: "{{ $report->id }}",
                            status: "resolved",
                            email_content: "Admin has resolved your report title: '{{ $report->title }}' and chosen to take no action. Please provide further clarification if needed."
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert("An error occurred. Please try again.");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("An error occurred. Please try again.");
                    });
            }
        });

        document.getElementById("ban-user").addEventListener("click", function() {
            if (confirm("Are you sure you want to ban this user?")) {
                alert("The user has been banned and emails have been sent to both parties in 5 seconds.");
                fetch('/admin/manage-report/ban-reported-user', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            report_id: "{{ $report->id }}",
                            // reporter_email: "{{ $report->reporter_id }}",
                            // reported_email: "{{ $report->reported_user_id }}",
                            email_to_reported: "Your account has been reported with title '{{ $report->title }}'",
                            email_to_reporter: "Admin has resolved your report title: '{{ $report->title }}' and chosen to take reported user. Thank you for your report."
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert("An error occurred. Please try again.");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("An error occurred. Please try again.");
                    });
            }
        });
    </script>
@endsection
