@extends('layouts.admin')
@section('page-title')
    {{ __('Manage Archive Application') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>

    <li class="breadcrumb-item">{{ __('Archive Application') }}</li>
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                {{-- <h5> </h5> --}}
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Applied For') }}</th>
                                <th>{{ __('Rating') }}</th>
                                <th>{{ __('Applied at') }}</th>
                                <th>{{ __('Resume') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archive_application as $application)
                                <tr>
                                    <td><a class="btn btn-outline-primary"
                                            href="{{ route('job-application.show', \Crypt::encrypt($application->id)) }}">
                                            {{ $application->name }}</a></td>
                                    <td>{{ !empty($application->jobs) ? $application->jobs->title : '-' }}</td>
                                    <td>

                                        <span class="static-rating static-rating-sm d-block">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $application->rating)
                                                    <i class="star fas fa-star voted"></i>
                                                @else
                                                    <i class="star fas fa-star"></i>
                                                @endif
                                            @endfor
                                        </span>
                                    </td>
                                    <td>{{ \Auth::user()->dateFormat($application->created_at) }}</td>
                                    <td>
                                        @if (!empty($application->resume))
                                            <span class="text-sm">
                                                <a href="{{ asset(Storage::url('uploads/job/resume')) . '/' . $application->resume }}"  data-bs-toggle="tooltip"
                                                    data-bs-original-title="{{ __('Download') }}"
                                                    download><i class="ti ti-download"></i></a>
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @can('Show Job Application')
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="{{ route('job-application.show', \Crypt::encrypt($application->id)) }}"
                                                    class="mx-3 btn btn-sm  align-items-center" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="{{ __('View Detail') }}">
                                                    <i class="ti ti-eye text-white"></i>
                                                </a>
                                            </div>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    

@endsection
