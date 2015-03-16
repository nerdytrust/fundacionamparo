

<br>
<br>
<br>
<div role="tabpanel">

  <!-- Nav tabs -->
  
  <ul class="nav nav-tabs" role="tablist">
  	<?php $index = 0 ?>
    @foreach ($tabs as $table => $name)
      
  		<li role="presentation" class="@if($index == 0) active @endif"><a data-toggle="tabajax" href="{{ $model }}/{{ $key_value }}/tab/{{ $table }}"  rel="tooltip" data-target="#{{$table}}">{{$name}}</a></li>
      <?php $index++ ?>
    @endforeach

  </ul>

  <!-- Tab panes -->

  <div class="tab-content">
    <?php $index = 0 ?>
  	@foreach ($tabs as $table => $name)
    	<div role="tabpanel" class="tab-pane @if($index == 0) active @endif" id="{{$table}}">
     
        
        
      </div>
    <?php $index++ ?>
	 @endforeach

  </div>

</div>
