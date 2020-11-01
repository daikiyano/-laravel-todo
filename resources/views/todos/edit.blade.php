
@extends('layouts.app')

@section('content')

  <body>
    <div class="container" style="margin-top:50px;">
    <h1>就活ステータス(更新)</h1>

    <form action='{{ url('/todos',$todo->id) }}' method="post">
      {{csrf_field()}}
      {{ method_field('patch')}}
      <div class="form-group">
        <label >就活ステータス(編集)</label>
        <div class="form-group">
            <label >企業名</label>
            <input value="{{$todo->company}}" type="text" name="company"class="form-control" placeholder="企業名を記入してください" style="max-width:1000px;">
            @if ($errors->first('company'))   <!-- ここ追加 -->
              <p class="validation">※{{$errors->first('company')}}</p>
            @endif
        </div>
        <div class="form-group">
        <label >次回選考日</label>
          <input type="datetime-local" id="meeting-time" name="date" value="{{$todo->date}}">
          @if ($errors->first('date'))   <!-- ここ追加 -->
            <p class="validation">※{{$errors->first('date')}}</p>
          @endif
        </div>
        <div class="form-group">
            <label >選考結果</label>
            {{Form::select('interview_status', ['選考ステータスをお選びください','説明会','カジュアル面談','グループディスカッション','一次面接','二次面接','三次面接','四次面接以降','最終面接'], $todo->interview_status )}}
            @if ($errors->first('result_status'))   <!-- ここ追加 -->
              <p class="validation">※{{$errors->first('result_status')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label >選考ステータス</label>
            {{Form::select('result_status', ['選考結果', '選考中', '内定','不合格'],  $todo->result_status )}}
            @if ($errors->first('interview_status'))   <!-- ここ追加 -->
              <p class="validation">※{{$errors->first('interview_status')}}</p>
            @endif
        </div>
        <input type="text" name="body"class="form-control" value="{{ $todo->body }}" style="max-width:1000px;">
        @if ($errors->first('body'))   <!-- ここ追加 -->
          <p class="validation">※{{$errors->first('body')}}</p>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">更新する</button>
</form>

</div>
@endsection