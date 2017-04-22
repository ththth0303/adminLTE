
<table  class="table table-striped">
    <thead>
      <tr>
        <th class="col-sm-1">ID</th>
        <th class="col-md-1">Image</th>
        <th class="col-md-2">Name</th>
        <th class="col-md-2">Description</th>
        <th class="col-md-1">Create Time</th>
        <th class="col-md-1">Update At</th>
        <th class="col-md-3">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($account as $value)
      <tr>
        <td>{{ $value['id'] }}</td>
        <td><img src="{{asset("avatars")."/".$value['avata']}}" width="30px"></td>
        <td>{{ $value['name'] }}</td>
        <td>{{ $value['description'] }}</td>
        <td>{{ $value['created_at'] }}</td>
        <td>{{ $value['updated_at'] }}</td>

        <td><a style="display: inline;" href="{{asset('admin/manager/'.$value['id'].'/edit') }}"class="btn btn-primary">Edit</a>
            {!!Form::open(array('url'=>asset('admin/manager/'.$value['id']),'method'=>'delete','style'=>"display:inline",'id'=>'form_delete')) !!}
            {!!Form::hidden('url', URL::full(),array('id'=>'url_delete')) !!}
            {!!Form::submit('Delete',array('class'=>'btn btn-danger','id'=>'delete'))!!}
            {!!Form::close()!!}
            <a href="{{asset('admin/product/'.$value['id'])}}">Show</a>
        </td>
      </tr>
     @endforeach
    </tbody>

  </table>
