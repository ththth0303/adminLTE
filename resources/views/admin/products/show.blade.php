@extends('admin.admin')

@section('title', 'Admin|index')

@section('content')

<div class="container">

    <div class="" id="list-acc">    
        <p>{{ $account['id'] }}</p>
        <p>{{ $account['name'] }}</p>
        <p>{{ $account['description'] }}</p>
    </div>
    <div>
    @foreach($commments as $commment)
        <?php 
            if ($commment->parent_comment_id) {
                echo "<h4>$commment->content</h4>";
            }else
                echo "<h1>$commment->content</h1>";

         ?>
        
    @endforeach
    </div>
</div>
{{-- {{ $account->links() }} --}}

@stop

