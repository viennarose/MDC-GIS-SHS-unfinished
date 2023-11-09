@extends('admin.layout.base')

@section('content-header')
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Dashboard</h2>
@endsection

@section('content')
    <div class="container mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="col-span-1">
                <a href="/admin/announcements">
                    <div class="info-box dash elevation-3" style="height: 110px;">
                        <div class="info-box-content">
                            <span class="info-box-text text-gray-500" style="font-size: 11px;">ANNOUNCEMENTS</span>
                            <span class="info-box-number text-gray-500">{{ $countA }}</span>
                        </div>
                        <span class="info-box-icon"><i class="fa-solid fa-bullhorn text-gray-500"
                                style="font-size: 43px;"></i></span>
                    </div>
                </a>
            </div>

            <div class="col-span-1">
                <a href="/admin/activities">
                    <div class="info-box dash elevation-3" style="height: 110px;">
                        <div class="info-box-content">
                            <span class="info-box-text text-gray-500" style="font-size: 11px;">ACTIVITIES</span>
                            <span class="info-box-number text-gray-500">{{ $countAct }}</span>
                        </div>
                        <span class="info-box-icon"><i class="fa-solid fa-inbox text-gray-500"
                                style="font-size: 43px;"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-span-1">
                <a href="/admin/feedbacks">
                    <div class="info-box dash elevation-3" style="height: 110px;">
                        <div class="info-box-content">
                            <span class="info-box-text text-gray-500" style="font-size: 11px;">FEEDBACKS</span>
                            <span class="info-box-number text-gray-500">{{ $countF }}</span>
                        </div>
                        <span class="info-box-icon"><i class="fa-solid fa-comment text-gray-500"
                                style="font-size: 43px;"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-span-1">
                <a href="/admin/appointments">
                    <div class="info-box dash elevation-3" style="height: 110px;">
                        <div class="info-box-content">
                            <span class="info-box-text text-gray-500" style="font-size: 11px;">APPOINTMENTS</span>
                            <span class="info-box-number text-gray-500">{{ $countAppt }}</span>
                        </div>
                        <span class="info-box-icon"><i class="fa-solid fa-calendar-check text-gray-500"
                                style="font-size: 43px;"></i></span>
                    </div>
                </a>
            </div>
            <div class="col-span-1">
                <a href="/admin/users">
                    <div class="info-box dash elevation-3" style="height: 110px;">
                        <div class="info-box-content">
                            <span class="info-box-text text-gray-500" style="font-size: 11px;">USERS</span>
                            <span class="info-box-number text-gray-500">{{ $countUsers }}</span>
                        </div>
                        <span class="info-box-icon"><i class="fa-solid fa-users text-gray-500"
                                style="font-size: 43px;"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
