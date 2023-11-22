@extends('backend.layout.master')

@section('content')
<div class="page-header">
    <div class="page-title w-100">
        <div class="d-flex justify-content-between">
            <div class="title-left">
                <h4>Online Form Detail</h4>
                <h6>Single Detail for Online Form</h6>
            </div>
            <div class="title-button">
                <a class="btn btn-primary" href="{{ route('online_form.table.list') }}">View List</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table-bordered">
                    <tr>
                        <td>Name of the Applicant (Full Name):</td>
                        <td>{{$list->fullname ?? ''}}</td>
                        <td>Current address:</td>
                        <td>{{$list->address ?? ''}}</td>
                        <td>Permanent home address:</td>
                        <td>{{$list->homeAddress ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>Contact Number:</td>
                        <td>{{$list->phone ?? ''}}</td>
                        <td>Mobile Number:</td>
                        <td>{{$list->mobileNumber ?? ''}}</td>
                        <td>Gender</td>
                        <td>{{$list->gender ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>Nationality:</td>
                        <td>{{$list->nationality ?? ''}}</td>
                        <td>Email:</td>
                        <td>{{$list->email ?? ''}}</td>
                        <td>Date of Birth(AD):</td>
                        <td>{{$list->dob_ad ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth(BS):</td>
                        <td>{{$list->dob_bs ?? ''}}</td>
                        <td>Age:</td>
                        <td>{{$list->age ?? ''}}</td>
                        <td>PROGRAM:</td>
                        <td>{{$list->program ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>Name of school/college attended:</td>
                        <td>{{$list->attended ?? ''}}</td>
                        <td>Highest level passed:</td>
                        <td>{{$list->levelPassed ?? ''}}</td>
                        <td width="10%">Have you ever had a similar traning before? If Yes where?:</td>
                        <td>{{$list->training ?? ''}}</td>
                    </tr>
                    <tr>
                        <td>How did you FIRST learn about NIAFT?</td>
                        <td>{{$list->about ?? ''}}</td>
                        <td> Who encouraged you to apply to NIAFT?</td>
                        <td>{{$list->encouraged ?? ''}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
