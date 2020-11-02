@extends('layouts.app')

@section('content')
  <div class="container" style="margin-top:50px;">
    <h1>就活ステータス</h1>
    <form action='{{ url('/todos')}}' method="post">
      {{csrf_field()}}
    <div class="form-group">
      <label >企業名</label>
      <input type="text" name="company"class="form-control" placeholder="企業名を記入してください" style="max-width:1000px;">
        @if ($errors->first('company'))   <!-- ここ追加 -->
            <p class="validation">※{{$errors->first('company')}}</p>
        @endif
    </div>
      <div class="form-group">
      <label >次回選考日</label></br>
      <input type="datetime-local" id="meeting-time" name="date">
        <!-- <input name="date" type="date" /><input type="time" name="typ" min="09：00" max="17：30"> -->
        @if ($errors->first('date'))   <!-- ここ追加 -->
          <p class="validation">※{{$errors->first('date')}}</p>
        @endif
      </div>
      
  <div class="form-group">
  <label >選考結果</label>
    <select name="result_status" class="form-control">
        <option value="">選考結果を選択してください</option>
        <option value=1>選考中</option>
        <option value=2>内定</option>
        <option value=3>不合格</option> 
      </select>
    </div>
    @if ($errors->first('result_status'))   <!-- ここ追加 -->
        <p class="validation">※{{$errors->first('result_status')}}</p>
    @endif
  <div class="form-group">
  <label >選考ステータス</label>
  <select name="interview_status" class="form-control">
      <option value="">選考ステータスをお選びください</option>
      <option value=1>説明会</option>
      <option value=2>カジュアル面談</option>
      <option value=3>グループディスカッション</option>
      <option value=4>一次面接</option>
      <option value=5>二次面接</option>
      <option value=6>三次面接</option>
      <option value=7>四次面接以降</option>
      <option value=8>最終面接</option>
    </select>
    </div>
    @if ($errors->first('interview_status'))   <!-- ここ追加 -->
        <p class="validation">※{{$errors->first('interview_status')}}</p>
    @endif
    <div class="form-group">
    <label >メモ</label>
    <textarea type="text" name="body"class="form-control" placeholder="メモ内容を記入してください" rows="4" cols="40"></textarea>
    @if ($errors->first('body'))   <!-- ここ追加 -->
        <p class="validation">※{{$errors->first('body')}}</p>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">追加する</button>  </form>
   
    <h1 style="margin-top:50px;">就活ステータス</h1>
  <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
  <tbody>
  <tr>
  <td>選考ステータス</td>
  <td>企業名</td>
  <td>選考ステップ</td>
  <td>次回面接日</td>
  <td>メモ</td>
  <td></td>
  <td></td>
  <td></td>
 
  </tr>
    @foreach ($todos as $todo)
    <!-- <input type="datetime-local" id="meeting-time" value="{{$todo->date}}" name="date"> -->
    <tr>
    <td> 
      @if ($todo->result_status == 1)
      <span class="label label-primary">選考中</span> 
      @elseif ($todo->result_status == 2)
      <span class="label label-success">内定</span>
      @elseif ($todo->result_status == 3)
      <span class="label label-danger">不合格</span>
      @endif
      </td>
      <td>{{$todo->company}}</td>
      <!-- {{$todo->interview_status}} -->
      <!-- <td> <span class="badge badge-pill badge-success">説明会</span> </td> -->
      <td> 
      @if ($todo->interview_status == 1)
      <span class="label label-success">説明会</span> 
      @elseif ($todo->interview_status == 2)
      <span class="label label-success">カジュアル面談</span>
      @elseif ($todo->interview_status == 3)
      <span class="label label-success">グループディスカッション</span>
      @elseif ($todo->interview_status == 4)
      <span class="label label-success">一次面接</span>
      @elseif ($todo->interview_status == 5)
      <span class="label label-success">二次面接</span>
      @elseif ($todo->interview_status == 6)
      <span class="label label-success">三次面接</span>
      @elseif ($todo->interview_status == 7)
      <span class="label label-success">四次面接以降</span>
      @elseif ($todo->interview_status == 8)
      <span class="label label-success">最終面接</span>
      @endif
      </td>
      <td>{{$todo->date}}</td>
      <td style="font-size: 10px;">{{$todo->body}}</td>
      <td><form action="{{ action('TodosController@edit', $todo) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('get') }}
          <button type="submit" class="btn btn-primary btn-sm">編集</button>
      </form>
      </td>
      <td><form action="{{url('/todos', $todo->id)}}" method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <button type="submit" class="btn btn-danger btn-sm">削除</button>
      </form>
      </td>
    </tr>
    @endforeach
  </table>

  <h1 style="margin-top:50px;">就活結果</h1>
  <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
  <tbody>
  <tr>
  <td>選考ステータス</td>
  <td>企業名</td>
  <td>選考ステップ</td>
  <td>次回面接日</td>
  <td>メモ</td>
  <td></td>
  <td></td>
  <td></td>
 
  </tr>
    @foreach ($results as $result)
    <tr>
    <td> 
      @if ($result->result_status == 1)
      <span class="label label-primary">選考中</span> 
      @elseif ($result->result_status == 2)
      <span class="label label-success">内定</span>
      @elseif ($result->result_status == 3)
      <span class="label label-danger">不合格</span>
      @endif
      </td>
      <td>{{$result->company}}</td>
      
      <td> 
      @if ($result->interview_status == 1)
      <span class="label label-success">説明会</span> 
      @elseif ($result->interview_status == 2)
      <span class="label label-success">カジュアル面談</span>
      @elseif ($result->interview_status == 3)
      <span class="label label-success">グループディスカッション</span>
      @elseif ($result->interview_status == 4)
      <span class="label label-success">一次面接</span>
      @elseif ($result->interview_status == 5)
      <span class="label label-success">二次面接</span>
      @elseif ($result->interview_status == 6)
      <span class="label label-success">三次面接</span>
      @elseif ($result->interview_status == 7)
      <span class="label label-success">四次面接以降</span>
      @elseif ($result->interview_status == 8)
      <span class="label label-success">最終面接</span>
      @endif
      </td>
      <td>{{$result->date}}</td>
      <td style="font-size: 10px;">{{$result->body}}</td>
      <td><form action="{{ action('TodosController@edit', $result) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('get') }}
          <button type="submit" class="btn btn-primary btn-sm">編集</button>
      </form>
      </td>
      <td><form action="{{url('/todos', $result->id)}}" method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <button type="submit" class="btn btn-danger btn-sm">削除</button>
      </form>
      </td>
    </tr>
    @endforeach
  </table>

</div>
@endsection