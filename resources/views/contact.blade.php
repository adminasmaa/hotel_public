@extends('layouts.admin')
@section('title', 'التقييم')
$section('css')
<style>
.rc-anchor {
	border-radius: 3px;
	box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.08);
	-webkit-box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.08);
	-moz-box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.08)
}

.rc-inline-block {
	display: inline-block;
	height: 100%;
}

.rc-anchor-center-item {
	display: table-cell;
	vertical-align: middle;
}

.rc-anchor-center-container {
	display: table;
	height: 100%;
}

.rc-anchor-light {
	background: #f9f9f9;
	border: 1px solid #d3d3d3;
	color: #000
}

.rc-anchor-normal {
	height: 74px;
	width: 300px;
	position: relative;
}

.rc-anchor-normal .rc-anchor-content {
	height: 74px;
	width: 206px;
	float: left;
}

.rc-anchor-normal .rc-anchor-checkbox-label {
	width: 152px;
}

.rc-anchor-checkbox {
	margin: 0 12px 2px 12px;
}

.recaptcha-checkbox {
	border: none;
	font-size: 1px;
	height: 28px;
	margin: 4px;
	width: 28px;
	overflow: visible;
	outline: 0;
	vertical-align: text-bottom;
	display: block;
}

.recaptcha-checkbox-border {
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
	background-color: #fff;
	border: 2px solid #c1c1c1;
	font-size: 1px;
	height: 24px;
	position: absolute;
	width: 24px;
}

.rc-anchor-checkbox-label {
	font-family: Roboto, helvetica, arial, sans-serif;
	font-size: 14px;
	font-weight: 400;
	line-height: 17px;
}

.rc-anchor-normal-footer {
	display: inline-block;
	height: 74px;
	vertical-align: top;
}

.rc-anchor-logo-portrait {
	margin: 10px 0 0 26px;
	width: 58px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
}

.rc-anchor-logo-img-portrait {
	background-size: 32px !important;
	height: 32px;
	margin: 0 13px 0 13px;
	width: 32px;
}

.rc-anchor-logo-img {
	background: url('https://www.gstatic.com/recaptcha/api2/logo_48.png');
	background-repeat: no-repeat;
}

.rc-anchor-logo-text {
	color: #9b9b9b;
	cursor: default;
	font-family: Roboto, helvetica, arial, sans-serif;
	font-size: 10px;
	font-weight: 400;
	line-height: 10px;
	margin-top: 5px;
	text-align: center;
}

.rc-anchor-normal .rc-anchor-pt,
.rc-anchor-compact .rc-anchor-pt {
	color: #9b9b9b;
	font-family: Roboto, helvetica, arial, sans-serif;
	font-size: 8px;
	font-weight: 400;
}

.rc-anchor-normal .rc-anchor-pt {
	margin: 4px 13px 0 0;
	padding-right: 2px;
	position: absolute;
	right: 0px;
	text-align: right;
	width: 276px;
}

.rc-anchor-pt a:link,
.rc-anchor-pt a:visited {
	color: #9b9b9b;
	text-decoration: none;
}

.recaptcha-checkbox-borderAnimation {
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAANICAYAAABZl8i8AAAABmJLR…caGahTBej/IqDS5GVQOowHJTExMTExMTExMTExMTGx4Pb/Ab7rit24eUF+AAAAAElFTkSuQmCC);
	background-repeat: no-repeat;
	border: none;
	height: 28px;
	outline: 0;
	position: absolute;
	width: 28px;
}

.recaptcha-checkbox-spinner {
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAscCAYAAAALLkmiAAAABmJLR…OqmOwj9LFhB/6A26e0msmsRAxskuaQZKyUU1yatK+i/X9jsJ4YiehNDAAAAABJRU5ErkJggg==);
	background-repeat: no-repeat;
	border: none;
	height: 36px;
	left: -4px;
	outline: 0;
	position: absolute;
	top: -4px;
	width: 36px;
}

.recaptcha-checkbox-spinnerAnimation {
	background-repeat: no-repeat;
	border: none;
	height: 38px;
	left: -5px;
	outline: 0;
	position: absolute;
	top: -5px;
	visibility: hidden;
	width: 38px;
}

.recaptcha-checkbox-checkmark {
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAATsCAYAAADsAfBvAAAABmJLR…c8fQAAAIA4Ve/BleITOu7J3HehqXqHPH0AAAAAAAAAALr5H72AWmG4R73sAAAAAElFTkSuQmCC);
	background-repeat: no-repeat;
	border: none;
	height: 30px;
	left: -5px;
	outline: 0;
	position: absolute;
	width: 38px;
}
</style>
$endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <span> معلومات التواصل </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="media-body">
                                <span><i data-feather="map-pin"></i> العنوان</span>
                                <label class="col-sm-6 ">fffffff</label>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="media-body">
                                <span><i data-feather="mail"></i> البريد الالكترونى</span>
                                <label class="col-sm-6 ">fffffff</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="media-body">
                                <span><i data-feather="phone-call"></i> للحجز أو الاستفسار:</span>
                                <label class="col-sm-6 ">fffffff</label>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card ">
                <div class="card-header">
                    <span> نموذج المراسلة </span>
                </div>
                <div class="card-body text-center">
                    <form class="mega-vertical" action="{{route('contact.store')}}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <div class="media-body">
                                            <input class="form-control" name="name" id="name" placeholder="الاسم">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <div class="media-body">
                                            <input class="form-control" name="phone" id="phone"
                                                placeholder=" رقم الهاتف">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <div class="media-body">
                                            <textarea class="form-control" type="text" name='message'
                                                placeholder="نص الرسالة " rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 mb-3">
                                        <div class="rc-anchor rc-anchor-normal rc-anchor-light">
                                            <div class="rc-anchor-content">
                                                <div class="rc-inline-block">
                                                    <div class="rc-anchor-center-container">
                                                        <div class="rc-anchor-center-item rc-anchor-checkbox-holder">
                                                            <span
                                                                class="recaptcha-checkbox goog-inline-block recaptcha-checkbox-unchecked rc-anchor-checkbox recaptcha-checkbox-clearOutline"
                                                                role="checkbox" aria-checked="false"
                                                                id="recaptcha-anchor" tabindex="0" dir="rtl"
                                                                aria-labelledby="recaptcha-anchor-label">
                                                                <div class="recaptcha-checkbox-border"
                                                                    role="presentation"></div>
                                                                <div class="recaptcha-checkbox-borderAnimation"
                                                                    role="presentation"></div>
                                                                <div class="recaptcha-checkbox-spinner"
                                                                    role="presentation"></div>
                                                                <div class="recaptcha-checkbox-spinnerAnimation"
                                                                    role="presentation"></div>
                                                                <div class="recaptcha-checkbox-checkmark"
                                                                    role="presentation"></div>
                                                            </span></div>
                                                    </div>
                                                </div>
                                                <div class="rc-inline-block">
                                                    <div class="rc-anchor-center-container"><label
                                                            class="rc-anchor-center-item rc-anchor-checkbox-label"
                                                            id="recaptcha-anchor-label">I'm not a robot</label></div>
                                                </div>
                                            </div>
                                            <div class="rc-anchor-normal-footer">
                                                <div class="rc-anchor-logo-portrait" role="presentation">
                                                    <div class="rc-anchor-logo-img rc-anchor-logo-img-portrait"></div>
                                                    <div class="rc-anchor-logo-text">reCAPTCHA</div>
                                                </div>
                                                <div class="rc-anchor-pt"><a
                                                        href="https://www.google.com/intl/en/policies/privacy/"
                                                        target="_blank">Privacy</a> - <a
                                                        href="https://www.google.com/intl/en/policies/terms/"
                                                        target="_blank">Terms</a></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card-footer text-center">
                                <button class="btn btn-primary m-r-15" type="submit" value="pl">ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection