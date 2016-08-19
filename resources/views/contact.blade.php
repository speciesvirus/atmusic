@extends('layouts.main')

@section('title', 'unbok')

@section('facebook-meta')
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="สัญญาเพิ่มเติมกลุ่มโรคร้ายแรง" />
    <meta property="og:description"   content="เมื่อตรวจพบว่าเป็นโรคร้ายแรงเป็นครั้งแรกในขณะที่ยังมีชีวิตอยู่ การได้รับชดเชยเงินก้อนจะช่วยในการวางแผนการรักษาได้เป็นอย่างมาก อย่าปล่อยให้โรคร้ายแรงทำร้ายคนทั้งบ้าน ให้เอไอเอ เป็นผู้ดูแลคุณและคนที่คุณรัก" />
    {{--<meta property="og:image"         content="{{ asset("components/image/ECIR/ecir_logo.jpg") }}" />--}}
@stop

@section('source')

    <link rel="stylesheet" type="text/css" href="{{ asset("components/css/form.css") }}">

@stop


@section('content')

    <div class="page-content">


        <div class="container">
            <div class="row-fluid">


                @if(Session::has('message'))
                    <div class="page-header">
                        <div class="alert alert-info">
                            <h2>{{Session::get('message')}}</h2>
                        </div>
                    </div>

                @else

                    <form class="form-horizontal" action="{{ route('post.contact') }}" method="post">

                        <fieldset>
                            <div id="legend">
                                <legend class="page-header">Contact</legend>
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                                    <span class="help-inline">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Your Email" value="{{ old('email') }}">
                                    <span class="help-inline">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                <label for="phone" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone Number" value="{{ old('phone') }}">
                                    <span class="help-inline">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                                <label for="message" class="col-sm-2 control-label">Message</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="message" name="message" placeholder="Type your Message Here...." tabindex="15" required>{{ old('message') }}</textarea>
                                    <span class="help-inline">{{ $errors->has('message') ? $errors->first('message') : '' }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">


                        </fieldset>

                    </form>

                @endif



            </div>
        </div>




    </div>

@stop




