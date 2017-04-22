{{ $account->links() }}

<table  class="table table-striped">
    <thead>
      <tr>
        <th class="col-sm-1">ID</th>
        <th class="col-md-1">Image</th>
        <th class="col-md-2">Name</th>
        <th class="col-md-2">Email</th>
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
        <td>{{ $value['email'] }}</td>
        <td>{{ $value['created_at'] }}</td>
        <td>{{ $value['updated_at'] }}</td>
        
        <td><a style="display: inline;" href="{{asset('admin/manager/'.$value['id'].'/edit') }}"class="btn btn-primary">Edit</a>
            {!!Form::open(array('url'=>asset('admin/manager/'.$value['id']),'method'=>'delete','style'=>"display:inline",'id'=>'form_delete')) !!}
            {!!Form::hidden('url', URL::full(),array('id'=>'url_delete')) !!}
            {!!Form::submit('Delete',array('class'=>'btn btn-danger','id'=>'delete'))!!}
            {!!Form::close()!!}
            <span style="display: inline;" class="btn {{ session()->has('product_'.$value['id'])?'btn-success':'btn-warning' }} quantity" rel="{{'product_'.$value['id']}}">{{session()->has('product_'.$value['id'])? 'Uncheck':'Check'}}</span>
            <!-- <input style="display: inline; width: 50px" type="text" name="qty" id="quantity{{$value['id']}}" value="1"> -->
        </td>
      </tr>
     @endforeach     
    </tbody>
  </table>
  {{ $account->links() }}