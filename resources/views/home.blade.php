
@extends('layouts.app')
<head>
</head>
@section('content')
<div class="container">
<div class="row">
<!-- col-md-offset-2 -->
        <div class="col-md-12">
        <div class="site_box" style="background-image:linear-gradient(-210deg, #BC32A4 0%, #E03768 50%, #F67C33 100%); opacity:0.9;">
      <div class="site_title_box">
        <img class="title_image" src="image/19462.jpg" alt="Komaneco_logo">
      </div>
      <div class="site_intro_box">
      <div class="site_intro_box_inside">
      <!-- <img src="image/19462.jpg" alt="サンプル画像"> -->

        <h2 class="intro_p" style="color:white;"><b>ToDo就活は就活生向け管理サイトです。各企業の選考状況、次回選考日等を管理することができます。
</b></h2>
        <a href="{{ route('register') }}" class="btn btn-primary">アカウント登録</a>
      </div>
      </div>
    </div>
            <!-- <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> -->
        </div>
    </div>
</div>

</style>
@endsection
