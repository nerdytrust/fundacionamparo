

<br>
<br>
<br>


<div role="tabpanel">

  <!-- Nav tabs -->
  <div class="scroller scroller-left"><i class="glyphicon glyphicon-chevron-left"></i></div>
  <div class="scroller scroller-right"><i class="glyphicon glyphicon-chevron-right"></i></div>
  <div class="wrapper">
    <ul class="nav nav-tabs list" id="tabs" data-tabs="tabs">

  	<?php $index = 0 ?>
    @foreach ($tabs as $table => $name)
      
  		<li class="@if($index == 0) active @endif"><a data-toggle="tabajax" href="{{ $model }}/{{ $key_value }}/tab/{{ $table }}"  rel="tooltip" data-target="#{{$table}}">{{$name}}</a></li>
      <?php $index++ ?>

      
    @endforeach

  </ul>
</div>

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
