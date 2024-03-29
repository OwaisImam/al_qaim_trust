{{ Form::open(['url' => 'job-application', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('job', __('Job'), ['class' => 'form-label']) }}
            {{ Form::select('job', $jobs, null, ['class' => 'form-control select2', 'id' => 'jobs']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control name']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('phone', __('Phone'), ['class' => 'form-label']) }}
            {{ Form::text('phone', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group col-md-6 dob d-none">
            {!! Form::label('dob', __('Date of Birth'), ['class' => 'form-label']) !!}
            {!! Form::text('dob', old('dob'), ['class' => 'form-control d_week', 'autocomplete' => 'off']) !!}
        </div>
        <div class="form-group col-md-6 gender d-none">
            {!! Form::label('gender', __('Gender'), ['class' => 'form-label']) !!}
            <div class="d-flex radio-check">
                <div class="form-check form-check-inline form-group">
                    <input type="radio" id="g_male" value="Male" name="gender" class="form-check-input">
                    <label class="form-check-label" for="g_male">{{ __('Male') }}</label>
                </div>
                <div class="form-check form-check-inline form-group">
                    <input type="radio" id="g_female" value="Female" name="gender" class="form-check-input">
                    <label class="form-check-label" for="g_female">{{ __('Female') }}</label>
                </div>
            </div>
        </div>
        <div class="form-group col-md-6 country d-none">
            {{ Form::label('country', __('Country'), ['class' => 'form-label']) }}
            {{ Form::text('country', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group col-md-6 country d-none">
            {{ Form::label('state', __('State'), ['class' => 'form-label']) }}
            {{ Form::text('state', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group col-md-6 country d-none">
            {{ Form::label('city', __('City'), ['class' => 'form-label']) }}
            {{ Form::text('city', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group col-md-6 profile d-none">
            {{ Form::label('profile', __('Profile'), ['class' => 'form-label']) }}
            {{-- <div class="form-group">
                <label for="document" class="form-label choose-files bg-primary "><i
                        class="ti ti-upload px-1"></i>{{ __('Choose file here') }}</label>
                <input type="file" name="document" id="document" class="custom-input-file d-none">

                <p class="profile_create"></p>
            </div> --}}


            <div class="choose-files ">
                <label for="document">
                    <div class=" bg-primary document "> <i class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                    </div>
                    <input type="file" class="form-control file" name="document" id="document">
                    {{-- <p class="profile_create"></p> --}}
                </label>
            </div>


        </div>
        <div class="form-group col-md-6 resume d-none">
            {{ Form::label('resume', __('CV / Resume'), ['class' => 'form-label']) }}
            {{-- <div class="choose-file form-group">

                <label for="resume" class="form-label choose-files bg-primary "><i
                        class="ti ti-upload px-1"></i>{{ __('Choose file here') }}</label>
                <input type="file" name="resume" id="resume" class="custom-input-file d-none">
                <p class="resume_create"></p>
            </div> --}}  


            <div class="choose-files">
                <label for="resume">
                    <div class=" bg-primary resume "> <i
                            class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                    </div>
                    <input type="file" class="form-control file" name="resume" id="resume">  
                    {{-- <p class="resume_create"></p> --}}
                </label>
            </div>

        </div>
        <div class="form-group col-md-12 letter d-none">
            {{ Form::label('cover_letter', __('Cover Letter'), ['class' => 'form-label']) }}
            {{ Form::textarea('cover_letter', null, ['class' => 'form-control']) }}
        </div>
        @foreach ($questions as $question)
            <div class="form-group col-md-12  question question_{{ $question->id }} d-none">
                {{ Form::label($question->question, $question->question, ['class' => 'form-label']) }}
                <input type="text" class="form-control" name="question[{{ $question->question }}]"
                    {{ $question->is_required == 'yes' ? 'required' : '' }}>
            </div>
        @endforeach

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="{{ __('Cancel') }}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Create') }}" class="btn  btn-primary">
</div>
{{ Form::close() }}
