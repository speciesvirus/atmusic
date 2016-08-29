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

                @if(Session::has('message'))
                    <div class="page-header">
                        <div class="alert alert-info">
                            <h2>{{Session::get('message')}}</h2>
                        </div>
                    </div>
                @endif

                <form class="form-horizontal" action="{{ route('post.profile') }}" method="post">

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

                                <input type="file" name="avatar" class="uploader form-control">


                                {{--<input type="text" class="img-path" placeholder="Imgender Path">--}}


                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                                <span class="help-inline">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email }}" {{ Auth::user()->email ? 'disabled' : '' }}>
                                <span class="help-inline">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label for="gender" class="col-sm-2 control-label">gender</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="gender">
                                    @if(!Auth::user()->gender)
                                        <option value="">เพศ</option>
                                    @endif
                                    <option value="1" {{ Auth::user()->gender == 1 ? "selected" : null}}>ชาย</option>
                                    <option value="2" {{ Auth::user()->gender == 2 ? "selected" : null}}>หญิง</option>
                                </select>
                                <span class="help-inline">{{ $errors->has('gender') ? $errors->first('gender') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('birth_day') ? 'has-error' : $errors->has('birth_month') ? 'has-error' : $errors->has('birth_year') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">date of birth</label>
                            <div class="col-sm-10">


                                <div class="form-inline">
                                    <div class="form-group form-group-birth {{ $errors->has('birth_day') ? 'has-error' : '' }}">
                                        <select class="form-control form-control-birth" name="birth_day">
                                            @if(!Auth::user()->birth)
                                                <option value="">วัน</option>
                                            @endif
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="form-group form-group-birth {{ $errors->has('birth_month') ? 'has-error' : '' }}">
                                        <select class="form-control form-control-birth col-sm-2" name="birth_month">
                                            @if(!Auth::user()->birth)
                                                <option value="">เดือน</option>
                                            @endif
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
                                    <div class="form-group form-group-birth {{ $errors->has('birth_year') ? 'has-error' : '' }}">
                                        <select class="form-control form-control-birth" name="birth_year">
                                            @if(!Auth::user()->birth)
                                                <option value="">ปี</option>
                                            @endif

                                            @for($i = 1950; $i <= 2000; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor

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
                                        <input type="checkbox" name="newsletter" {{ Auth::user()->newsletter ? 'checked' : '' }}> subscribe to newsletter
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



        @if(Auth::user()->birth)

        var $d = new Date("{{ Auth::user()->birth }}");
            $("select[name='birth_day'] > option[value=" + $d.getDate() + "]").attr("selected",true);
            $("select[name='birth_month'] > option[value=" + ( $d.getMonth() + 1 ) + "]").attr("selected",true);
            $("select[name='birth_year'] > option[value=" + $d.getFullYear() + "]").attr("selected",true);


        @endif

    </script>

@stop




