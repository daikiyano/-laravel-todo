<!doctype html>
<html lang="ja">
  <head>
    <title>Jum Todoリスト</title>
  <!-- 必要なメタタグ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
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
      <input type="datetime-local" id="meeting-time" name="date">
        <!-- <input name="date" type="date" /><input type="time" name="typ" min="09：00" max="17：30"> -->
      </div>
      
  <div class="form-group">
    <select name="result_status" class="form-control">
        <option value="0">選考結果</option>
        <option value="1">選考中</option>
        <option value="2">内定</option>
        <option value="3">不合格</option> 
      </select>
    </div>
  <div class="form-group">
  <select name="interview_status" class="form-control">
      <option value=0>選考ステータスをお選びください</option>
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
    <div class="form-group">
    <label >メモ</label>
    <input type="text" name="body"class="form-control" placeholder="メモ" style="max-width:1000px;">
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
      <span class="badge badge-pill badge-info">選考中</span> 
      @elseif ($todo->result_status == 2)
      <span class="badge badge-pill badge-success">内定</span>
      @elseif ($todo->result_status == 3)
      <span class="badge badge-pill badge-danger">不合格</span>
      @endif
      </td>
      <td>{{$todo->company}}</td>
      <!-- {{$todo->interview_status}} -->
      <!-- <td> <span class="badge badge-pill badge-success">説明会</span> </td> -->
      <td> 
      @if ($todo->interview_status == 1)
      <span class="badge badge-pill badge-secondary">説明会</span> 
      @elseif ($todo->interview_status == 2)
      <span class="badge badge-pill badge-secondary">カジュアル面談</span>
      @elseif ($todo->interview_status == 3)
      <span class="badge badge-pill badge-secondary">グループディスカッション</span>
      @elseif ($todo->interview_status == 4)
      <span class="badge badge-pill badge-secondary">一次面接</span>
      @elseif ($todo->interview_status == 5)
      <span class="badge badge-pill badge-secondary">二次面接</span>
      @elseif ($todo->interview_status == 6)
      <span class="badge badge-pill badge-secondary">三次面接</span>
      @elseif ($todo->interview_status == 7)
      <span class="badge badge-pill badge-secondary">四次面接以降</span>
      @elseif ($todo->interview_status == 8)
      <span class="badge badge-pill badge-secondary">最終面接</span>
      @endif
      </td>
      
    
      <td>{{$todo->date}}</td>
      <td style="font-size: 10px;">{{$todo->body}}</td>
      <td><form action="{{ action('TodosController@edit', $todo) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('get') }}
          <button type="submit" class="btn btn-primary">編集</button>
      </form>
      </td>

      <!-- 削除ボタン -->
      <td><form action="{{url('/todos', $todo->id)}}" method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <button type="submit" class="btn btn-danger">削除</button>
      </form>
      </td>

      <!-- 削除した際にポップ画面で確認をする -->
      <!-- <td><a class="del" data-id="{{ $todo->id }}" href="#">削除</a>
        <form method="post" action='{{ url('/todos', $todo->id) }}' id="form_{{ $todo->id}}">
          {{ csrf_field() }}
          {{ method_field('delete') }}
        </form>
      </td> -->
    </tr>
    @endforeach
  </table>
</div>
  <!-- オプションのJavaScript -->
  <!-- 最初にjQuery、次にPopper.js、次にBootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
    (function() {
  'use strict';

  var cmds = document.getElementsByClassName('del');
  var i;

  for (i = 0; i < cmds.length; i++) {
    cmds[i].addEventListener('click', function(e) {
      e.preventDefault();
      if (confirm('are you sure?')) {
        document.getElementById('form_' + this.dataset.id).submit();
      }
    });
  }

})();
</script>
  </body>
</html>
