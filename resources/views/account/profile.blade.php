@extends('layouts.main')

@section('title', 'unbok')

@section('facebook-meta')
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="สัญญาเพิ่มเติมกลุ่มโรคร้ายแรง" />
    <meta property="og:description"   content="เมื่อตรวจพบว่าเป็นโรคร้ายแรงเป็นครั้งแรกในขณะที่ยังมีชีวิตอยู่ การได้รับชดเชยเงินก้อนจะช่วยในการวางแผนการรักษาได้เป็นอย่างมาก อย่าปล่อยให้โรคร้ายแรงทำร้ายคนทั้งบ้าน ให้เอไอเอ เป็นผู้ดูแลคุณและคนที่คุณรัก" />
    {{--<meta property="og:imgender"         content="{{ asset("components/imgender/ECIR/ecir_logo.jpg") }}" />--}}
@stop

@section('source')

    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/form.css") }}">

@stop


@section('content')



    <div class="pgender-content">

        <div class="container">
            <div class="row-fluid">

                <form class="form-horizontal" action="{{ route('account.signup') }}" method="post">


                    <fieldset>
                        <div id="legend">
                            <legend class="page-header">Profile</legend>
                        </div>



                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">

                                <div class="text-center div-avatar">
                                    <img id="img-uploaded" class="avatar img-circle" src="{{ Auth::user()->avatar == null ? asset('components/images/no_image_available.png') : Auth::user()->avatar }}" alt="your imgender" />
                                    <h6>Upload a different photo...</h6>

                                </div>

                                <input type="file" name="photo" id="imgInp" class="uploader form-control">


                                {{--<input type="text" class="img-path" placeholder="Imgender Path">--}}


                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                                <span class="help-inline">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                <span class="help-inline">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label for="gender" class="col-sm-2 control-label">gender</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="gender" name="gender">
                                    <option value="1">ชาย</option>
                                    <option value="2">หญิง</option>
                                </select>
                                <span class="help-inline">{{ $errors->has('gender') ? $errors->first('gender') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('birth') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">date of birth</label>
                            <div class="col-sm-10">


                                <div class="form-inline">
                                    <div class="form-group form-group-birth">
                                        <select class="form-control form-control-birth" name="expiry-year">
                                            <option value="13">2013</option>
                                            <option value="14">2014</option>
                                            <option value="15">2015</option>
                                            <option value="16">2016</option>
                                            <option value="17">2017</option>
                                            <option value="18">2018</option>
                                            <option value="19">2019</option>
                                            <option value="20">2020</option>
                                            <option value="21">2021</option>
                                            <option value="22">2022</option>
                                            <option value="23">2023</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-group-birth">
                                        <select class="form-control form-control-birth col-sm-2" name="expiry-month" id="expiry-month">
                                            <option>Month</option>
                                            <option value="01">Jan (01)</option>
                                            <option value="02">Feb (02)</option>
                                            <option value="03">Mar (03)</option>
                                            <option value="04">Apr (04)</option>
                                            <option value="05">May (05)</option>
                                            <option value="06">June (06)</option>
                                            <option value="07">July (07)</option>
                                            <option value="08">Aug (08)</option>
                                            <option value="09">Sep (09)</option>
                                            <option value="10">Oct (10)</option>
                                            <option value="11">Nov (11)</option>
                                            <option value="12">Dec (12)</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-group-birth">
                                        <select class="form-control form-control-birth" name="expiry-year">
                                            <option value="13">2013</option>
                                            <option value="14">2014</option>
                                            <option value="15">2015</option>
                                            <option value="16">2016</option>
                                            <option value="17">2017</option>
                                            <option value="18">2018</option>
                                            <option value="19">2019</option>
                                            <option value="20">2020</option>
                                            <option value="21">2021</option>
                                            <option value="22">2022</option>
                                            <option value="23">2023</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-xs-3">

                                    </div>
                                    <div class="col-xs-3">

                                    </div>
                                    <div class="col-xs-3">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="newsletter"> subscribe to newsletter
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">


                    </fieldset>

                </form>

            </div>
        </div>

    </div>


    <script>

        /*----------------------------------------
         Upload btn
         ------------------------------------------*/
        var SITE = SITE || {};

        SITE.fileInputs = function() {
            var $this = $(this),
                    $val = $this.val(),
                    valArray = $val.split('\\'),
                    newVal = valArray[valArray.length-1],
                    $button = $this.siblings('.btn'),
                    $fakeFile = $this.siblings('.file-holder');
            if(newVal !== '') {
                $button.text('Photo Chosen');
                if($fakeFile.length === 0) {
                    $button.after('<span class="file-holder">' + newVal + '</span>');
                } else {
                    $fakeFile.text(newVal);
                }
            }
        };


        $('.file-wrapper input[type=file]').bind('change focus click', SITE.fileInputs);

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var tmppath = URL.createObjectURL(event.target.files[0]);

                reader.onload = function (e) {
                    $('#img-uploaded').attr('src', e.target.result);
                    //$('input.img-path').val(tmppath);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".uploader").change(function(){
            readURL(this);
        });


    </script>

@stop




