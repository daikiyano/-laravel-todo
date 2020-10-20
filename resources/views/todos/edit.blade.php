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
    <h1>Todoリスト更新</h1>

    <form action='{{ url('/todos',$todo->id) }}' method="post">
      {{csrf_field()}}
      {{ method_field('patch')}}
      <div class="form-group">
        <label >やることを更新してください</label>
        <div class="form-group">
            <label >企業名</label>
            <input value="{{$todo->company}}" type="text" name="company"class="form-control" placeholder="企業名を記入してください" style="max-width:1000px;">
        </div>
        <div class="form-group">
        <label >次回面接日</label>
          <input type="datetime-local" id="meeting-time" name="date" value="{{$todo->date}}">
        </div>
        <div class="form-group">
            <label >選考ステップ</label>
            {{Form::select('interview_status', ['選考ステータスをお選びください','説明会','カジュアル面談','グループディスカッション','一次面接','二次面接','三次面接','四次面接以降','最終面接'], $todo->interview_status )}}
        </div>
        <div class="form-group">
            <label >選考ステータス</label>
            {{Form::select('result_status', ['選考結果', '選考中', '内定','不合格'],  $todo->result_status )}}
        </div>
        <input type="text" name="body"class="form-control" value="{{ $todo->body }}" style="max-width:1000px;">
      </div>
      <button type="submit" class="btn btn-primary">更新する</button>
</form>

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
