<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>glass</title>
		
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
		
		<script src="bootstrap/dist/js/jquery.min.js"></script>
		<script src="bootstrap/dist/js/bootstrap.min.js"></script>
	</head>
	<body>
	
    <form class="form-inline" role="form" action="{{action($controller . '@index')}}">
      @foreach ($fields_show as $field => $field_info)
        @if (isset($field_info['search']))
        <div class="form-group">
          <label class="col-sm-3 control-label">{{$field_info['show']}}</label>
          <div class="col-md-3">
            <input name="{{$field}}" type="input" class="form-control" placeholder="" value="@if (isset($input[$field])){{$input[$field]}}@endif">
          </div>
        </div>
        @endif
      @endforeach
      <input type="submit" class="btn btn-success" value="查询" />
    </form>
    @foreach ($models as $k => $model)
    {{$model->getAttributes()['nickname']}}
    @endforeach
	</body>
</html>